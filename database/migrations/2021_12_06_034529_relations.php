<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Relations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $relations = [

            'phones' => [
                'customer_id'             => 'customers',
            ],

            'addresses' => [
                'customer_id'             => 'customers',
            ],

            'customers' => [
                'user_id'             => 'users',
                'phone_id'            => 'phones',
                'default_address_id'  => 'addresses',
                'payment_address_id'  => 'addresses',
                'shipping_address_id' => 'addresses',
            ],

            'product_variants' => [
                'product_id'        => 'products',
            ],

            'sales' => [
                'seller_id' => 'users',
                'customer_id' => 'customers',
            ],

            'sale_descriptions' => [
                'sale_id' => 'sales',
                'product_id' => 'products',
                'product_variant_id' => 'product_variants',                
            ]
            
        ];

        foreach ($relations as $key => $foreignReferences) {
            Schema::table($key, function (Blueprint $table) use ($foreignReferences) {    
                foreach ($foreignReferences as $column => $tableName) {
                    $table->foreign($column)->references('id')->on($tableName);
                }
            });
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
