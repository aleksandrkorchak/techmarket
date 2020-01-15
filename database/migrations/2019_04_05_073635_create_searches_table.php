<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('searches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
//            $table->unsignedTinyInteger('device_id');
//            $table->unsignedInteger('brand_id');
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('spare_id');
            $table->unsignedTinyInteger('state_id');
            $table->unsignedTinyInteger('quality_id');
            $table->unsignedTinyInteger('wait_id');
            $table->text('comment')->nullable();
            $table->unsignedInteger('view_count')->default(0);
            $table->unsignedInteger('offer_count')->default(0);
            $table->unsignedBigInteger('offer_id_accepted')->nullable();
            $table->timestamp('offer_accepted_at')->nullable();
            $table->timestamp('active_at')->nullable();
            $table->timestamp('approve_at')->nullable();
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
        Schema::dropIfExists('searches');
    }
}
