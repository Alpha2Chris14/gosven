<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pods', function (Blueprint $table) {
            $table->bigIncrements('id');
            //Product firstName
            $table->string('firstName');
            //Product lastName
            $table->string('lastName');
            //Product email
            $table->string('email');
            //Product lastName
            $table->string('status');
            //Product Name
            $table->string('company')->nullable();
            //Product ID
            $table->string('product_id');
            //Product Name
            $table->string('name');
            //Product price
            $table->string('price');
            //address
            $table->string('image');
            //phone
            $table->string('phone');
            //address
            $table->string('address');
            //weight
            $table->string('weight');
            //local
            $table->string('lga');
            //State
            $table->string('state');
            //Unit
            $table->string('unit');
            //quantity
            $table->string('quantity');
            //Buyers User Name
            $table->string('buyer_name');
            //Seller Name/Farm Name
            $table->string('seller_name');
            //This Gets The Cart_Id
            $table->string('cart_id');

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
        Schema::dropIfExists('pods');
    }
}
