<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquirie extends Model
{
    use HasFactory;

    protected $table = 'tbl_enquirie';
    public $timestamps = false;
    protected $primaryKey = 'Enq_Id';

    protected $fillable = [
        'Enq_Reg_Id', 'Enq_ConCat_Id', 'Enq_Name', 'Enq_Number', 'Enq_Email',
        'Enq_Dob', 'Enq_Birthplace', 'Enq_Time', 'Enq_Status', 'Enq_CreatedBy',
        'Enq_CreatedDate', 'Enq_UpdatedBy', 'Enq_UpdatedDate',
    ];

}



 
