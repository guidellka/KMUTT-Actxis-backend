<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTables extends Migration
{
    public function up()
    {
        DB::beginTransaction();
        Schema::enableForeignKeyConstraints();
        
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 60)->unique();
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')
                ->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );
        });

        Schema::create('user_data', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->unique();
            $table->string('first_name', 64);
            $table->string('last_name', 64);
            $table->string('email', 100)->nullable();
            $table->boolean('is_lecturer')->default(false);
            $table->string('student_id', 11)->nullable()->unique();
            $table->string('tel_no', 16)->nullable();
            $table->string('department',80)->nullable(); 
            $table->string('branch', 80)->nullable(); 
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')
                ->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('restrict')->onDelete('cascade');
        });

        DB::commit();
    }

    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('user_data');
    }
}
