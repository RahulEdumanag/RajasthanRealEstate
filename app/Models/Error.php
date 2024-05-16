<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Error extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'tbl_errors';
    public $timestamps = false;
    protected $primaryKey = 'Error_Id';

    protected $fillable = ['Error_Status'];

    public function registration()
    {
        return $this->belongsTo(Registration::class, 'Error_Reg_Id', 'Reg_Id');
    }
}
