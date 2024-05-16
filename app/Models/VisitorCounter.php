<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorCounter extends Model
{
    protected $table = 'tbl_visitorcounter';

    protected $fillable = ['Vis_Reg_Id', 'Vis_Ip', 'Vis_Location'];

    public $timestamps = false; // Add this line to indicate no created_at and updated_at columns
}
