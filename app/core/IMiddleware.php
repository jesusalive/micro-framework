<?php

declare(strict_types=1);

namespace LearningCore;

use Symfony\Component\HttpFoundation\Request;

interface IMiddleware
{
    public function handle(Request $request, array $routeParams): void;
}
