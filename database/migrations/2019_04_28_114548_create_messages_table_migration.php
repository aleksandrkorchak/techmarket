<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTableMigration extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('position', false, true);
            $table->integer('real_depth', false, true);
            $table->softDeletes();

            $table->foreign('parent_id')
                ->references('id')
                ->on('messages')
                ->onDelete('set null');
        });

        Schema::create('message_closure', function (Blueprint $table) {
            $table->increments('closure_id');

            $table->integer('ancestor', false, true);
            $table->integer('descendant', false, true);
            $table->integer('depth', false, true);

            $table->foreign('ancestor')
                ->references('id')
                ->on('messages')
                ->onDelete('cascade');

            $table->foreign('descendant')
                ->references('id')
                ->on('messages')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('message_closure', function (Blueprint $table) {
            Schema::dropIfExists('message_closure');
        });

        Schema::table('messages', function (Blueprint $table) {
            Schema::dropIfExists('messages');
        });
    }
}
