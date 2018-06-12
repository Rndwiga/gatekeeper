<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('user_uid', 36)->unique();
            $table->string('api_key',60)->nullable()->unique();
            $table->string('user_image')->nullable();
            $table->string('username')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('country_code', 4)->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email')->unique();
            $table->string('visibility')->default('hidden');
            $table->string('created_by')->nullable();
            $table->dateTime('last_log_in')->nullable();
            $table->dateTime('last_password_change')->nullable();
            $table->string('password', 255);
            $table->string('user_status')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    public function createUsers(){
        $users = [
          [
              'username' => 'Jdoe',
              'first_name' => 'John',
              'last_name' => 'Doe',
              'user_uid'  => \Ramsey\Uuid\Uuid::uuid4(),
              'country_code' => 254,
              'mobile_number' => 0712550547,
              'email' => 'raphndwi@gmail.com',
              'password' => bcrypt('password'),
          ]
        ];

        foreach ($users as $user){
            DB::table('users')->insert($user);
        }
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
