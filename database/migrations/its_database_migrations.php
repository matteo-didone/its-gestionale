<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // 1. Tabella per i corsi ITS
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->integer('total_hours')->default(2000);
            $table->integer('classroom_hours')->default(1200);
            $table->integer('internship_hours')->default(800);
            $table->decimal('attendance_threshold', 5, 2)->default(80.00);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 2. Tabella per le macroaree
        Schema::create('macro_areas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // 3. Tabella per le materie
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('macro_area_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->integer('year');
            $table->integer('total_hours')->nullable();
            $table->text('description')->nullable();
            $table->string('language')->nullable();
            $table->timestamps();
        });

        // 4. Tabella associativa corsi-materie
        Schema::create('course_subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->integer('year');
            $table->integer('hours_allocated')->nullable();
            $table->boolean('is_mandatory')->default(true);
            $table->unique(['course_id', 'subject_id', 'year']);
            $table->timestamps();
        });

        // 5. Tabella utenti con ruoli
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['student', 'teacher', 'admin'])->default('student');
            $table->foreignId('course_id')->nullable()->constrained()->onDelete('set null');
            $table->integer('year')->nullable();
            $table->string('student_id')->nullable()->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 6. Tabella voti
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade');
            $table->decimal('grade', 4, 2)->nullable();
            $table->enum('status', ['superato', 'assente', 'non_superato', 'in_corso'])->default('in_corso');
            $table->enum('approval_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('approved_at')->nullable();
            $table->text('notes')->nullable();
            $table->date('exam_date');
            $table->timestamps();
            $table->unique(['user_id', 'subject_id', 'exam_date']);
        });

        // 7. Tabella presenze
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('status', ['present', 'absent', 'late', 'justified'])->default('present');
            $table->integer('hours_attended')->default(0);
            $table->text('notes')->nullable();
            $table->foreignId('recorded_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['user_id', 'subject_id', 'date', 'start_time']);
        });

        // 8. Tabella orari/calendario
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade');
            $table->integer('year');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('room')->nullable();
            $table->enum('type', ['lesson', 'exam', 'lab', 'project', 'internship'])->default('lesson');
            $table->text('notes')->nullable();
            $table->string('google_calendar_event_id')->nullable();
            $table->timestamps();
        });

        // 9. Tabella materiali didattici
        Schema::create('educational_materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->foreignId('uploaded_by')->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('file_path');
            $table->string('file_name');
            $table->string('file_type');
            $table->integer('file_size');
            $table->boolean('is_public')->default(false);
            $table->integer('download_count')->default(0);
            $table->timestamps();
        });

        // 10. Tabella tracking ore studente
        Schema::create('student_hours_tracking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('total_classroom_hours')->default(0);
            $table->integer('total_internship_hours')->default(0);
            $table->decimal('attendance_percentage', 5, 2)->default(0);
            $table->boolean('eligible_for_exam')->default(false);
            $table->timestamp('last_calculated_at')->nullable();
            $table->timestamps();
            $table->unique('user_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_hours_tracking');
        Schema::dropIfExists('educational_materials');
        Schema::dropIfExists('schedules');
        Schema::dropIfExists('attendances');
        Schema::dropIfExists('grades');
        Schema::dropIfExists('course_subjects');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('macro_areas');
        Schema::dropIfExists('courses');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'course_id', 'year', 'student_id', 'is_active']);
        });
    }
};