<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class Registration extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    protected $table = 'tbl_registration';
    public $timestamps = false;
    protected $primaryKey = 'Reg_Id';

    protected $fillable = ['Reg_Status'];
}
