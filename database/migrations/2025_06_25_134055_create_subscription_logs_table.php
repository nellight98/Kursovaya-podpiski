<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionLogsTable extends Migration
{
    public function up()
    {
        Schema::create('subscription_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');        // добавляем user_id
            $table->unsignedBigInteger('subscription_id'); // ссылка на подписку
            $table->string('action');
            $table->timestamps();

            // Внешние ключи (опционально, но желательно)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscription_logs');
    }
}

