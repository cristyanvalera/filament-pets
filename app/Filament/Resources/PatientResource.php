<?php

namespace App\Filament\Resources;

use App\Filament\Enums\PetType;
use App\Filament\Resources\PatientResource\Pages\{ListPatients, CreatePatient, EditPatient};
use App\Models\Patient;
use Filament\Forms\Components\{DatePicker, Select, TextInput};
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\{EditAction, BulkActionGroup, DeleteBulkAction};
use Filament\Tables\{Table, Columns\TextColumn, Filters\SelectFilter};

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Select::make('type')
                    ->options(PetType::class)
                    ->required(),
                DatePicker::make('date_of_birth')
                    ->required()
                    ->maxDate(now()),
                Select::make('owner_id')
                    ->relationship('owner', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')->required()->maxLength(255),
                        TextInput::make('email')
                            ->label('Email Address')
                            ->email()
                            ->required()->maxLength(255),
                        TextInput::make('phone')
                            ->label('Phone Number')
                            ->tel()
                            ->required(),
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nombre')->searchable(),
                TextColumn::make('type')->label('Especie'),
                TextColumn::make('date_of_birth')
                    ->label('Fecha de naciemiento')
                    ->date('d/m/Y, H:m:s')
                    ->sortable(),
                TextColumn::make('owner.name')->label('Dueño')->searchable(),
            ])
            ->filters([
                SelectFilter::make('type')->options(PetType::class),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPatients::route('/'),
            'create' => CreatePatient::route('/create'),
            'edit' => EditPatient::route('/{record}/edit'),
        ];
    }
}
