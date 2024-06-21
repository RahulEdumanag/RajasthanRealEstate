<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;

class Registration extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    protected $table = 'tbl_registration';
    public $timestamps = false;
    protected $primaryKey = 'Reg_Id';

    protected $fillable = ['Reg_Status'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('statusAndOrder', function (Builder $builder) {
            $builder->where('Reg_Status', '!=', 2)->where('Reg_Id', '!=', 1)->whereNull('Reg_DeletedDate');
        });
    }

}
