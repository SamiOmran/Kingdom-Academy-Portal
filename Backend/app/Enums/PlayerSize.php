<?php

namespace App\Enums;

enum PlayerSize: string
{
    case _6 = '6';
    case _8 = '8';
    case _10 = '10';
    case _12 = '12';
    case _14 = '14';
    case _16 = '16';
    case _18 = '18';
    case S = 'S';
    case M = 'M';
    case L = 'L';
    case XL = 'XL';
    case XXL = 'XXL';

    public static function values()
    {
        return array_column(PlayerSize::cases(), 'value');
    }
}