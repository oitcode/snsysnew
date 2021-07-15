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

            /*
             * Foreign key to family table.
             * Family code of worker
             */
            $table->unsignedBigInteger('family_id')->unique();
            $table->foreign('family_id', 'fk_worker_family')
                ->references('family_id')->on('family');

            $table->string('address', 255);
            $table->string('email', 255)->nullable()->unique();
            $table->string('contact_number');
            $table->string('country');

            $table->date('diksha_date');
            $table->string('ritwik_name', 255);
            $table->date('swastyayani_date');

            $table->string('citizenship_number');
            $table->string('pan_number');

            $table->string('worker_type');
            $table->date('panja_issue_date');
            $table->date('last_panja_renew_date');
            $table->date('next_panja_renew_date');


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
