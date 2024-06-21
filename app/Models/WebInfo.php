<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class WebInfo extends Model
{
    use HasFactory;

    protected $table = 'tbl_website_information';
    public $timestamps = false;
    protected $primaryKey = 'WebInf_Id';

    protected $fillable = ['WebInf_Status'];

    
    // Boot method to apply global scopes
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('statusAndOrder', function (Builder $builder) {
            $builder->where('WebInf_Status', '!=', 2)->where('WebInf_Id', '!=', 1)->orderBy('WebInf_CreatedDate', 'desc');
        });
    } 


}
