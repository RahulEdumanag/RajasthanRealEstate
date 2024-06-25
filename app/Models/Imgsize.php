<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imgsize extends Model
{
    protected $table = 'tbl_imagesize';

    protected $primaryKey = 'Img_Id';

    protected $fillable = ['Img_Status'];
    use HasFactory;
    public $timestamps = false; // Disable timestamp management

}
