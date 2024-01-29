<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class PanelService extends Service
{
    use HasFactory;

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        
    }

    public function getForeignKey(){
        $parent = get_parent_class($this);
        return (new $parent)->getForeignKey();
    }

    public function getMorphClass(){
        $parent = get_parent_class($this);
        return (new $parent)->getMorphClass();
    }
}
