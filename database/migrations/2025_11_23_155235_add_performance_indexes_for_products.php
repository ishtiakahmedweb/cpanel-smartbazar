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
        // Add indexes for better query performance
        Schema::table('products', function (Blueprint $table) {
            // Index for active products
            $table->index(['is_active', 'id'], 'idx_products_active_id');
            
            // Index for category filtering (Skip - category_id is not in products table)
            // $table->index(['category_id', 'is_active'], 'idx_products_category_active');
            
            // Index for price range filtering
            $table->index(['price', 'is_active'], 'idx_products_price_active');
            
            // Index for stock tracking
            $table->index(['stock_count', 'is_active'], 'idx_products_stock_active');
            
            // Composite index for common queries (Skip - category_id is not in products table)
            // $table->index(['is_active', 'category_id', 'price'], 'idx_products_active_category_price');
        });

        Schema::table('orders', function (Blueprint $table) {
            // Index for order status filtering
            $table->index(['status', 'id'], 'idx_orders_status_id');
            
            // Index for user orders
            $table->index(['user_id', 'status'], 'idx_orders_user_status');
            
            // Index for date range queries
            $table->index(['created_at', 'status'], 'idx_orders_created_status');
        });

        // Schema::table('order_items', function (Blueprint $table) {
        //     // Index for order items lookup
        //     $table->index(['order_id', 'product_id'], 'idx_order_items_order_product');
        //     
        //     // Index for product sales tracking
        //     $table->index(['product_id', 'created_at'], 'idx_order_items_product_created');
        // });

        Schema::table('users', function (Blueprint $table) {
            // Index for user status
            $table->index(['is_active', 'id'], 'idx_users_active_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('idx_products_active_id');
            // $table->dropIndex('idx_products_category_active');
            $table->dropIndex('idx_products_price_active');
            $table->dropIndex('idx_products_stock_active');
            // $table->dropIndex('idx_products_active_category_price');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex('idx_orders_status_id');
            $table->dropIndex('idx_orders_user_status');
            $table->dropIndex('idx_orders_created_status');
        });

        // Schema::table('order_items', function (Blueprint $table) {
        //     $table->dropIndex('idx_order_items_order_product');
        //     $table->dropIndex('idx_order_items_product_created');
        // });

        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex('idx_users_active_id');
        });
    }
};