<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemittanceLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remittance_line', function (Blueprint $table) {
            $table->bigIncrements('remittance_line_id');

            /*
             * Foreign key to remittance table.
             */
            $table->unsignedBigInteger('remittance_id');
            $table->foreign('remittance_id', 'fk_remittance_line_remittance')
                ->references('remittance_id')->on('remittance');

            /*
             * Foreign key to oblate table.
             */
            $table->unsignedBigInteger('oblate_id');
            $table->foreign('oblate_id', 'fk_remittance_line_oblate')
                ->references('oblate_id')->on('oblate');

	          $table->decimal('swastyayani', 8, 2)->nullable();
	          $table->decimal('istavrity', 8, 2);
	          $table->decimal('acharyavrity', 8, 2)->nullable();
	          $table->decimal('dakshina', 8, 2)->nullable();
	          $table->decimal('sangathani', 8, 2)->nullable();
	          $table->decimal('ananda_bazar', 8, 2)->nullable();
	          $table->decimal('pranami', 8, 2)->nullable();
	          $table->decimal('swastyayani_awasista', 8, 2)->nullable();
	          $table->decimal('ritwiki', 8, 2)->nullable();
	          $table->decimal('utsav', 8, 2)->nullable();
	          $table->decimal('diksha_pranami', 8, 2)->nullable();
	          $table->decimal('acharya_pranami', 8, 2)->nullable();
	          $table->decimal('parivrity', 8, 2)->nullable();
	          $table->decimal('misc', 8, 2)->nullable();


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
        Schema::dropIfExists('remittance_line');
    }
}
