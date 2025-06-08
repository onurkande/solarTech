<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('MAIL_MAILER')->nullable()->after('bottom_text2');
            $table->string('MAIL_HOST')->nullable()->after('MAIL_MAILER');
            $table->string('MAIL_PORT')->nullable()->after('MAIL_HOST');
            $table->string('MAIL_USERNAME')->nullable()->after('MAIL_PORT');
            $table->string('MAIL_PASSWORD')->nullable()->after('MAIL_USERNAME');
            $table->string('MAIL_ENCRYPTION')->nullable()->after('MAIL_PASSWORD');
            $table->string('MAIL_FROM_ADDRESS')->nullable()->after('MAIL_ENCRYPTION');
            $table->string('MAIL_FROM_NAME')->nullable()->after('MAIL_FROM_ADDRESS');
        });
    }

    public function down()
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'MAIL_MAILER',
                'MAIL_HOST',
                'MAIL_PORT',
                'MAIL_USERNAME',
                'MAIL_PASSWORD',
                'MAIL_ENCRYPTION',
                'MAIL_FROM_ADDRESS',
                'MAIL_FROM_NAME'
            ]);
        });
    }
}; 