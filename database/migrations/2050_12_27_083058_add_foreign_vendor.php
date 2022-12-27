<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignVendor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('products', function(Blueprint $table) {
            
            $table
                ->foreign('vendor_id')
                ->references('vendor_id')
                ->on('vendors')
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
        Schema::table('products', function(Blueprint $table){
            $table->dropForeign('products_vendor_id_foreign');
        });
        Schema::disableForeignKeyConstraints();
    }
}
