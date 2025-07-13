<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJobtypeToJobQuoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_quote', function (Blueprint $table) {
            $table->char('jobtype',1)->nullable()->comment('This column states if the data belongs to service or repairs job type')->after('job_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_quote', function (Blueprint $table) {
            $table->dropColumn('jobtype');
        });
    }
}
