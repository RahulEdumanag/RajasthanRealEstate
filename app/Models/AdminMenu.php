<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{
    use HasFactory;

    protected $table = 'tbl_adminMenu';
    public $timestamps = false;
    protected $primaryKey = 'AddMen_Id';

    protected $fillable = ['AddMen_Status'];
}
