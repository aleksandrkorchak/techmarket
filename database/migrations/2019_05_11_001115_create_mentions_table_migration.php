<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMentionsTableMigration extends Migration
{
    public function up()
    {
        Schema::create('mentions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('position', false, true);
            $table->integer('real_depth', false, true);
            $table->softDeletes();
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('recipient_id');
            $table->text('text');
//            $table->unsignedTinyInteger('rating')->default(0);
            $table->timestamps();

            $table->foreign('parent_id')
                ->references('id')
                ->on('mentions')
                ->onDelete('set null');
        });

        Schema::create('mention_closure', function (Blueprint $table) {
            $table->increments('closure_id');

            $table->integer('ancestor', false, true);
            $table->integer('descendant', false, true);
            $table->integer('depth', false, true);

            $table->foreign('ancestor')
                ->references('id')
                ->on('mentions')
                ->onDelete('cascade');

            $table->foreign('descendant')
                ->references('id')
                ->on('mentions')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('mention_closure', function (Blueprint $table) {
            Schema::dropIfExists('mention_closure');
        });

        Schema::table('mentions', function (Blueprint $table) {
            Schema::dropIfExists('mentions');
        });
    }
}
