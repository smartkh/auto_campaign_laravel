<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Geographical;

class Cell extends Model
{
    #custom match table
    protected $table="tbCell";

	#Change default mile to kilometer assoiated with Geographical
    protected static $kilometers = true;


     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'id',
        'bts',
        'name',
        'lng',
        'lat',
    ];
}
