<?php

namespace App\Enums;

enum Role: string {
    case  ADMIN     = "admin";
    case  STAFF     = "staff";
    case  STUDENT   = "student";
    case  GUEST     = "guest";

    public static function name($val): string {
        $e = Role::tryFrom($val);
        if (is_null($e)) {
            return "";
        } else {
            return $e->name;
        }
    }

    public static function names() {
        return static::asCollection()->transform(fn ($item) => $item->name)->toArray();
    }

    public static function values() {
        return static::asCollection()->transform(fn ($item) => $item->value)->toArray();
    }

    public static function asCollection() {
        return collect(static::cases());
    }

}
