<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class CredentialLog extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    protected $table = 'tbl_credential_log';
    public $timestamps = false;
    protected $primaryKey = 'CreLog_Id';

    protected $fillable = ['CreLog_Status'];
}
