<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\File;

class UpdateMailConfig extends Command
{
    protected $signature = 'mail:update-env';
    protected $description = 'Update .env file with mail settings from database';

    public function handle()
    {
        $settings = SiteSetting::first();
        
        if (!$settings) {
            $this->error('Site settings not found!');
            return;
        }

        $envFile = base_path('.env');
        $envContent = File::get($envFile);

        // Mail ayarlarını güncelle
        $envContent = $this->updateEnvVariable($envContent, 'MAIL_MAILER', $settings->MAIL_MAILER);
        $envContent = $this->updateEnvVariable($envContent, 'MAIL_HOST', $settings->MAIL_HOST);
        $envContent = $this->updateEnvVariable($envContent, 'MAIL_PORT', $settings->MAIL_PORT);
        $envContent = $this->updateEnvVariable($envContent, 'MAIL_USERNAME', $settings->MAIL_USERNAME);
        $envContent = $this->updateEnvVariable($envContent, 'MAIL_PASSWORD', $settings->MAIL_PASSWORD);
        $envContent = $this->updateEnvVariable($envContent, 'MAIL_ENCRYPTION', $settings->MAIL_ENCRYPTION);
        $envContent = $this->updateEnvVariable($envContent, 'MAIL_FROM_ADDRESS', $settings->MAIL_FROM_ADDRESS);
        $envContent = $this->updateEnvVariable($envContent, 'MAIL_FROM_NAME', $settings->MAIL_FROM_NAME);

        // .env dosyasını güncelle
        File::put($envFile, $envContent);

        $this->info('Mail settings have been updated in .env file successfully!');
    }

    private function updateEnvVariable($envContent, $key, $value)
    {
        if ($value === null) {
            return $envContent;
        }

        // Eğer değer boşluk içeriyorsa veya özel karakterler varsa tırnak içine al
        if (strpos($value, ' ') !== false || strpos($value, '=') !== false) {
            $value = '"' . $value . '"';
        }

        // Eğer key zaten varsa güncelle
        if (preg_match("/^{$key}=.*/m", $envContent)) {
            return preg_replace("/^{$key}=.*/m", "{$key}={$value}", $envContent);
        }

        // Eğer key yoksa sona ekle
        return $envContent . "\n{$key}={$value}";
    }
} 