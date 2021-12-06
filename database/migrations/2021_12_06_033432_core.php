<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Core extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('name');
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
        // Schema::create('personal_access_tokens', function (Blueprint $table) {
        //     $table->id();
        //     $table->morphs('tokenable');
        //     $table->string('name');
        //     $table->string('token', 64)->unique();
        //     $table->text('abilities')->nullable();
        //     $table->timestamp('last_used_at')->nullable();
        //     $table->timestamps();
        // });

        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('description')->nullable();                        
            $table->string('street');
            $table->string('colony');
            $table->string('external_number');
            $table->string('internal_number')->nullable();;
            $table->string('city');
            $table->string('country');
            $table->string('postal_code');
            $table->string('references')->nullable();
            $table->timestamps();
            $table->softDeletes();  
        });

        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('country')->nullable();                        
            $table->string('number');            
            $table->timestamps();
            $table->softDeletes();  
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('default_address_id')->nullable();
            $table->unsignedBigInteger('shipping_address_id')->nullable();
            $table->unsignedBigInteger('payment_address_id')->nullable();
            $table->unsignedBigInteger('phone_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('full_name');
            $table->timestamps();
            $table->softDeletes();  
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();            
            $table->string('name');
            $table->string('brand');
            $table->bigInteger('stock')->default(0);
            $table->boolean('active')->default(true);
            $table->boolean('has_variant')->default(false);
            $table->text('description')->nullable();   
            $table->decimal('sale_price');
            $table->decimal('acquisition_price')->nullable();

            $table->timestamps();
            $table->softDeletes();  
        });

        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('product_id');
            $table->string('name');
            $table->string('brand');
            $table->bigInteger('stock')->default(0);
            $table->boolean('active')->default(false);
            $table->decimal('sale_price');
            $table->decimal('acquisition_price')->nullable();
            $table->text('description')->nullable();                        
            $table->timestamps();
            $table->softDeletes();  
        });

        Schema::create('sales', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->decimal('amount');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();  
        });

        Schema::create('sale_descriptions', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('sale_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('product_variant_id')->nullable();
            $table->decimal('amount');
            $table->bigInteger('quantity');
            $table->decimal('subtotal');            
            $table->timestamps();
            $table->softDeletes();  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('sales');
        Schema::dropIfExists('sale_descriptions');
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_variants');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('personal_access_tokens');
    }
}
