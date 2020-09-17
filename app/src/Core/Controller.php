<?php
declare(strict_types = 1);

namespace Learning\Core;

use Symfony\Component\HttpFoundation\Request;

abstract class Controller
{
    protected Request $request;
    protected $requestBody;

    function __construct(Request $request)
    {
        $this->request = $request;
        $this->requestBody = json_decode($request->getContent());
    }

}