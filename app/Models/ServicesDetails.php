<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicesDetails extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'services_details';
    protected $primaryKey = 'idservicesdetails';
    

    public function spareparts()
    {
        return $this->belongsTo('App\Models\Spareparts','idspareparts');
    }
}
