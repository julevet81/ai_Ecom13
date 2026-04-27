<?php

namespace App\Filament\Resources\Coupons\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CouponForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('code_type')
                    ->label('Coupon Mode')
                    ->options(['manual' => 'Manual', 'automatic' => 'Automatic'])
                    ->default('manual')
                    ->required(),
                TextInput::make('code')
                    ->label('Coupon Code')
                    ->required()
                    ->unique(ignoreRecord: true),
                Select::make('type')
                    ->label('Discount Type')
                    ->options(['percentage' => 'Percentage', 'fixed' => 'Fixed'])
                    ->required(),
                TextInput::make('value')
                    ->label('Discount Value')
                    ->nullable()
                    ->numeric(),
                TextInput::make('min_cart_value')
                    ->label('Minimum Cart Value')
                    ->nullable()
                    ->numeric(),
                TextInput::make('usage_limit')
                    ->label('Usage Limit')
                    ->nullable()
                    ->numeric(),
                DatePicker::make('expires_at')
                    ->label('Expiration Date')
                    ->nullable(),
                Toggle::make('status')
                    ->label('Active')
                    ->default(true),
            ]);
    }
}