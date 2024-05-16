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

    protected $fillable = ['Gall_Status'];
}
