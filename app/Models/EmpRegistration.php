<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class EmpRegistration extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'tbl_employee_registration';
    public $timestamps = false;
    protected $primaryKey = 'Emp_Id';

    protected $fillable = [
        'Emp_Status',
        'Emp_Email',
    ];
}
