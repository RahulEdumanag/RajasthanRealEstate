<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AdminMenu extends Model
{
    use HasFactory;

    protected $table = 'tbl_adminMenu';
    public $timestamps = false;
    protected $primaryKey = 'AddMen_Id';

    protected $fillable = ['AddMen_Status'];

     // Boot method to apply global scopes
     protected static function boot()
     {
         parent::boot();
 
         static::addGlobalScope('statusAndOrder', function (Builder $builder) {
             $builder->where('AddMen_Status', '!=', 2);
         });
     }
}
