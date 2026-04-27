<?php

namespace App\Filament\Resources\Coupons\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CouponsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('code_type')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'manual' => 'primary',
                        'automatic' => 'secondary',
                    })
                    ->sortable(),
                TextColumn::make('type')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'percentage' => 'info',
                        'fixed' => 'success',
                    })
                    ->sortable(),
                TextColumn::make('value')
                    ->label('Discount Value')
                    ->formatStateUsing(fn ($record) => $record->type === 'percentage' ? $record->value . '%' : '$' . $record->value)
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Formatted Value')
                    ->formatStateUsing(fn ($record) => $record->type === 'fixed' ? '$' . $record->value : $record->value . '%'),
                TextColumn::make('min_cart_value')
                    ->label('Min Cart Value')
                    ->formatStateUsing(fn ($state) => $state ? '$' . $state : '-'),
                TextColumn::make('usage_limit')
                    ->label('Limit'),
                TextColumn::make('used_count')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('expires_at')
                    ->date()
                    ->sortable(),
                IconColumn::make('status')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}