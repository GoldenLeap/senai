<?php

class Usuario {
    private static ?PDO $pdo = null;

    /**
     * Inicializa a conexão com o banco de dados
     */
    private static function getPDO(): PDO {
        if (self::$pdo === null) {
            self::$pdo = Connect::conectar();
        }
        return self::$pdo;
    }

    /**
     * Altera a senha do usuário
     * @param int $id ID do usuário
     * @param string $newPass Nova senha (já deve estar com hash)
     * @throws PDOException Se ocorrer erro na atualização
     */
    public static function changePass(int $id, string $newPass): void {
        $pdo = self::getPDO();
        $sql = "UPDATE Usuarios SET senha_hash = :senha WHERE id_usuario = :id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':senha', $newPass, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * Altera o email do usuário
     * @param int $id ID do usuário
     * @param string $newEmail Novo email
     * @throws PDOException Se ocorrer erro na atualização
     */
    public static function changeEmail(int $id, string $newEmail): void {
        $pdo = self::getPDO();
        $sql = "UPDATE Usuarios SET email = :email WHERE id_usuario = :id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email', $newEmail, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * Obtém o email do usuário
     * @param int $id ID do usuário
     * @return string|null Email do usuário ou null se não encontrado
     */
    public static function getEmail(int $id): ?string {
        $pdo = self::getPDO();
        $sql = "SELECT email FROM Usuarios WHERE id_usuario = :id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_COLUMN);
        return $result ?: null;
    }

    /**
     * Obtém todos os dados do usuário
     * @param int $id ID do usuário
     * @return array|null Dados do usuário ou null se não encontrado
     */
    public static function getUsuarioById(int $id): ?array {
        $pdo = self::getPDO();
        $sql = "SELECT 
                    id_usuario,
                    nome,
                    email,
                    data_nascimento,
                    tipo_usuario
                FROM Usuarios 
                WHERE id_usuario = :id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }
}
