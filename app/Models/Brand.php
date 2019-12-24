<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Brand extends Model
{
    use Uuids;

    protected $fillable = [
        'name', 'brief', 'web_address', 'active'
    ];

    protected $casts = [
        'id' => 'string',
    ];

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $guard_name = 'api';

    protected $dates = ['deleted_at'];

    protected $keyType = 'string';

    public function commoditys()
    {
        return $this->hasMany(Commodity::class);
    }
}
