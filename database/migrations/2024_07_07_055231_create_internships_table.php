<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('company_id')->constrained('users')->onDelete('cascade');
            $table->string('location');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('description');
            $table->text('requirements');
            $table->date('application_deadline');
            $table->string('stipend_salary')->nullable();
            $table->string('contact_information');
            $table->text('company_overview')->nullable();
            $table->text('benefits')->nullable();
            $table->string('working_hours');
            $table->string('eligibility_criteria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internships');
    }
};
