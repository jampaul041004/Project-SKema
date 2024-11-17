<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('youths', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('birthdate');
            $table->enum('sex', ['male', 'female']);
            $table->enum('civil_status', ['single', 'married', 'divorced', 'widowed']);
            $table->enum('youth_classification', ['in_school_youth', 'out_of_school_youth', 'working_youth', 'youth_with_specific_needs']);
            $table->enum('youth_age_group', ['child_youth', 'core_youth', 'adult_youth']);
            $table->string('email')->unique();
            $table->string('contact_number', 15);
            $table->enum('sitio', ['pagdulang', 'proper', '213', 'hilltop', 'ipilan', 'kaldayapan', 'murangan', 'vmc', 'pinescamp', 'bagong_pook', 'bpi']);
            $table->string('highest_educational_attainment'); // Add this field here
            $table->enum('work_status', ['employed', 'unemployed', 'student', 'working_student', 'looking_for_job']);
            $table->boolean('registered_voter');
            $table->boolean('voted_last_election');
            $table->boolean('attended_kk_assembly');
            $table->integer('kk_assembly_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('youths');
    }
};
