<?php

namespace App\Enums\Traits;

use Illuminate\Support\Str;

trait TranslatableChoices
{
    public static function langFile(): string
    {
        return Str::kebab(class_basename(static::class));
    }

    public function langKey(): string
    {
        if (method_exists($this, 'langMap')) {
            return $this->langMap($this);
        }

        return $this->name;
    }

    public function transChoice(...$args)
    {
        $langFile = static::langFile();
        $langKey = $this->langKey();

        return trans_choice("{$langFile}.{$langKey}", ...$args);
    }

    public function trans(...$args)
    {
        return $this->transChoice(1, ...$args);
    }

    public static function options(...$args)
    {
        return collect(static::cases())
            ->mapWithKeys(fn ($enum) => [
                $enum->value => $enum->trans(...$args),
            ]);
    }

    public static function optionsChoice(...$args)
    {
        return collect(static::cases())
            ->mapWithKeys(fn ($enum) => [
                $enum->value => $enum->transChoice(...$args),
            ]);
    }
}
