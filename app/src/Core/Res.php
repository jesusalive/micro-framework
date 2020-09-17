<?php
declare(strict_types = 1);

namespace Learning\Core;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class Res
{
    public static function json(array $content = [], int $status = Response::HTTP_OK): JsonResponse
    {
        $response = new JsonResponse(["data" => $content], $status);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public static function error(string $message, int $status = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        $response = new JsonResponse(
            ["errors" => ["error" => ["message" => $message]]],
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