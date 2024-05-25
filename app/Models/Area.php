<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class Area extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    protected $table = 'tbl_area';
    public $timestamps = false;
    protected $primaryKey = 'Are_Id';
    protected $fillable = ['Are_Status'];

    public function city()
    {
        return $this->belongsTo(City::class, 'Are_Cit_Id', 'Cit_Id');
    }


    public function cityy()
    {
        return $this->belongsTo(City::class, 'Cit_Id', 'Cit_Id');
    }
    // view
    // <td>{{ $value->city->Cit_Name }}</td>
    // <td>{{ $value->city->state->Sta_Name }}</td>
    // <td>{{ $value->city->state->country->Cou_Name }}</td>
}
