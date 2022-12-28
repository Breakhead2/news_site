<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsersAddColumnsSocIdAndProfilePhotoUrl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('soc_id')->nullable()->comment('id в соц. сети');
            $table->index('soc_id');
            $table->string('profile_photo_url')->nullable()->comment('фото из соц. сети');
            $table->string('auth_with')->default('site')->comment('способ авторизации');
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
            $table->dropColumn('soc_id');
            $table->dropColumn('profile_photo_url');
            $table->dropColumn('auth_with');
        });
    }
}
