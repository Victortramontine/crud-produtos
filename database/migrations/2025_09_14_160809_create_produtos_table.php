// database/migrations/YYYY_MM_DD_HHMMSS_create_produtos_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); 
            $table->text('descricao'); 
            $table->decimal('preco', 8, 2); 
            $table->date('data_validade'); 
            $table->boolean('ativo')->default(true); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};