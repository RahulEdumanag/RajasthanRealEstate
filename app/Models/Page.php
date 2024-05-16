<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = 'tbl_page';
    public $timestamps = false;
    protected $primaryKey = 'Pag_Id';

    protected $fillable = ['Pag_Status'];

    public function category()
    {
        return $this->belongsTo(PageCategory::class, 'Pag_PagCat_Id');
    }

     
}
