<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
            $table->unsignedBigInteger('type_id')->unsigned()->index()->after('user_id');
        });

        Schema::table('booking', function (Blueprint $table) {
            $table
                ->foreign('type_id')
                ->references('type_id')
                ->on('types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('booking', function (Blueprint $table) {
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::disableForeignKeyConstraints();
    }
}
