<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;

    protected $table = 'tbl_submenu';
    public $timestamps = false;
    protected $primaryKey = 'SubMen_Id';

    protected $fillable = ['SubMen_Status'];

    public static function getNextSerialOrder($submenCliId)
    {
        return self::where('SubMen_Reg_Id', $submenCliId)->max('SubMen_SerialOrder') + 1;
    }
}
