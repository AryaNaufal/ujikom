<?php

namespace App;

class ResponseMessage
{
    public static function createSuccessResponse(?string $message, ?array $data = []): array
    {
        return [
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ];
    }

    public static function createErrorResponse(string $message): array
    {
        return [
            'status' => 'error',
            'message' => $message
        ];
    }
}
