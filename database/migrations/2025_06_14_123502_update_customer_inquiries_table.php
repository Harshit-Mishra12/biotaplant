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
        //
        Schema::table('customer_inquiries', function (Blueprint $table) {
            // Drop product_name
            if (Schema::hasColumn('customer_inquiries', 'product_name')) {
                $table->dropColumn('product_name');
            }

            // Add product_id
            $table->unsignedBigInteger('product_id')->nullable()->after('name');

            // Optional foreign key (if products table exists)
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('customer_inquiries', function (Blueprint $table) {
            $table->dropColumn('product_id');
            $table->string('product_name')->nullable(false);
        });
    }
};
