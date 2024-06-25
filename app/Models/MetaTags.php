<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaTags extends Model
{
    use HasFactory;

    protected $table = 'tbl_metaTags';
    public $timestamps = false;
    protected $primaryKey = 'Met_Id';

    protected $fillable = ['Met_Status'];

    
}
