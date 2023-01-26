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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->boolean("q1")->nullable();;
            $table->boolean("q2")->nullable();;
            $table->boolean("q3")->nullable();;
            $table->boolean("q4")->nullable();;
            $table->boolean("q5")->nullable();;
            $table->boolean("q6")->nullable();;
            $table->boolean("q7")->nullable();;
            $table->boolean("q8")->nullable();;
            $table->integer("q9")->nullable();;
            $table->boolean("q10")->nullable();;
            $table->boolean("q11")->nullable();;
            $table->boolean("q12")->nullable();;
            $table->integer("q13")->nullable();;
            $table->boolean("q14")->nullable();;
            $table->boolean("q15")->nullable();;
            $table->boolean("q16")->nullable();;
            $table->boolean("q17")->nullable();;
            $table->boolean("q18")->nullable();;
            $table->boolean("q19")->nullable();;
            $table->boolean("q20")->nullable();;
            $table->boolean("q21")->nullable();;
            $table->integer("q22")->nullable();;
            $table->integer("q23")->nullable();;
            $table->integer("q24")->nullable();;
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
        // userテーブルとの連携を解除してquestionsテーブルを削除
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['user_id']);       // userテーブルとの連携を解除
            $table->dropColumn(['user_id']);        // user_idカラムを削除
        });
        Schema::dropIfExists('questions');
    }
};
