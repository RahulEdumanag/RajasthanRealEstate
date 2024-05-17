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
    protected $fillable = ['PTyp_Status'];

    public function country()
    {
        return $this->belongsTo(Country::class, 'PTyp_Cou_Id', 'Cou_Id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'Cit_PTyp_Id', 'PTyp_Id');
    }
}
