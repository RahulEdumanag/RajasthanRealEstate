<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ContactCategory extends Model
{
    use HasFactory;

    protected $table = 'tbl_contactcategory';
    public $timestamps = false;
    protected $primaryKey = 'ConCat_Id';

    protected $fillable = ['ConCat_Status'];

        // Boot method to apply global scopes
        protected static function boot()
        {
            parent::boot();
            $clientId = env('WEB_ID');

            static::addGlobalScope('statusAndOrder', function (Builder $builder) use ($clientId) {
                $builder->where('ConCat_Status', '!=', 2)->where('ConCat_Reg_Id', '=', $clientId)->orderBy('ConCat_CreatedDate', 'desc');
            });
        } 

}
