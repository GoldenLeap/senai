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
    public static function createAviso(string $titulo, string $tipo, string $conteudo): bool
    {
        $pdo = self::getPDO();

        $sql = "INSERT INTO Avisos (titulo, tipo, conteudo, data_criacao, expira)
            VALUES (?, ?, ?, CURRENT_DATE, ?)";

        $stmt = $pdo->prepare($sql);

        $expira = ($tipo !== 'AvisoSeguranca')
            ? date('Y-m-d', strtotime('+1 month'))
            : null;

        return $stmt->execute([$titulo, $tipo, $conteudo, $expira]);
    }

}
