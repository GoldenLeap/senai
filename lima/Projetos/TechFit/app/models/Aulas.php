<?php Class Aulas{


    /**
     * Retorna o numero de alunos inscritos em aula x
     * @param int $id_aula
     * @return int
     */
    public static function GetInscritos($id_aula): int{
        $db = Connect::conectar();
        $stmt = 'SELECT COUNT(*) as total
        FROM Aulas_Aluno WHERE id_aula = :id_aula';
        $stmt  = $db->prepare($stmt);
        $stmt->bindParam(':id_aula', $id_aula);
        $stmt->execute();
        $db = null;
        return (int) $stmt->fetchColumn() ?? 0;
    }
    public static function checkAgendado($id_aluno, $id_aula){
        $db = Connect::conectar();
        $sql = "SELECT COUNT(*) FROM Aulas_Aluno WHERE id_aula = :id_aula AND id_aluno = :id_aluno";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id_aula' => $id_aula,
            ':id_aluno' => $id_aluno
        ]);
        $count = (int) $stmt->fetchColumn();
        $db = null;
        return $count > 0;
    }
    public static function getAulasByAluno(PDO $pdo, int $id_aluno,  $id_modalidade = null): array
    {
        $sql = "
            SELECT
                A.id_aula,
                A.dia_aula,
                A.quantidade_pessoas,
                M.nome_modalidade,
                F.nome_filial
            FROM Aulas A
            JOIN Modalidades M ON A.id_modalidade = M.id_modalidade
            JOIN Filiais F ON A.id_filial = F.id_filial
            JOIN Agendamento Ag ON A.id_aula = Ag.id_aula
            WHERE Ag.id_aluno = :id_aluno
              AND Ag.status = 'agendado'
        ";

        if ($id_modalidade !== null || $id_modalidade !== 'todas') {
            $sql .= " AND A.id_modalidade = :id_modalidade";
        }

        $sql .= " ORDER BY A.dia_aula";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id_aluno', $id_aluno, PDO::PARAM_INT);
        if ($id_modalidade !== null || $id_modalidade !== 'todas') {
            $stmt->bindValue(':id_modalidade', $id_modalidade, PDO::PARAM_INT);
        }
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}