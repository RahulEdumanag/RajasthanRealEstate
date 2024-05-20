<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class PropertyType extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    protected $table = 'tbl_propertytype';
    public $timestamps = false;
    protected $primaryKey = 'PTyp_Id';
    protected $fillable = [
        'PTyp_Reg_Id',
        'PTyp_Name',
        'PTyp_Status',
        'PTyp_CreatedBy',
        'PTyp_CreatedDate',
        'PTyp_UpdatedBy',
        'PTyp_UpdatedDate'
    ];


    public function country()
    {
        return $this->belongsTo(Country::class, 'PTyp_Cou_Id', 'Cou_Id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'Cit_PTyp_Id', 'PTyp_Id');
    }

    public function properties()
    {
        return $this->hasMany(Property::class, 'PPTyp_Id', 'PTyp_Id');
    }
}
