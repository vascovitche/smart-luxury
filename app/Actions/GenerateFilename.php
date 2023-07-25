<?php

namespace App\Actions;

use Exception;

class GenerateFilename
{

    /**
     * @throws Exception
     */
    public static function execute(string $fileExtension): string
    {
        return time() . '_' . random_int(1, 999999) . '.' . $fileExtension;
    }

}
