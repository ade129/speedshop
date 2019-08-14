<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Spareparts extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'spareparts';
    protected $primaryKey = 'idspareparts';

    protected $fillable = [
        'idcategories','namespareparts','codespareparts','brand','price','actcost','forecast','unit',
    ];
    protected $casts = [
        'active' => 'boolean'
    ];
    
    public function categories()
    {
        return $this->belongsTo('App\Models\Categories','idcategories');
    }
}
