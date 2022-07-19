<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $name;
    public string $phone;
    public string $phone2;
    public string $email;
    public string $address_crop;
    public string $address_full;
    public string $slogan;
    public string $logo;
    public string $logo2;
    public string $gtm;
    public string $yml;
    public string $chat;

    public static function group(): string
    {
        return 'site';
    }
    public static function getEmail()
    {
        return self::$email;
    }
}
