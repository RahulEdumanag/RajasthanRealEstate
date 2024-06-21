<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class GalleryCategory extends Model
{
    use HasFactory;

    protected $table = 'tbl_gallerycategory';
    public $timestamps = false;
    protected $primaryKey = 'GallCat_Id';

    protected $fillable = ['GallCat_Status'];

    protected static function boot()
    {
        parent::boot();
        $clientId = env('WEB_ID');

        static::addGlobalScope('statusAndOrder', function (Builder $builder)  use ($clientId)  {
            $builder->where('GallCat_Status', '!=', 2)->where('GallCat_Reg_Id', '=', $clientId);
        });
    }
}
