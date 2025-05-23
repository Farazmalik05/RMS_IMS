<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quote_number');
            $table->date('quote_date');
            $table->date('quote_duedate');
            $table->boolean('taxable')->default(true);
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('vehicle_id')->constrained();
            $table->bigInteger('nextservicekms')->nullable();
            $table->date('nextservicedate')->nullable();
            $table->text('remarks')->nullable();
            $table->text('jobdetails')->nullable();
            $table->string('tire_fl', 10)->nullable();
            $table->string('tire_fr', 10)->nullable();
            $table->string('tire_rl', 10)->nullable();
            $table->string('tire_rr', 10)->nullable();
            $table->string('frontbrakepads', 10)->nullable();
            $table->string('rearbrakepads', 10)->nullable();
            $table->unsignedDecimal('amtdue', 20, 2)->default('0.00');
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
        Schema::dropIfExists('quotes');
    }
}
