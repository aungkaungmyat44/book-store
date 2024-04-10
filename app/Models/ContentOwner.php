<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentOwner extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function books() 
    {
        $this->hasMany('App\Models\TblBook::class');
    }
}
