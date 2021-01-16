<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family', function (Blueprint $table) {
            $table->bigIncrements('family_id');
            $table->bigInteger('family_code')->unique();
            $table->integer('check_digit');
            $table->string('address', 255);

            /*
             * Foreign key to user table.
             * User which created this record.
             */
            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id', 'fk_family_user')
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
        Schema::dropIfExists('family');
    }
}
