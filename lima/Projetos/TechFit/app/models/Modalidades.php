<?php

class Modalidades
{
    private static ?PDO $pdo = null;

    /**
     * Inicializa a conexão com o banco de dados
     */
    private static function getPDO(): PDO
    {
        if (self::$pdo === null) {
            self::$pdo = Connect::conectar();
        }
        return self::$pdo;
    }
    public static function getModalidadesByAluno($id)
    {
        $pdo = self::getPDO();

        $sql = "SELECT
                    M.nome_modalidade,
                    A.id_modalidade,
                    AA.id_aula
                FROM
                    Aulas_Aluno AS AA
                INNER JOIN Aulas AS A ON AA.id_aula = A.id_aula
                INNER JOIN Modalidades AS M ON A.id_modalidade = M.id_modalidade
                WHERE
                    AA.id_aluno = :id_aluno";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_aluno', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getModalidades(): array
    {
        $pdo = self::getPDO();
        $sql = "SELECT
                    id_modalidade,
                    nome_modalidade
                FROM Modalidades
                ORDER BY nome_modalidade";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function getModalidadeById(int $id_modalidade): ?array
    {
        $pdo = self::getPDO();
        $sql = "SELECT
                    id_modalidade,
                    nome_modalidade
                FROM Modalidades
                WHERE id_modalidade = :id_modalidade";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id_modalidade', $id_modalidade, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }
}
