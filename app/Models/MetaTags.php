<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class MetaTags extends Model
{
    use HasFactory;

    protected $table = 'tbl_metaTags';
    public $timestamps = false;
    protected $primaryKey = 'Met_Id';

    protected $fillable = ['Met_Status'];
    // Boot method to apply global scopes
    protected static function boot()
    {
        parent::boot();
        $clientId = env('WEB_ID');

        static::addGlobalScope('statusAndOrder', function (Builder $builder) use ($clientId) {
            $builder->where('Met_Status', '!=', 2)->where('Met_Reg_Id', '=', $clientId);
        });
    }
}
