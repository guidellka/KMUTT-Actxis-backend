<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::beginTransaction();

        Schema::create('step', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',60)->unique();
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')
                ->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );
        });

        Schema::create('document_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')
            ->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );
        });
        
        Schema::create('document', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('owner_id');
            $table->unsignedInteger('club_id');
            $table->unsignedInteger('document_category_id');
            $table->unsignedInteger('advisor_id');
            $table->string('name',255);
            $table->string('name_en',255)->nullable();
            $table->double('purpose_budget')->nullable();
            $table->double('real_budget')->nullable();            
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')
                ->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );
            
            $table->foreign('owner_id')->references('id')->on('user')
                ->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('club_id')->references('id')->on('club')
                ->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('document_category_id')->references('id')->on('document_category')
                ->onUpdate('restrict')->onDelete('cascade');
        });

        
        Schema::create('document_step', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('document_id');
            $table->unsignedInteger('step_id');
            $table->unsignedInteger('organize_user_id')->nullable();
            $table->unsignedInteger('advisor_id')->nullable();
            $table->boolean('is_pass');
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')
                ->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );

            $table->foreign('document_id')->references('id')->on('document')
            ->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('step_id')->references('id')->on('step')
            ->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('organize_user_id')->references('id')->on('organization_user')
            ->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('advisor_id')->references('id')->on('user')
            ->onUpdate('restrict')->onDelete('cascade');
        });

        Schema::create('document_file', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('document_id');
            $table->string('name',60);
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')
                ->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );

            $table->foreign('document_id')->references('id')->on('document')
            ->onUpdate('restrict')->onDelete('cascade');
        });

        Schema::create('photo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('document_id');
            $table->string('name',60);
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')
                ->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );

            $table->foreign('document_id')->references('id')->on('document')
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
        Schema::dropIfExists('step');
        Schema::dropIfExists('document_category');
        Schema::dropIfExists('document');
        Schema::dropIfExists('document_step');
        Schema::dropIfExists('document_file');
        Schema::dropIfExists('photo');
    }
}
