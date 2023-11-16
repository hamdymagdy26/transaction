<?php

namespace App\Utility;

class TransactionStatus 
{
    const PAID = "paid";
    
    const OUTSTANDING = "outstanding";

    const OVERDUE = "overdue";

    public static function statuses()
    {
        return [
            self::PAID,
            self::OUTSTANDING,
            self::OVERDUE,
        ];
    }
}