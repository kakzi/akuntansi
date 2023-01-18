<?php

namespace App\Models;

use App\Models\Group;
use App\Models\SubGroup;
use App\Models\Bussiness;
use App\Models\Accounting;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'bussiness_id',
        'group_id',
        'sub_group_id',
        'name',
        'code'
    ];

    public function accountings()
    {
        return $this->hasMany(Accounting::class);
    }

    public function bussiness()
    {
        return $this->belongsTo(Bussiness::class);
    }

    public function groups()
    {
        return $this->belongsTo(Group::class);
    }

    public function subGroups()
    {
        return $this->belongsTo(SubGroup::class);
    }

    /**
     * createdAt
     *
     * @return Attribute
     */
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d-M-Y'),
        );
    }

    /**
     * updatedAt
     *
     * @return Attribute
     */
    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d-M-Y'),
        );
    }
}
