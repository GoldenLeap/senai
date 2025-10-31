<?php class Modalidades{
    public static function getModalidades(PDO $pdo){
        $stmt = "SELECT * FROM Modalidades";
        $stmt = $pdo->prepare($stmt);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}