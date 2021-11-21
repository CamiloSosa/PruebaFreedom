<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corral extends Model
{
    use HasFactory;

    protected $fillable = ['max_quantity'];

    /**
     * Animals Relationship
     * @return collection
     */
    public function animals(){
        return $this->hasMany('App\Models\Animal');
    }
}
