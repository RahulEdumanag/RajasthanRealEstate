<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'tbl_gallery';
    public $timestamps = false;
    protected $primaryKey = 'Gall_Id';

    protected $fillable = [
        'Gall_Reg_Id',
        'Gall_GallCat_Id',
        'Gall_Image',
        'Gall_Status',
        'Gall_Name',
        'Gall_CreatedBy',
        'Gall_CreatedDate',
        'Gall_UpdatedBy',
        'Gall_UpdatedDate'
    ];


    public function galleryCat()
    {
        return $this->belongsTo(GalleryCategory::class, 'Gall_GallCat_Id', 'GallCat_Id');
    }
    
    
}
