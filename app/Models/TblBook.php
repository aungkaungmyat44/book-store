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
        return$this->belongsTo('App\Models\ContentOwner', 'co_id', 'id');
    }

    public function publisher() 
    {
        return $this->belongsTo('App\Models\Publisher', 'publisher_id', 'id');
    }

    public function getCreatedAtAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }
}
