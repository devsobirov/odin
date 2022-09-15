<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerminalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terminals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('project_id')->nullable();
            $table->string('title')->nullable();
            $table->string('login')->unique();
            $table->string('email')->nullable()->unique();
            $table->string('password');
            $table->string('pincode')->nullable()->unique();
            $table->timestamp('lastauth_at')->nullable();

            $table->foreign('project_id')
                ->references('id')->on('projects')
                ->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terminals');
    }
}
