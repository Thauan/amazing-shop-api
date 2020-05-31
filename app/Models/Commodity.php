<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Commodity extends Model
{
    use Uuids;

    protected $fillable = [
        'name', 'price', 'description', 'brief'
    ];

    protected $casts = [
        'id' => 'string',
        'brands.pivot.id' => 'string'
    ];

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $guard_name = 'api';

    protected $dates = ['deleted_at'];

    protected $keyType = 'string';

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function brands()
    {
        return $this->belongsToMany(
            Brand::class,
            'brand_commodity',
            'commodity_id',
            'brand_id'
        );
    }

    public function variants()
    {
        return $this->belongsToMany(Variant::class, 'variants_id');
    }
}
