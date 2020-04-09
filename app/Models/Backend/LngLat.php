<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class LngLat extends Model
{
    // custom match table
    protected $table="company_lng_lat";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lng',
        'lat',
    ];

    function rules(){
        return [
            'lng'=> array('regex:/^(?:d*.d{1,2}|d+)$/','min:1','max:10'),
            'lat' => array('regex:/^(?:d*.d{1,2}|d+)$/','min:1','max:10')
        ]; 
    }
}
