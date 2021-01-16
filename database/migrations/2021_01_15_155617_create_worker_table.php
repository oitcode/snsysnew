<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker', function (Blueprint $table) {
            $table->bigIncrements('worker_id');
            $table->string('name', 255);
            $table->string('ritwik_name', 255);
            $table->string('address', 255);
            $table->string('contact_number');
            $table->string('email', 255)->nullable()->unique();
            $table->string('country');
            $table->string('worker_type');

            /*
             * Foreign key to family table.
             * Family code of worker
             */
            $table->unsignedBigInteger('family_id');
            $table->foreign('family_id', 'fk_worker_family')
                ->references('family_id')->on('family');

            /*
             * Foreign key to user table.
             * User which created this record.
             */
            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id', 'fk_worker_user')
                ->references('id')->on('users');

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
        Schema::dropIfExists('worker');
    }
}
