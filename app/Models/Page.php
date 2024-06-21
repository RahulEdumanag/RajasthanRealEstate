<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Page extends Model
{
    use HasFactory;

    protected $table = 'tbl_page';
    public $timestamps = false;
    protected $primaryKey = 'Pag_Id';

    protected $fillable = ['Pag_Status'];

    public function category()
    {
        return $this->belongsTo(PageCategory::class, 'Pag_PagCat_Id');
    }
  // Boot method to apply global scopes
  protected static function boot()
  {
      parent::boot();
      $clientId = env('WEB_ID');

      static::addGlobalScope('statusAndOrder', function (Builder $builder)use ($clientId)  {
          $builder->where('Pag_Status', '!=', 2)->orderBy('Pag_CreatedDate', 'asc')->where('Pag_Reg_Id', '=',  $clientId);
      });
  }
     
}
