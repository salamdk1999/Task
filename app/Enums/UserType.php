<?php

namespace App\Enums;
enum UserType
{
    const NORMAL = 'normal';
    const GOLD = 'gold';
    const SILVER = 'silver';

    /**
     * Array of available user types.
     *
     * @var array
     */
    const SET = [
        self::NORMAL,
        self::GOLD,
        self::SILVER
    ];
}