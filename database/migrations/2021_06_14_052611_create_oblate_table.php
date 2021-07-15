<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOblateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oblate', function (Blueprint $table) {
            $table->bigIncrements('oblate_id');
            $table->string('name');

            /*
             * Foreign key to family table.
             */
            $table->unsignedBigInteger('family_id');
            $table->foreign('family_id', 'fk_oblate_family')
                ->references('family_id')->on('family');

            /*
             * Foreign key to worker table.
             */
            $table->unsignedBigInteger('worker_id');
            $table->foreign('worker_id', 'fk_oblate_worker')
                ->references('worker_id')->on('worker');

            $table->timestamps();
            $table->string('comment', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oblate');
    }
}
