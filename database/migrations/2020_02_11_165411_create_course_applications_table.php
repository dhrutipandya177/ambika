<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('course');
            $table->string('name')->nullable();
            $table->string('parent_name')->nullable();
            $table->longText('address')->nullable();
            $table->integer('pincode')->nullable();
            $table->bigInteger('telephone')->nullable();
            $table->bigInteger('mobileno')->unique();
            $table->string('emailid')->unique();
            $table->tinyInteger('pursue_course_through')->comment('1-distance,2-online');
            $table->date('date_of_birth')->nullable();
            $table->enum('gender',['male','female']);
            $table->string('nationality')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('resume')->nullable();
            $table->string('degree_certificate')->nullable();
            $table->string('provisional_certificate')->nullable();
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
        Schema::dropIfExists('course_applications');
    }
}
