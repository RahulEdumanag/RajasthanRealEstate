<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class PropertyFeatures extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    protected $table = 'tbl_propertyfeatures';
    public $timestamps = false;
    protected $primaryKey = 'PFea_Id';
    protected $fillable = ['PFea_Status'];

    public function country()
    {
        return $this->belongsTo(Country::class, 'PFea_Cou_Id', 'Cou_Id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'Cit_PFea_Id', 'PFea_Id');
    }
}
