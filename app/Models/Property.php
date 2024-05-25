<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Property extends Model
{
    use HasFactory;
    protected $table = 'tbl_property';
    public $timestamps = false;
    protected $primaryKey = 'PId';
    protected $fillable = ['PReg_Id', 'PPTyp_Id', 'PPFea_Id', 'PCit_Id', 'PPropertycode', 'PTitle', 'PShortDesc', 'PFullDesc', 'PAddress', 'PTag', 'PFeatured', 'PBedRoom', 'PBathRoom', 'PSqureFeet', 'PMapLink', 'PAmount', 'PImages', 'PPlansImage', 'PStatus', 'PCreatedBy', 'PCreatedDate', 'PUpdatedBy', 'PUpdatedDate'];
    // Define the relationship with PropertyType
    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'PPTyp_Id', 'PTyp_Id');
    }

    public function propertyFeatures()
    {
        return $this->belongsTo(PropertyFeatures::class, 'PPFea_Id', 'PFea_Id');
    }
    public function getRandomImage()
    {
        $images = explode(',', $this->PImages);
        return trim($images[array_rand($images)]);
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'Cit_Id', 'PCit_Id');
    }

    public function cityy()
    {
        return $this->belongsTo(City::class, 'PCit_Id', 'Cit_Id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'PAre_Id', 'Are_Id');
    }
}
