<?php

declare(strict_types=1);

namespace Worksome\PestPluginSilence;

final class Silence
{
    private static bool $preventOutput = false;

    public static function preventOutput(bool $value = true): void
    {
        self::$preventOutput = $value;
    }

    public static function shouldPreventOutput(): bool
    {
        return self::$preventOutput;
    }
}
