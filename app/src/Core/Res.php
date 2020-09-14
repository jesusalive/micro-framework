<?php

namespace Learning\Core;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class Res
{
    public static function json($content = [], $status = Response::HTTP_OK)
    {
        return new JsonResponse(["data" => $content], $status);
    }

    public static function error($message, $status = Response::HTTP_BAD_REQUEST)
    {
        return new JsonResponse([
            "errors" => ["error" => ["message" => $message]]],
            $status
        );
    }

    public static function send($content, $status = Response::HTTP_OK)
    {
        return new Response($content, $status);
    }
}