<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promise extends Model
{
    use HasFactory;
    
     public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    /**
     * Get the user associated with the Promise
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function member()
    {
        return $this->hasOne(Member::class);
    }
}