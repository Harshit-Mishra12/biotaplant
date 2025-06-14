<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CareerFormResource\Pages;
use App\Filament\Resources\CareerFormResource\RelationManagers;
use App\Models\CareerForm;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CareerFormResource extends Resource
{
    protected static ?string $model = CareerForm::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function canCreate(): bool
    {
        return false; // 🚫 Hide "New User" button
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label('ID'),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('phone')->searchable(),
                TextColumn::make('current_location')->label('Location'),
                TextColumn::make('created_at')->dateTime()->label('Submitted On'),

                // 🧾 CV Download Link
                TextColumn::make('cv_path')
                    ->label('CV')
                    ->url(fn($record) => $record->cv_path, true)
                    ->openUrlInNewTab()
                    ->formatStateUsing(fn($state) => 'Download'),
            ])
            ->defaultSort('id', 'desc');
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
            'index' => Pages\ListCareerForms::route('/'),
            'create' => Pages\CreateCareerForm::route('/create'),
            'edit' => Pages\EditCareerForm::route('/{record}/edit'),
        ];
    }
}
