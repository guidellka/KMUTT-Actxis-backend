<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::beginTransaction();

        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 32)->unique();
            $table->string('password', 255);
            $table->rememberToken();
            $table->datetime('deleted_at')->nullable();
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')
                ->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );
        });

        Schema::create('user_data', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->string('first_name', 64);
            $table->string('middle_name', 64)->nullable();
            $table->string('last_name', 64);
            $table->string('student_id', 11)->nullable()->unique();
            $table->string('department',80)->nullable(); 
            $table->string('faculty', 80)->nullable(); 
            $table->string('branch', 80)->nullable(); 
            $table->string('email');
            $table->string('tel_no', 16)->nullable();
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')
                ->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );

            $table->foreign('user_id')->references('id')->on('user')
                ->onUpdate('restrict')->onDelete('cascade');
        });

        // Create table for storing roles
        Schema::create('role', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')
                ->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );
        });

        // Create table for associating roles to users (Many-to-Many)
        Schema::create('role_user', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('role_id');

            $table->foreign('user_id')->references('id')->on('user')
                ->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('role')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unique(['user_id', 'role_id']);
        });

        // Create table for storing permissions
        Schema::create('permission', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')
                ->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('permission_role', function (Blueprint $table) {
            $table->unsignedInteger('permission_id');
            $table->unsignedInteger('role_id');

            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('role')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unique(['permission_id', 'role_id']);
        });


        DB::commit();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_data');
        Schema::dropIfExists('user');
        Schema::drop('role');
        Schema::drop('role_user');
        Schema::drop('permission');
        Schema::drop('permission_role');
    }
}
