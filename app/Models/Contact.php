<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'tbl_Contact';
    public $timestamps = false;
    protected $primaryKey = 'Con_Id';

    protected $fillable = ['Con_Reg_Id', 'Con_Name', 'Con_Email', 'Con_Number', 'Con_Desc', 'Con_ConCat_Id', 'Con_Attachment', 'Con_PId','Con_Status'];

    // Contact.php

    public function property()
    {
        return $this->belongsTo(Property::class, 'Con_PId', 'PId');
    }


    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'Con_PId', 'PTyp_Id');
    }
   
}
