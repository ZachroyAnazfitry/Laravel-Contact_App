<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name','address','email','website'];

    //define relationship method
    public function contacts()
    {
        //Contacts::class is an argument to related model,
        //second argument add if it is for specific column
        return $this->hasMany(Contacts::class);
    }
}
