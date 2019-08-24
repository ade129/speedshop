<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Services extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'services';
    protected $primaryKey = 'idservices';

    public function services_details()
    {
        return $this->hasMany('App\Models\ServicesDetails','idservices');
    }
    
}
