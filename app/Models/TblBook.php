<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblBook extends Model
{
    use HasFactory;

    protected $fillable = [
                            'book_uniq_id',
                            'name',
                            'co_id',
                            'publisher_id',
                            'cover_photo'
                        ];

    public function contentOwner() 
    {
        $this->belongsTo('App\Models\ContentOwner::class');
    }

    public function publisher() 
    {
        $this->belongsTo('App\Models\Publisher::class');
    }
}
