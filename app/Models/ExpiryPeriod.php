<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class ExpiryPeriod extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    protected $table = 'tbl_expiryPeriod';
    public $timestamps = false;
    protected $primaryKey = 'ExpPer_Id';

    protected $fillable = ['ExpPer_Status'];
}
