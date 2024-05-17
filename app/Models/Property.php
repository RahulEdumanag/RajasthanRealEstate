<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'tbl_website_information';
    public $timestamps = false;
    protected $primaryKey = 'Pro_Id';

    protected $fillable = ['Pro_Status'];
}
