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
            $table->integer("q9_1")->nullable();;
            $table->integer("q9_2")->nullable();;
            $table->integer("q9_3")->nullable();;
            $table->integer("q9_4")->nullable();;
            $table->boolean("q10")->nullable();;
            $table->integer("q11")->nullable();;
            $table->boolean("q12")->nullable();;
            $table->integer("q13_1")->nullable();;
            $table->integer("q13_2")->nullable();;
            $table->integer("q13_3")->nullable();;
            $table->integer("q13_4")->nullable();;
            $table->integer("q13_5")->nullable();;
            $table->integer("q13_6")->nullable();;
            $table->integer("q13_7")->nullable();;
            $table->integer("q13_8")->nullable();;
            $table->boolean("q14")->nullable();;
            $table->integer("q15")->nullable();;
            $table->integer("q16")->nullable();;
            $table->integer("q17")->nullable();;
            $table->integer("q18")->nullable();;
            $table->boolean("q19")->nullable();;
            $table->integer("q20")->nullable();;
            $table->integer("q21")->nullable();;
            $table->integer("q22_1")->nullable();;
            $table->integer("q22_2")->nullable();;
            $table->integer("q22_3")->nullable();;
            $table->integer("q22_4")->nullable();;
            $table->integer("q22_5")->nullable();;
            $table->integer("q22_6")->nullable();;
            $table->integer("q22_7")->nullable();;
            $table->integer("q22_8")->nullable();;
            $table->integer("q22_9")->nullable();;
            $table->integer("q22_10")->nullable();;
            $table->integer("q22_11")->nullable();;
            $table->integer("q23_1")->nullable();;
            $table->integer("q23_2")->nullable();;
            $table->integer("q23_3")->nullable();;
            $table->integer("q23_4")->nullable();;
            $table->integer("q23_5")->nullable();;
            $table->integer("q23_6")->nullable();;
            $table->integer("q23_7")->nullable();;
            $table->integer("q23_8")->nullable();;
            $table->integer("q23_9")->nullable();;
            $table->integer("q23_10")->nullable();;
            $table->integer("q23_11")->nullable();;
            $table->integer("q23_12")->nullable();;
            $table->integer("q23_13")->nullable();;
            $table->integer("q23_14")->nullable();;
            $table->integer("q23_15")->nullable();;
            $table->integer("q23_16")->nullable();;
            $table->integer("q23_17")->nullable();;
            $table->integer("q23_18")->nullable();;
            $table->integer("q23_19")->nullable();;
            $table->integer("q23_20")->nullable();;
            $table->integer("q23_21")->nullable();;
            $table->integer("q23_22")->nullable();;
            $table->integer("q23_23")->nullable();;
            $table->integer("q23_24")->nullable();;
            $table->integer("q23_25")->nullable();;
            $table->integer("q23_26")->nullable();;
            $table->integer("q23_27")->nullable();;
            $table->integer("q23_28")->nullable();;
            $table->integer("q23_29")->nullable();;
            $table->integer("q24_1")->nullable();;
            $table->integer("q24_2")->nullable();;
            $table->integer("q24_3")->nullable();;
            $table->integer("q24_4")->nullable();;
            $table->integer("q24_5")->nullable();;
            $table->integer("q24_6")->nullable();;
            $table->integer("q24_7")->nullable();;
            $table->integer("q24_8")->nullable();;
            $table->integer("q24_9")->nullable();;
            $table->integer("q24_10")->nullable();;
            $table->float("height")->default(170);
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
