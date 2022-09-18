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
        Schema::create('nilai', function (Blueprint $table) {
            $table->string('NilaiId', 10)->primary();
            $table->foreignId('NIS', 8);
            $table->foreignId('NIP', 12);
            $table->float('NilaiUh', 12, 2);
            $table->float('NilaiPraktek', 12, 2);
            $table->float('NilaiPTS', 12, 2);
            $table->float('NilaiPAS', 12, 2);
            $table->float('Total', 12, 2);
            $table->float('Rata', 12, 2);
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
        Schema::dropIfExists('nilai');
    }
};
