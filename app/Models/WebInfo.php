<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebInfo extends Model
{
    use HasFactory;

    protected $table = 'tbl_website_information';
    public $timestamps = false;
    protected $primaryKey = 'WebInf_Id';

    protected $fillable = ['WebInf_Status'];
}
