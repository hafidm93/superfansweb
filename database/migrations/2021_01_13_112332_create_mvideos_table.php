<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMvideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mvideos', function (Blueprint $table) {
            $table->id();
            $table->char('title', 255)->nullable();
            $table->char('slug', 255)->nullable();
            $table->integer('cat_id')->nullable();
            $table->string('cover', 255)->nullable();
            $table->text('description')->nullable();
            $table->longText('body')->nullable();
            $table->string('media', 255)->nullable();
            $table->dateTime('published_at')->nullable()->useCurrent = true;
            $table->boolean('isPublished')->nullable()->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mvideos');
    }
}
