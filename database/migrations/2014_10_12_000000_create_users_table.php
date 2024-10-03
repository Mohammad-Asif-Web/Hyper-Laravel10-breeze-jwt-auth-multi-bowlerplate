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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable();
            $table->string('username', 150)->nullable();
            $table->string('email', 150)->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('avatar')->nullable();
            $table->enum('role', ['admin','user'])->default('user');
            $table->string('otp', 6)->nullable();
            $table->enum('status', [0, 1])->default(1)->comment('0 = De-Active, 1 = Active');
            $table->string('google_id')->nullable();
            $table->string('github_id')->nullable();
            $table->string('linkedin_id')->nullable();
            $table->rememberToken();
            $table->timestamp('otp_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();

            // Add foreign key constraints
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
