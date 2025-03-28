<?php

declare(strict_types=1);

namespace App\Core;

class Response
{
    public static function json(array $data, int $status = 200): void
    {
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode($data, JSON_THROW_ON_ERROR);
    }

    public static function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }

    public static function notFound(): void
    {
        header("HTTP/1.0 404 Not Found");
        echo "Page non trouvée";
    }
} 