<?php

namespace App\Utility;

class Roles 
{
    const ADMIN = "admin";
    
    const CUSTOMER = "customer";

    public static function roles()
    {
        return [
            self::ADMIN,
            self::CUSTOMER
        ];
    }
}