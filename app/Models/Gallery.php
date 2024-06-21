<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'tbl_gallery';
    public $timestamps = false;
    protected $primaryKey = 'Gall_Id';

    protected $fillable = ['Gall_Status'];

    // Boot method to apply global scopes
    protected static function boot()
    {
        parent::boot();
        $clientId = env('WEB_ID');

        static::addGlobalScope('statusAndOrder', function (Builder $builder)  use ($clientId) {
            $builder->where('Gall_Status', '!=', 2)->where('Gall_Reg_Id', '=', $clientId);
        });
    } 
}
