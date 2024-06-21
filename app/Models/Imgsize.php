<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Imgsize extends Model
{
    protected $table = 'tbl_imagesize';

    protected $primaryKey = 'Img_Id';

    protected $fillable = ['Img_Status'];
    use HasFactory;
    public $timestamps = false; // Disable timestamp management


    
    // Boot method to apply global scopes
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('statusAndOrder', function (Builder $builder) {
            $builder->where('Img_Status', '!=', 2);
        });
    }

}
