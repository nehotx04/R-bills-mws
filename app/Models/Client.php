<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setUppercaseNameAttribute($value){
        $this->attributes['name']  = Str::ucfirst($value);
    }
    public function setUppercaseLastnameAttribute($value){
        $this->attributes['lastname']  = Str::ucfirst($value); 
    }

}
