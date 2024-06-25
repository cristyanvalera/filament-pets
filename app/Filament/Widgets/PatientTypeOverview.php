<?php

namespace App\Filament\Widgets;

use App\Filament\Enums\PetType;
use App\Models\Patient;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PatientTypeOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return collect(PetType::cases())
            ->map(fn (PetType $pet) => Stat::make(
                label: $pet->name,
                value: Patient::query()->where('type', $pet)->count(),
            ))->toArray();
    }
}
