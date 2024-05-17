<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class State extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    protected $table = 'tbl_state';
    public $timestamps = false;
    protected $primaryKey = 'Sta_Id';
    protected $fillable = ['Sta_Status'];

    public function country()
    {
        return $this->belongsTo(Country::class, 'Sta_Cou_Id', 'Cou_Id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'Cit_Sta_Id', 'Sta_Id');
    }
}
