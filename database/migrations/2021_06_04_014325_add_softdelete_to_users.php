<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftdeleteToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes()->after("remember_token");
            $table->string("image",50)->after("remember_token")->nullable();
            $table->bigInteger("state_id")->after("id")->nullable();
            $table->bigInteger("city_id")->after("state_id")->nullable();
            $table->integer("election")->after("city_id")->nullable();
            $table->longText("resume")->after("election")->nullable();
            $table->longText("phone")->after("resume")->nullable();
            $table->longText("mobile")->after("phone")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
