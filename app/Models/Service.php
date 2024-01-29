<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Cart;
use App\Models\Order;
use App\Scopes\AvailableScope;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'services';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'price',
        'status'
    ];

     /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new AvailableScope);
    }

    public function carts(){
        return $this->morphedByMany(Cart::class, 'serviceable')->withPivot('quantity');
    }
    
    public function orders(){
        return $this->morphedByMany(Order::class, 'serviceable')->withPivot('quantity');
    }

    public function scopeAvailable($query){
        $query->where('status', 'available');
    }

    public function getTotalAttribute(){
        return $this->pivot->quantity * $this->price;
    }
}
