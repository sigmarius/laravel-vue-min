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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });


        Schema::create('admin_user_role', function (Blueprint $table) {
            $table->id();

            $table->foreignId('role_id')->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('admin_user_id')->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_user_role');
        Schema::dropIfExists('roles');
    }
};
