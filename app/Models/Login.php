<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class Login extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    protected $fillable = ['Log_Username', 'Log_Password', 'Log_Status'];
    
    protected $table = 'tbl_login';
    public $timestamps = false;
    protected $primaryKey = 'Log_Id';

    public function getAuthPassword()
    {
        return $this->Log_Password;
    }

    public function registration()
    {
        return $this->belongsTo(Registration::class, 'Log_Reg_Id', 'Reg_Id');
    }

    public function empRegistration()
    {
        return $this->belongsTo(EmpRegistration::class, 'Log_Emp_Id', 'Emp_Id');
    }
}
