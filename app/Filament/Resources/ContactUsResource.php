<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactUsResource\Pages;
use App\Models\ContactUs;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class ContactUsResource extends Resource
{
    // protected static ?string $model = ContactUs::class;

    // protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $model = ContactUs::class;

    // 🌟 Change the name shown in the sidebar
    protected static ?string $navigationLabel = 'Contact Us';

    // 📁 Optional: change the group heading in sidebar (if grouped)
    // protected static ?string $navigationGroup = 'Support';

    // ✨ Change the icon (choose from Heroicons: https://heroicons.com)
    protected static ?string $navigationIcon = 'heroicon-o-user';
    // public static function shouldRegisterNavigation(): bool
    // {
    //     return false;
    // }

    public static function canCreate(): bool
    {
        return false; // 🚫 Hide "New User" button
    }

    // public static function canEdit($record): bool
    // {
    //     return false;
    // }


    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             Forms\Components\TextInput::make('name')->required(),
    //             Forms\Components\TextInput::make('product_name')->required(),
    //             Forms\Components\TextInput::make('email')->email()->required(),
    //             Forms\Components\TextInput::make('phone_number')->required(),
    //             Forms\Components\TextInput::make('state'),
    //             Forms\Components\TextInput::make('district'),
    //             Forms\Components\Textarea::make('message'),
    //         ]);
    // }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->disabled(),

                Forms\Components\TextInput::make('product_name')
                    ->required()
                    ->disabled(),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->disabled(),

                Forms\Components\TextInput::make('phone_number')
                    ->required()
                    ->disabled(),

                Forms\Components\TextInput::make('state')
                    ->disabled(),

                Forms\Components\TextInput::make('district')
                    ->disabled(),

                Forms\Components\Textarea::make('message')
                    ->disabled(),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('product_name')->sortable(),
            Tables\Columns\TextColumn::make('email')->sortable(),
            Tables\Columns\TextColumn::make('phone_number'),
            Tables\Columns\TextColumn::make('state'),
            Tables\Columns\TextColumn::make('district'),
            Tables\Columns\TextColumn::make('message')->limit(50),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Submitted On'),
        ])->defaultSort('created_at', 'desc')->filters([]);
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
            'index' => Pages\ListContactUs::route('/'),
            'create' => Pages\CreateContactUs::route('/create'),
            'edit' => Pages\EditContactUs::route('/{record}/edit'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }
}
