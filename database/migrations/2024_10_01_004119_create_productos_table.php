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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('imagen');
            $table->decimal('precio');
            $table->decimal('precio_venta');
            $table->integer('stock');
           
            $table->foreignId('id_categoria') // Crea una columna 'id_categoria' de tipo BIGINT para usar como clave foránea.
             ->nullable() // Permite que la columna 'id_categoria' acepte valores nulos.
             ->constrained('categorias') // Establece una relación de clave foránea con la tabla 'categorias'.
             ->cascadeOnUpdate() // Si se actualiza el 'id' de una categoría en la tabla 'categorias', se actualizará automáticamente en 'id_categoria'.
             ->nullOnDelete(); // Si se elimina una categoría de la tabla 'categorias', se establecerá 'id_categoria' en null en lugar de eliminar el registro.
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
