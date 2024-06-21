<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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
    
    // Boot method to apply global scopes
    protected static function boot()
    {
        parent::boot();
    
        $clientId = env('WEB_ID');
    
        static::addGlobalScope('statusAndOrder', function (Builder $builder) use ($clientId) {
            $builder->where('Men_Status', '!=', 2)
                    ->where('Men_Reg_Id', '=', $clientId);
        });
    }
    
}
