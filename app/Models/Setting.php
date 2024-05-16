<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'tbl_setting';
    public $timestamps = false;
    protected $primaryKey = 'Set_Id';

    protected $fillable = ['Set_Status'];
    public function master()
    {
        return $this->belongsTo(Master::class, 'Mas_Id', 'Mas_Id');
    }
    public function imgsize()
    {
        return $this->belongsTo(Imgsize::class, 'Set_Img_Id', 'Img_Id');
    }
}
