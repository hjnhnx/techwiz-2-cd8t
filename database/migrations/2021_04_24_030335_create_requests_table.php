<?php

use App\Enums\RequestStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('pickup_address');
            $table->string('pickup_coordinate')->nullable();
            $table->string('destination_address');
            $table->string('destination_coordinate')->nullable();
            $table->dateTime('desired_pickup_time');
            $table->integer('seats_occupy');
            $table->integer('status')->default(RequestStatus::WAITING);
            $table->integer('ride_id')->nullable();
            $table->dateTime('pickup_time')->nullable();
            $table->float('price')->nullable();
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
        Schema::dropIfExists('requests');
    }
}
