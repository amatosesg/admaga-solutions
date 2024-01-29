<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;
use App\Models\User;
use App\Models\Service;
use App\Models\Enterprise;

class Order extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'customer_id'
    ];

    public function payment(){
        return $this->hasOne(Payment::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function enterprise(){
        return $this->belongsTo(Enterprise::class);
    }

    public function services(){
        return $this->morphToMany(Service::class, 'serviceable')->withPivot('quantity');
    }

    public function getTotalAttribute(){
        return $this->services->pluck('total')->sum();
    }
}
