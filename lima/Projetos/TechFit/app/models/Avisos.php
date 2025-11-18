<?php

declare(strict_types=1);

final class Aviso
{
    private function __construct() {} // classe só de métodos estáticos por enquanto

    private static ?PDO $pdo = null;

    private static function pdo(): PDO
    {
        return self::$pdo ??= Connect::conectar();
    }

    /**
     * Tipos válidos de aviso (centralizado aqui = fácil manutenção)
     */
    public const TIPOS_PERMITIDOS = [
        'Geral',
        'Manutencao',
        'Evento',
        'AvisoSeguranca',
        'Comunicado',
    ];

    public const TIPO_SEGURANCA = 'AvisoSeguranca';

    /**
     * Retorna os tipos válidos (sem precisar ler a coluna do banco toda hora)
     */
    public static function getTipos(): array
    {
        return self::TIPOS_PERMITIDOS;
    }

    /**
     * Valida se um tipo existe
     */
    public static function tipoValido(string $tipo): bool
    {
        return in_array($tipo, self::TIPOS_PERMITIDOS, true);
    }


    public static function criar(
        string $titulo,
        string $tipo,
        string $conteudo,
        ?DateTimeImmutable $expira = null
    ): int {
        if ($titulo === '' || mb_strlen($titulo) > 255) {
            throw new InvalidArgumentException('Título inválido ou muito longo.');
        }

        if (!self::tipoValido($tipo)) {
            throw new InvalidArgumentException("Tipo de aviso inválido: {$tipo}");
        }

        if ($conteudo === '') {
            throw new InvalidArgumentException('Conteúdo não pode ser vazio.');
        }

        // Regra de expiração automática
        if ($expira === null && $tipo !== self::TIPO_SEGURANCA) {
            $expira = (new DateTimeImmutable())->modify('+1 month');
        }

        $pdo = self::pdo();

        $sql = "
            INSERT INTO Avisos (titulo, tipo, conteudo, data_criacao, expira)
            VALUES (:titulo, :tipo, :conteudo, CURRENT_DATE, :expira)
        ";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':titulo'    => $titulo,
            ':tipo'      => $tipo,
            ':conteudo'  => $conteudo,
            ':expira'    => $expira?->format('Y-m-d'),
        ]);

        return (int) $pdo->lastInsertId();
    }

    // Métodos extras que você provavelmente vai precisar em breve:

    public static function listarAtivos(DateTimeImmutable $hoje = null): array
    {
        $hoje ??= new DateTimeImmutable();

        $sql = "
            SELECT id, titulo, tipo, conteudo, data_criacao, expira
            FROM Avisos
            WHERE (expira IS NULL OR expira >= :hoje)
              AND data_criacao <= :hoje
            ORDER BY data_criacao DESC
        ";

        $stmt = self::pdo()->prepare($sql);
        $stmt->execute([':hoje' => $hoje->format('Y-m-d')]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function expirar(int $id): bool
    {
        $sql = "UPDATE Avisos SET expira = CURRENT_DATE WHERE id = :id";
        $stmt = self::pdo()->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}