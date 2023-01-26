<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->float("fat");
            $table->date("measure_at");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // userテーブルとの連携を解除してfatsテーブルを削除
        Schema::table('fats', function (Blueprint $table) {
            $table->dropForeign(['user_id']);       // userテーブルとの連携を解除
            $table->dropColumn(['user_id']);        // user_idカラムを削除
        });
        Schema::dropIfExists('fats');
    }
};
