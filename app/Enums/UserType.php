<?php

namespace App\Enums;

enum UserType: string
{
    case Admin = 'admin';
    case User = 'user';

    public static function forMigration(): array {
        return collect(self::cases())
            ->map(function ($enum) {
                if (property_exists($enum, "value")) return $enum->value;
                return $enum->name;
            })
            ->values()
            ->toArray();
    }
}