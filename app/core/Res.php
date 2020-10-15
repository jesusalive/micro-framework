<?php

declare(strict_types=1);

namespace LearningCore;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class Res
{
    public static function json($content = [], int $status = Response::HTTP_OK): JsonResponse
    {
        $response = new JsonResponse(["data" => $content], $status);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public static function error(
        string $message,
        string $type = 'AppError',
        int $status = Response::HTTP_BAD_REQUEST
    ): JsonResponse {
        $response = new JsonResponse(
            [
                "errors" => [
                    [
                        "type" => $type,
                        "message" => $message
                    ]
                ]
            ],
            $status
        );
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public static function send(string $content, int $status = Response::HTTP_OK): Response
    {
        return new Response($content, $status);
    }
}
