<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerInquiryResource\Pages;
use App\Filament\Resources\CustomerInquiryResource\RelationManagers;
use App\Models\CustomerInquiry;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;

class CustomerInquiryResource extends Resource
{
    protected static ?string $model = CustomerInquiry::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
    public static function canCreate(): bool
    {
        return false; // 🚫 Hide "New User" button
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('product_name')
                    ->label('Product Name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('phone_number')
                    ->label('Phone'),

                TextColumn::make('state')
                    ->label('State'),

                TextColumn::make('district')
                    ->label('District'),

                TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(function ($state) {
                        return $state === 'completed'
                            ? '<span style="color: green; font-weight: bold;">✅ Completed</span>'
                            : '<span style="color: red; font-weight: bold;">❌ Uncompleted</span>';
                    })
                    ->html()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime('d-m-Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Filter::make('status')
                    ->label('Status Filter')
                    ->form([
                        Forms\Components\Select::make('status')
                            ->options([
                                'complete' => '✅ Completed',
                                'incomplete' => '❌ Incomplete',
                            ])
                            ->placeholder('All Statuses')
                            ->searchable(),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        if (!empty($data['status'])) {
                            return $query->where('status', $data['status']);
                        }
                        return $query;
                    }),
            ])
            ->actions([
                Action::make('Mark as Complete')
                    ->visible(fn($record) => $record->status !== 'complete')
                    ->action(fn($record) => $record->update(['status' => 'complete']))
                    ->color('success'),

                Action::make('Mark as Incomplete')
                    ->visible(fn($record) => $record->status !== 'incomplete')
                    ->action(fn($record) => $record->update(['status' => 'incomplete']))
                    ->color('danger'),

                Tables\Actions\DeleteAction::make(),
            ])
            ->defaultSort('created_at', 'desc'); // 🔥 Display latest data first
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
            'index' => Pages\ListCustomerInquiries::route('/'),
            'create' => Pages\CreateCustomerInquiry::route('/create'),
            'edit' => Pages\EditCustomerInquiry::route('/{record}/edit'),
        ];
    }
}
