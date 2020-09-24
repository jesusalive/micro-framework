<?php

declare(strict_types=1);

namespace Learning\Core;

class Utils
{
    public static function getJsonSerializeArray(array $data)
    {
        $formattedData = [];

        foreach ($data as $item) {
            array_push($formattedData, $item->jsonSerialize());
        }

        return $formattedData;
    }
}
