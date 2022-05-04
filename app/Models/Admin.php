<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    
    /**
     * Get all of the comments for the Admin
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function musuem_records()
    {
        return $this->hasMany(MuseumRecord::class);
    }

     public function user()
    {
        return $this->hasOne(UserAccount::class);
    }

    /**
     * Get all of the comments for the Admin
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tithes()
    {
        return $this->hasMany(Tithe::class);
    }

      public function offerings()
    {
        return $this->hasMany(Offering::class);
    }

      public function promises()
    {
        return $this->hasMany(Promise::class);
    }
}