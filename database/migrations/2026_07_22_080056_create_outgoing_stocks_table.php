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
        Schema::create('outgoing_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incoming_stock_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('pic_id')->nullable()->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->date('tanggal');
            $table->integer('kuantitas');
            $table->decimal('berat', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outgoing_stocks');
    }
};
