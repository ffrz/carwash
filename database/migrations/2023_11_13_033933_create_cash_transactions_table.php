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
        Schema::create('cash_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id')->nullable(false);
            $table->unsignedBigInteger('category_id')->nullable(true);
            $table->dateTime('datetime');
            $table->decimal('amount', 10);
            $table->string('description', 100);
            $table->unsignedTinyInteger('ref_type')->default(0);
            $table->unsignedBigInteger('ref_id')->default(0);
            $table->timestamps();
            $table->foreign('account_id')->references('id')->on('cash_accounts')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('cash_transaction_categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_transactions');
    }
};
