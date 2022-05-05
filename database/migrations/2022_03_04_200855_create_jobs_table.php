<?php

use App\Models\Job;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('subtitle');
            $table->string('slug');
            $table->text('description');
            $table->enum('status', [Job::BORRADOR, Job::PUBLICADO])->default(Job::PUBLICADO);
            $table->date('ending');

            $table->foreignId('user_id');
            $table->foreignId('schedule_id');
            $table->foreignId('area_id');
            $table->foreignId('place_id');

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
        Schema::dropIfExists('jobs');
    }
}
