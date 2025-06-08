<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestMail extends Command
{
    protected $signature = 'mail:test';
    protected $description = 'Test mail functionality';

    public function handle()
    {
        try {
            Mail::raw('Bu bir test mailidir.', function($message) {
                $message->to('kandemon6633@gmail.com')
                        ->subject('Test Mail');
            });

            $this->info('Test mail başarıyla gönderildi!');
        } catch (\Exception $e) {
            $this->error('Mail gönderimi başarısız: ' . $e->getMessage());
        }
    }
} 