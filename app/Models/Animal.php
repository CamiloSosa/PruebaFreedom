<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = ['dangerous', 'age', 'corral_id'];

    /**
     * Corral Relationship
     * @return App\Models\Corral 
     */
    public function corral(){
        return $this->belongsTo('App\Models\Corral');
    }
}
