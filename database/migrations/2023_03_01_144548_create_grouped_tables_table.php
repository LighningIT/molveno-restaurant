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
        Schema::create('grouped_tables', function (Blueprint $table) {
            $table->id();
            $table->foreignId("table_section_id");
            $table->boolean("combined");
            $table->string("comments");
            $table->integer("chairs");
            // $table->foreignId("status_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grouped_tables');
    }
};
