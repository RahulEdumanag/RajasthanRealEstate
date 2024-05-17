<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class City extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    protected $table = 'tbl_city';
    public $timestamps = false;
    protected $primaryKey = 'Cit_Id';
    protected $fillable = ['Cit_Status'];

    public function state()
    {
        return $this->belongsTo(State::class, 'Cit_Sta_Id', 'Sta_Id');
    }

    public function areas()
    {
        return $this->hasMany(Area::class, 'Are_Cit_Id', 'Cit_Id');
    }
}
