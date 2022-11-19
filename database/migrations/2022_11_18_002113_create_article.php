<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->date('date');
            $table->text('contenu');
            $table->string('url_image');
            $table->string('code')->unique();
            $table->text('tags');
            $table->boolean('isActive')->default(true)->nullable();
            $table->bigInteger('auteur')->unsigned();
            $table->foreign('auteur')->references('id')->on('users');

            $table->bigInteger('categorie_id')->unsigned();
            $table->foreign('categorie_id')->references('id')->on('categorie');

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
        Schema::dropIfExists('article');
    }
};
