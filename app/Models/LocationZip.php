<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LocationZip extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'location_zips';
    protected $fillable = ['location_city_id','zip_code','status','is_read'];

    public function city()
    {
        return $this->belongsTo(LocationCity::class, 'location_city_id');
    }
}
