<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemittanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remittance', function (Blueprint $table) {
            $table->bigIncrements('remittance_id');

            /*
             * Foreign key to family table.
             */
            $table->unsignedBigInteger('family_id');
            $table->foreign('family_id', 'fk_remittance_family')
                ->references('family_id')->on('family');

            $table->date('submitted_date');
            $table->integer('total_amount');

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
        Schema::dropIfExists('remittance');
    }
}
