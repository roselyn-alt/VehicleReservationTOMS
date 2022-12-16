<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->date('date');
            $table->string('requesting_office');
            $table->integer('type_of_vehicle');
            $table->date('date_of_travel');
            $table->string('departure_time');
            $table->date('arrival_date');
            $table->string('arrival_time');
            $table->string('starting_location');
            $table->string('destination');
            $table->double('estimated_liters');
            $table->json('name_of_passengers');
            $table->integer('status')->default(0);
            $table->text('purpose');
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
        Schema::dropIfExists('travel_requests');
    }
};
