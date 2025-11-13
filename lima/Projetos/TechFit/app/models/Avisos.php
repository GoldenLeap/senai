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

}
