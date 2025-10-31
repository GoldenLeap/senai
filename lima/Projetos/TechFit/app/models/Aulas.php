<?php class Aulas
{


    public static function GetInscritos($id_aula): int
    {
        $db = Connect::conectar();
        $stmt = 'SELECT COUNT(*) as total
        FROM Aulas_Aluno WHERE id_aula = :id_aula';
        $stmt  = $db->prepare($stmt);
        $stmt->bindParam(':id_aula', $id_aula);
        $stmt->execute();
        $db = null;
        return (int) $stmt->fetchColumn() ?? 0;
    }
    public static function checkAgendado($id_aluno, $id_aula)
    {
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

    public static function getAulas($id_modalidade = null): array
    {
        $db = Connect::conectar();
        $sql = "
            SELECT
                A.id_aula,
                A.dia_aula,
                A.quantidade_pessoas,
                A.id_modalidade,
                M.nome_modalidade,
                F.nome_filial
            FROM Aulas A
            JOIN Modalidades M ON A.id_modalidade = M.id_modalidade
            JOIN Filiais F ON A.id_filial = F.id_filial
            WHERE 1=1
        ";

        if ($id_modalidade !== null) {
            $sql .= " AND A.id_modalidade = :id_modalidade";
        }

        $sql .= " ORDER BY A.dia_aula";

        $stmt = $db->prepare($sql);
        if ($id_modalidade !== null) {
            $stmt->bindValue(':id_modalidade', $id_modalidade, PDO::PARAM_INT);
        }
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $db = null;
        return $res;
    }

    public static function getStatsForAulas(array $aulaIds, $id_aluno = null): array
    {
        if (empty($aulaIds)) return [];

        $db = Connect::conectar();

        // placeholders posicionais
        $placeholders = implode(',', array_fill(0, count($aulaIds), '?'));
        $sql = "
            SELECT aa.id_aula,
                   COUNT(*) AS inscritos,
                   SUM(CASE WHEN aa.id_aluno = ? THEN 1 ELSE 0 END) AS aluno_agendado
            FROM Aulas_Aluno aa
            WHERE aa.id_aula IN ($placeholders)
            GROUP BY aa.id_aula
        ";

        $stmt = $db->prepare($sql);

        $params = [];
        $params[] = $id_aluno ?? 0;
        foreach ($aulaIds as $id) $params[] = $id;

        $stmt->execute($params);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $db = null;

        $map = [];
        foreach ($rows as $r) {
            $map[(int)$r['id_aula']] = [
                'inscritos' => (int)$r['inscritos'],
                'agendado'  => ((int)$r['aluno_agendado'] > 0)
            ];
        }
        return $map;
    }


    public static function addAula(PDO $pdo, $dia_aula, $quantidade_pessoas, $id_funcionario, $id_modalidade, $id_filial){
        $stmt = "INSERT INTO Aulas(dia_aula, quantidade_pessoas, id_funcionario, id_modalidade, id_filial)
        VALUES (:dia_aula, :qnt_pessoas, :id_func, :id_mod, :id_fil)";
    }

}
