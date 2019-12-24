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
    ];

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $guard_name = 'api';

    protected $dates = ['deleted_at'];

    protected $keyType = 'string';

    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function variants()
    {
        return $this->belongsTo(Variant::class, 'variant_id');
    }
}
