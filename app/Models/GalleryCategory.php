<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    use HasFactory;

    protected $table = 'tbl_gallerycategory';
    public $timestamps = false;
    protected $primaryKey = 'GallCat_Id';

    
    protected $fillable = [
        'GallCat_Reg_Id',
        'GallCat_Name',
        'GallCat_FullDesc',
        'GallCat_Image',
        'GallCat_Status',
        'GallCat_CreatedBy',
        'GallCat_CreatedDate',
        'GallCat_UpdatedBy',
        'GallCat_UpdatedDate'
    ];
}
