<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'tbl_Menu';
    public $timestamps = false;
    protected $primaryKey = 'Men_Id';

    protected $fillable = ['Men_Status'];

    public static function getNextSerialOrder($menCliId)
    {
        return self::where('Men_Reg_Id', $menCliId)->max('Men_SerialOrder') + 1;
    }

    public function submenus()
    {
        return $this->hasMany(Submenu::class, 'SubMen_Men_Id', 'Men_Id');
    }
}
