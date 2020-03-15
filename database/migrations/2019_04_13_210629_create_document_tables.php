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

        Schema::create('steps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',60)->unique();
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')
                ->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );
        });

        Schema::create('document_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')
            ->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );
        });
        
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('owner_id');
            $table->unsignedInteger('club_id');
            $table->unsignedInteger('advisor_id');
            $table->unsignedInteger('document_category_id');
            $table->string('name',255);
            $table->string('name_en',255)->nullable();
            $table->string('file_name',255);
            $table->datetime('start_at');
            $table->datetime('end_at');    
            $table->double('purpose_budget')->nullable();
            $table->double('real_budget')->nullable();     
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')
                ->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );
            
            $table->foreign('owner_id')->references('id')->on('users')
                ->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('advisor_id')->references('id')->on('users')
            ->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('club_id')->references('id')->on('clubs')
                ->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('document_category_id')->references('id')->on('document_categories')
                ->onUpdate('restrict')->onDelete('cascade');
        });

        Schema::create('category_steps', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('step_id');
            $table->Integer('order');
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')
            ->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );

            $table->foreign('category_id')->references('id')->on('document_categories')
            ->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('step_id')->references('id')->on('steps')
            ->onUpdate('restrict')->onDelete('cascade');
        });

        Schema::create('document_steps', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('document_id');
            $table->unsignedInteger('category_step_id');
            $table->unsignedInteger('inspector_id');
            $table->enum('status', array('รอตรวจสอบ', 'รอแก้ไข', 'เสร็จสิ้น', 'ยกเลิก'));
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')
                ->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );

            $table->foreign('document_id')->references('id')->on('documents')
            ->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('category_step_id')->references('id')->on('category_steps')
            ->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('inspector_id')->references('id')->on('users')
            ->onUpdate('restrict')->onDelete('cascade');
        });

        Schema::create('attach_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('document_id');
            $table->string('file_name',255);
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')
                ->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );

            $table->foreign('document_id')->references('id')->on('documents')
            ->onUpdate('restrict')->onDelete('cascade');
        });

        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('document_id');
            $table->string('file_name',255);
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')
                ->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );

            $table->foreign('document_id')->references('id')->on('documents')
            ->onUpdate('restrict')->onDelete('cascade');
        });


        DB::commit();
    }

    public function down()
    {
        Schema::dropIfExists('document_steps');
        Schema::dropIfExists('document_categories');
        Schema::dropIfExists('steps');
        Schema::dropIfExists('category_steps');
        Schema::dropIfExists('attach_files');
        Schema::dropIfExists('photos');
        Schema::dropIfExists('documents');
    }
}
