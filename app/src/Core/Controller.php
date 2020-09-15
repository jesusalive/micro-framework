<?php

namespace Learning\Core;

abstract class Controller
{
    protected $request;
    protected $requestBody;

    function __construct($request)
    {
        $this->request = $request;
        $this->requestBody = json_decode($request->getContent());
    }

}