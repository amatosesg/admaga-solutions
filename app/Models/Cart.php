<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Services;

class Cart extends Model
{
    use HasFactory;

    public function services(){
        return $this->morphToMany(Service::class, 'serviceable')->withPivot('quantity');
    }

    public function getTotalAttribute(){
        return $this->services->pluck('total')->sum();
    }
}
