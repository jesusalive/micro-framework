<?php

namespace Learning\Core;

use Symfony\Component\HttpFoundation\Request;

abstract class Controller
{
    protected $request;
    protected $requestBody;

    function __construct(Request $request)
    {
        $this->request = $request;
        $this->requestBody = json_decode($request->getContent());
    }

}