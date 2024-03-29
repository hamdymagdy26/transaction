<?php

use App\Utility\TransactionStatus;
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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->float('amount');
            $table->float('paid')->default(0);
            $table->date('date_to_pay');
            $table->float('vat')->default(0);
            $table->boolean('including_vat')->default(0);
            $table->enum('status', TransactionStatus::statuses())->default(TransactionStatus::OUTSTANDING);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
