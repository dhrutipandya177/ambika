<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //$table->dropColumn(['email_verified_at','email_verify_code','celt_student', 'is_celt_pro', 'country_id']);
            $table->string('phone_no',50)->nullable();
            $table->string('company_name',255)->nullable();
            $table->text('company_address')->nullable();
            $table->dateTime('company_birth_date',0);
            $table->string('gst_no',100)->nullable();
            $table->tinyInteger('verification_at')->default(0);
            $table->integer('verification_code')->nullable();           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone_no');
            $table->dropColumn('company_name');
            $table->dropColumn('company_address');
            $table->dropColumn('company_birth_date');
            $table->dropColumn('gst_no');
            $table->dropColumn('verification_at');
            $table->dropColumn('verification_code');
        });
    }
}
