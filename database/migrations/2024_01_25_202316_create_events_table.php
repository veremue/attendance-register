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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name')->nullable();
            $table->text('event_description')->nullable();
            $table->string('event_manager_name')->nullable();
            $table->string('event_manager_phone')->nullable();
            $table->string('event_manager_email')->nullable(); //to email reports
            $table->string('event_type')->nullable();//recurring or one time event
            $table->integer('event_recurrance_days')->default(0);//if recurring must be greater than zero
            $table->date('event_next_date')->nullable();
            $table->string('event_status')->default('active');
            $table->tinyInteger('event_register_marked')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
