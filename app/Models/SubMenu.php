<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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
    // Boot method to apply global scopes
    protected static function boot()
    {
        parent::boot();

        $clientId = env('WEB_ID');

        static::addGlobalScope('statusAndOrder', function (Builder $builder) use ($clientId) {
            $builder->where('SubMen_Status', '!=', 2)->where('SubMen_Reg_Id', '=', $clientId)->orderBy('SubMen_SerialOrder', 'asc');
        });
    }
}
