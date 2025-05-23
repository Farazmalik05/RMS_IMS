<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->char('title',5);
            $table->string('name');
            $table->string('phoneno', 20);
            $table->string('altphoneno', 20)->nullable();
            $table->string('abn',11)->nullable();
            $table->string('address')->nullable();
            $table->string('suburb')->nullable();
            $table->string('state',50)->nullable();
            $table->char('postcode',4)->nullable();
            $table->string('email')->nullable();
            $table->text('company_name')->nullable();
            $table->text('warn')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
