<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::beginTransaction();

        Schema::create('notification', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('title',40);
            $table->string('text');
            $table->string('link');
            $table->boolean('is_read');
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')
                ->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );
            
            $table->foreign('user_id')->references('id')->on('user')
            ->onUpdate('restrict')->onDelete('cascade');
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
        Schema::dropIfExists('notification');
    }
}