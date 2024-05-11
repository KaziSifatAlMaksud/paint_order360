<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    protected $fillable = ['user_id', 'customer_id', 'send_email', 'inv_number', 'date', 'purchase_order', 'job_id', 'address', 'description', 'attachment', 'attachment1', 'attachment2', 'job_details', 'amount', 'gst', 'total_due', 'status', 'batch', 'send_to'];


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    protected $appends = ['total_payments'];
    public function getTotalPaymentsAttribute()
    {
        if (!array_key_exists('invoicePayments', $this->relations)) $this->load('invoicePayments');
        return $this->invoicePayments->sum('amount_main');
    }

    public function invoicePayments()
    {
        return $this->hasMany(InvoicePayment::class, 'invoice_id');
    }
 
}
