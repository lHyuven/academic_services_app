<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('clients')) return; 
        Schema::create('clients', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('extension_name')->nullable();
            $table->string('student_number')->nullable();
            $table->string('section')->nullable();
            $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->year('year')->nullable();
            //program fk
            $table->uuid('program_id')->nullable();//foreignUuid('program_id')->nullable()->constrained('programs')->onDelete('cascade')->onUpdate('cascade');   
            //semester fk
            $table->uuid('semester_id')->nullable();//foreignUuid('semester_id')->nullable()->constrained('semesters')->onDelete('cascade')->onUpdate('cascade');   
            //
            $table->foreignUuid('created_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');   
            $table->foreignUuid('updated_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');  
            $table->string('status')->default(true);
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
        Schema::dropIfExists('clients');
    }
}