<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{

    public function errCode()
    {
        return response()->json(['hata' => 'hata']);
    }
}
