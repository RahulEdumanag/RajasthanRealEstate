<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientMaster extends Model
{
    use HasFactory;

    protected $table = 'tbl_clientmaster';
    public $timestamps = false;
    protected $primaryKey = 'Cli_Id';

    protected $fillable = ['Cli_Status'];
}
