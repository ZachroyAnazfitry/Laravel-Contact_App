<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
   use HasFactory;
   // define protected columns to avoid error when isnerting data using create() method
   protected $fillable = ['first_name','last_name','phone','email','address','company_id'];
   //define inverse relationship method
   public function company()
   {

      return $this->belongsTo(Company::class);
      //omit second argument(ex: Company::class,'company_id')
   }
}

