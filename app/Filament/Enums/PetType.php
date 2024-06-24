<?php

namespace App\Filament\Enums;

use Filament\Support\Contracts\HasLabel;

enum PetType implements HasLabel
{
    case Cat;
    case Dog;
    case Rabbit;
    case Bird;
    case Horse;
    case Cow;
    case Pig;
    case Sheep;
    case Goat;
    case Panda;
    case Monkey;

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Cat => 'Cat',
            self::Dog => 'Dog',
            self::Rabbit => 'Rabbit',
            self::Bird => 'Bird',
            self::Horse => 'Horse',
            self::Cow => 'Cow',
            self::Pig => 'Pig',
            self::Sheep => 'Sheep',
            self::Goat => 'Goat',
            self::Panda => 'Panda',
            self::Monkey => 'Monkey',
            default => null,
        };
    }
}
