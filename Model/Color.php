<?php

declare(strict_types=1);

namespace Del001\AdminUiColorSwap\Model;

final class Color
{
    public static function normalize($value): string
    {
        if (!is_string($value)) {
            return '';
        }

        $value = trim($value);

        return preg_match('/\A#(?:[0-9a-f]{3}|[0-9a-f]{6})\z/i', $value) ? $value : '';
    }
}
