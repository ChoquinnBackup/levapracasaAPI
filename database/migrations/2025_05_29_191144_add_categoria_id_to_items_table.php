<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('items', function (Blueprint $table) {
        $table->unsignedBigInteger('categoria_id')->nullable(); // ou não nullable, conforme regra de negócio
        // $table->foreign('categoria_id')->references('id')->on('categories');
    });
}

public function down()
{
    Schema::table('items', function (Blueprint $table) {
        $table->dropColumn('categoria_id');
    });
}

};
