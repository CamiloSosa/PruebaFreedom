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

    /**
     * accessort to get corral name by id
     */
    public function getNameAttribute(){
        return "Corral: " . $this->id; 
    }

    /**
     * accessort to get the avg
     */
    public function getAvgAttribute(){
        return $this->animals->avg('age'); 
    }
}
