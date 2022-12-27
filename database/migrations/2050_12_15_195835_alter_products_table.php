<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
        
            
            $table
                ->foreign('type_id')
                ->references('type_id')
                ->on('types')
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
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_type_id_foreign');
        });
        Schema::disableForeignKeyConstraints();
    }
}
