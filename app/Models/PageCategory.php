<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PageCategory extends Model
{
    use HasFactory;

    protected $table = 'tbl_pageCategory';
    public $timestamps = false;
    protected $primaryKey = 'PagCat_Id';

    protected $fillable = [
        'PagCat_Name',
        'PagCat_URL',
        'PagCat_AdminExists',
        'PagCat_ShortDescExists',
        'PagCat_FullDescExists',
        'PagCat_ShortDesc',
        'PagCat_FullDesc',
        'PagCat_SerialOrder',
        'PagCat_CreatedBy',
        'PagCat_CreatedDate',
        'PagCat_UpdatedBy',
        'PagCat_UpdatedDate',
        'PagCat_Image',
        'PagCat_Status',
    ];

    public static function getNextSerialOrder($pagCatCliId)
    {
        return self::where('PagCat_Reg_Id', $pagCatCliId)->max('PagCat_SerialOrder') + 1;
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('statusAndOrder', function (Builder $builder) {
            $builder->where('PagCat_Status', '!=', 2)->orderBy('PagCat_CreatedDate', 'desc');
        });
    } 

}
