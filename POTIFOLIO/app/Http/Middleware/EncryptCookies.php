<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    // You can add custom cookie names that should not be encrypted here, if needed.
    // protected $except = [
    //     //
    // ];
}
