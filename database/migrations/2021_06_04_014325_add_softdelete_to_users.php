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
            $table->string("username")->after("name")->nullable()->unique();
            $table->bigInteger("state_id")->after("username")->nullable();
            $table->bigInteger("city_id")->after("state_id")->nullable();
            $table->integer("election")->after("city_id")->nullable();
            $table->longText("phone")->after("election")->nullable();
            $table->longText("mobile")->after("phone")->nullable();
            $table->string("obligation")->after("mobile")->nullable();
            $table->longText("resume")->after("obligation")->nullable();
            $table->boolean("is_admin")->after("resume")->default(0);
            $table->string('image')->after("is_admin")->default('img.png');
            $table->string('image_two')->after("image")->default('img.png');
            $table->string('image_three')->after("image_two")->default('img.png');
            $table->string('image_four')->after("image_three")->default('img.png');
            $table->string('image_five')->after("image_four")->default('img.png');
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
