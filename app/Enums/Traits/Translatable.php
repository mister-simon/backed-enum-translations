<?php

namespace App\Enums\Traits;

use Illuminate\Support\Str;

trait Translatable
{
    public static function langFile(): string
    {
        return static::$langFile
            ?? Str::kebab(class_basename(static::class));
    }

    public function langKey(): string
    {
        if (method_exists($this, 'langMap')) {
            return $this->langMap($this);
        }

        return $this->name;
    }

    public function trans(...$args)
    {
        $langFile = static::langFile();
        $langKey = $this->langKey();

        return trans("{$langFile}.{$langKey}", ...$args);
    }

    public static function select(...$args)
    {
        return collect(static::cases())
            ->mapWithKeys(
                fn ($enum) => [$enum->value => $enum->trans(...$args)]
            );
    }
}
