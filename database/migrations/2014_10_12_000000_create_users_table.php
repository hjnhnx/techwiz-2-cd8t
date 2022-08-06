<?php

use App\Enums\EmailPreference;
use App\Enums\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('username')->unique();
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('address');
            $table->string('drivers_license_photo')->nullable();
            $table->string('driving_license_number')->nullable();
            $table->date('driving_license_valid_from')->nullable();
            $table->date('driving_license_valid_to')->nullable();
            $table->integer('identification_type');
            $table->string('identification_id');
            $table->date('identification_valid_from');
            $table->date('identification_valid_to');
            $table->integer('email_preference')->default(EmailPreference::ALL_EMAIL);
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('is_smoking_allowed')->default(false);
            $table->boolean('is_pet_allowed')->default(false);
            $table->boolean('music_preference')->default(0);
            $table->boolean('chitchat_preference')->default(0);
            $table->integer('role')->default(Role::USER);
            $table->boolean('is_driving_license_certified')->default(0);
            $table->string('device_token')->nullable();
            $table->rememberToken();
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
    }
}
