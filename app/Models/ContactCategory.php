<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactCategory extends Model
{
    use HasFactory;

    protected $table = 'tbl_contactcategory';
    public $timestamps = false;
    protected $primaryKey = 'ConCat_Id';

    protected $fillable = ['ConCat_Status'];
}
