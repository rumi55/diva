<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('site.name', '');
        $this->migrator->add('site.phone', '');
        $this->migrator->add('site.phone2', '');
        $this->migrator->add('site.email', '');
        $this->migrator->add('site.address_crop', '');
        $this->migrator->add('site.address_full', '');
        $this->migrator->add('site.slogan', '');
        $this->migrator->add('site.logo', '');
        $this->migrator->add('site.logo2', '');
        $this->migrator->add('site.gtm', '');
        $this->migrator->add('site.yml', '');
        $this->migrator->add('site.chat', '');
    }
}
