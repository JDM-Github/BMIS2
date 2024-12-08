<?php

namespace App\Enums;

enum UserTypeEnum: string
{
    case Admin = 'admin';
    case Resident = 'resident';
    case Imbestigador = 'imbestigador';
}
