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
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\View;

class CareerFormResource extends Resource
{
    protected static ?string $model = CareerForm::class;
    protected static ?string $navigationLabel = 'Career Submissions';
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->label('Name')
                ->disabled(),

            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->disabled(),

            Forms\Components\TextInput::make('phone')
                ->label('Phone')
                ->disabled(),

            Forms\Components\TextInput::make('current_location')
                ->label('Location')
                ->disabled(),

            Forms\Components\View::make('components.cv-view-link')
                ->label('CV File')
                ->columnSpan('full'),

            Forms\Components\Placeholder::make('submitted_on')
                ->label('Submitted On')
                ->content(fn($record) => $record?->created_at->format('d M Y, H:i')),
        ]);
    }





    public static function canCreate(): bool
    {
        return false; // 🚫 Hide "New User" button
    }
    public static function canEdit($record): bool
    {
        return false;
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
