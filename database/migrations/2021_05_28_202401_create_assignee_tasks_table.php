<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssigneeTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignee_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('department_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('project_id')->constrained();
            $table->foreignId('status_id')->constrained('status_of_tasks');
            $table->foreignId('priority_id')->constrained('priority_of_tasks');
            $table->string('top');
            $table->string('left');
            $table->date('date');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignee_tasks');
    }
}
