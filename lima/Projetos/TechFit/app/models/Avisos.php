<?php
class Aviso
{
    private static ?PDO $pdo = null;

    private static function getPDO(): PDO
    {
        if (self::$pdo === null) {
            self::$pdo = Connect::conectar();
        }
        return self::$pdo;
    }
    public static function getTipoLabelsAvisos(): array
    {
        return [
            'Comunicado'     => 'Comunicado',
            'Promocao'       => 'Promoção',
            'Evento'         => 'Evento',
            'Manutencao'     => 'Manutenção',
            'MudancaHorario' => 'Mudança de Horário',
            'Novidade'       => 'Novidade',
            'DicaSaude'      => 'Dicas de Saúde',
            'AvisoSeguranca' => 'Aviso de Segurança',
        ];
    }
    public static function getTipos()
    {
        $pdo  = self::getPDO();
        $sql  = "SHOW COLUMNS FROM Avisos LIKE 'tipo'";
        $stmt = $pdo->query($sql);
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);

        $type = $row['Type'];

        $type = str_replace("enum(", "", $type);
        $type = str_replace(")", "", $type);

        $values = str_getcsv($type, ',', "'", '\\');

        return $values;
    }

    public static function createAviso(
        string $titulo,
        string $tipo,
        string $conteudo,
        int $idFuncionario,
        ?string $anexoPath = null
    ): bool {
        $pdo = self::getPDO();

        $sql = "INSERT INTO Avisos (titulo, tipo, conteudo, anexo_path, data_criacao, expira, id_funcionario)
                VALUES (?, ?, ?, ?, CURRENT_DATE, ?, ?)";

        $stmt = $pdo->prepare($sql);

        $expira = date('Y-m-d', strtotime('+1 month'));

        return $stmt->execute([
            $titulo,
            $tipo,
            $conteudo,
            $anexoPath,
            $expira,
            $idFuncionario,
        ]);
    }

    public static function getAllForAdmin(): array
    {
        $pdo = self::getPDO();
        $sql = "SELECT a.*, f.nome_funcionario
        FROM Avisos a
        JOIN Funcionarios f ON a.id_funcionario = f.id_funcionario
        ORDER BY a.data_criacao DESC";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById(int $id_alerta): ?array
    {
        $pdo  = self::getPDO();
        $sql  = "SELECT * FROM Avisos WHERE id_alerta = :id_alerta";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id_alerta', $id_alerta, PDO::PARAM_INT);
        $stmt->execute();

        $aviso = $stmt->fetch(PDO::FETCH_ASSOC);
        return $aviso ?: null;
    }

    public static function updateAviso(
        int $id_alerta,
        string $titulo,
        string $tipo,
        string $conteudo,
        string $expira,
        ?string $anexoPath = null
    ): bool {
        $pdo = self::getPDO();
        $sql = "UPDATE Avisos
                SET titulo = ?, tipo = ?, conteudo = ?, expira = ?, anexo_path = ?
                WHERE id_alerta = ?";

        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$titulo, $tipo, $conteudo, $expira, $id_alerta, $anexoPath]);
    }

    public static function deleteAviso(int $id_alerta): bool
    {
        $pdo  = self::getPDO();
        $sql  = "DELETE FROM Avisos WHERE id_alerta = :id_alerta";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id_alerta', $id_alerta, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
