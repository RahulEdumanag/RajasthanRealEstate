<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminMenuAllotment extends Model
{
    use HasFactory;

    protected $table = 'tbl_adminMenuAllotment';
    public $timestamps = false;
    protected $primaryKey = 'Add_MenAllo_Id';

    protected $fillable = ['Add_MenAllo_Status'];

    public function adminMenu()
    {
        return $this->belongsTo(AdminMenu::class, 'Add_MenAllo_AddMen_Id', 'AddMen_Id');
    }
}
