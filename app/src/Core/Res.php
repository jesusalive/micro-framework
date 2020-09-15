<?php

namespace Learning\Core;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class Res
{
    public static function json($content = [], $status = Response::HTTP_OK)
    {
        $response = new JsonResponse(["data" => $content], $status);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public static function error($message, $status = Response::HTTP_BAD_REQUEST)
    {
        $response = new JsonResponse(
            ["errors" => ["error" => ["message" => $message]]],
            $status
        );
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public static function send($content, $status = Response::HTTP_OK)
    {
        return new Response($content, $status);
    }
}