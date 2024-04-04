<?php

use App\Models\Product;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->default(Product::TYPE_NON_STOCKED);
            $table->string('name')->unique();
            $table->decimal('cost')->default(0);
            $table->decimal('price')->default(0);
            $table->decimal('stock')->default(0);
            $table->string('uom')->default('');
            $table->boolean('active')->default(false);
            $table->text('notes')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
