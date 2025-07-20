<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoRequest extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    // Delivery status constants
    const DELIVERY_READY = 'ready';
    const DELIVERY_DISPATCHED = 'dispatched';
    const DELIVERY_DELIVERED = 'delivered';
    const DELIVERY_RECEIVED = 'received';
    
    protected $casts = [
        'dispatch_date' => 'datetime',
        'delivery_date' => 'datetime',
        'received_date' => 'datetime',
    ];
    
    // Relationships for delivery tracking
    public function dispatchedBy()
    {
        return $this->belongsTo(User::class, 'dispatched_by');
    }
    
    public function deliveredBy()
    {
        return $this->belongsTo(User::class, 'delivered_by');
    }
    
    public function receivedBy()
    {
        return $this->belongsTo(User::class, 'received_by');
    }
    
    public function armada()
    {
        return $this->belongsTo(Truck::class, 'id_armada');
    }
    
    public function driver()
    {
        return $this->belongsTo(User::class, 'id_driver');
    }
    
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'disiapkan_oleh');
    }
    
    // Helper methods for delivery status
    public function isReady()
    {
        return $this->delivery_status === self::DELIVERY_READY;
    }
    
    public function isDispatched()
    {
        return $this->delivery_status === self::DELIVERY_DISPATCHED;
    }
    
    public function isDelivered()
    {
        return $this->delivery_status === self::DELIVERY_DELIVERED;
    }
    
    public function isReceived()
    {
        return $this->delivery_status === self::DELIVERY_RECEIVED;
    }
    
    public function canDispatch()
    {
        return $this->last_process_by == 4 && 
               !empty($this->id_armada) && 
               !empty($this->id_driver) && 
               $this->isReady();
    }
    
    public function canDeliver()
    {
        return $this->isDispatched();
    }
    
    public function canReceive()
    {
        return $this->isDelivered();
    }
}
