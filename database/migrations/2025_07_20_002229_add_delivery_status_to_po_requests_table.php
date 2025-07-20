<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeliveryStatusToPoRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('po_requests', function (Blueprint $table) {
            // Delivery status enum: ready, dispatched, delivered, received
            $table->enum('delivery_status', ['ready', 'dispatched', 'delivered', 'received'])
                  ->default('ready')
                  ->after('last_process_by')
                  ->comment('Delivery lifecycle status');
            
            // Dispatch tracking
            $table->timestamp('dispatch_date')->nullable()->after('delivery_status');
            $table->unsignedBigInteger('dispatched_by')->nullable()->after('dispatch_date');
            
            // Delivery tracking  
            $table->timestamp('delivery_date')->nullable()->after('dispatched_by');
            $table->unsignedBigInteger('delivered_by')->nullable()->after('delivery_date');
            $table->text('delivery_proof')->nullable()->after('delivered_by')->comment('Photo/document path for delivery proof');
            
            // Customer receipt confirmation
            $table->timestamp('received_date')->nullable()->after('delivery_proof');
            $table->unsignedBigInteger('received_by')->nullable()->after('received_date');
            $table->text('customer_notes')->nullable()->after('received_by')->comment('Customer feedback/notes on delivery');
            
            // Foreign key constraints
            $table->foreign('dispatched_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('delivered_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('received_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('po_requests', function (Blueprint $table) {
            $table->dropForeign(['dispatched_by']);
            $table->dropForeign(['delivered_by']);
            $table->dropForeign(['received_by']);
            
            $table->dropColumn([
                'delivery_status',
                'dispatch_date',
                'dispatched_by',
                'delivery_date', 
                'delivered_by',
                'delivery_proof',
                'received_date',
                'received_by',
                'customer_notes'
            ]);
        });
    }
}
