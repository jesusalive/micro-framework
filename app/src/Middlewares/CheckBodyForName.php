<?php

declare(strict_types=1);

namespace Learning\Middlewares;

use LearningCore\IMiddleware;
use Symfony\Component\HttpFoundation\Request;

class CheckBodyForName implements IMiddleware
{
    public function handle(Request $request, array $routeParams): void
    {
        $body = json_decode($request->getContent());

        if (!$body->name) {
            throw new \RuntimeException('No name');
        }
    }
}
