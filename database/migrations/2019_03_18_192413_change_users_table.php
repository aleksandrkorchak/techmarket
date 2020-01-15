<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->after('name')->nullable();
            $table->string('photo', 45)->after('email_verified_at')->default('noavatar.png');;
//            $table->string('photo', 45)->after('email_verified_at')->nullable();
            $table->string('city', 45)->after('photo');
            $table->string('address', 100)->after('city')->nullable();
            $table->string('phone', 45)->after('address');
            $table->string('login', 45)->after('phone');
            $table->unsignedTinyInteger('role_id')->after('password')->default(1);
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
            $table->dropColumn('role_id');
            $table->dropColumn('login');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('photo');
            $table->dropColumn('surname');
        });
    }
}
