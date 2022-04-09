<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use Filament\Forms\Components\FileUpload;
use Filament\Pages\SettingsPage;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class ManageSite extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?string $title = 'Настройки';

    protected static ?string $navigationGroup = 'Параметры';

    protected static string $settings = GeneralSettings::class;

    protected function getFormSchema(): array
    {
        return [
            // TextInput::make('name')
            // ->label('Copyright notice')
            // ,
            TextInput::make('email')
            ->label('Email')
            ,
            TextInput::make('phone')
            ->label('Телефон')
            ,
            TextInput::make('phone2')
            ->label('Телефон (дополнительный)')
            ,
            TextInput::make('address_crop')
            ->label('Адрес (краткий)')
            ,
            TextInput::make('address_full')
            ->label('Адрес (полный)')
            ,
           
        ];
    }
}
