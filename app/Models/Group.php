<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'bussiness_id',
        'name',
        'code'
    ];


    public function subGroups()
    {
        return $this->hasMany(SubGroup::class);
    }

    public function subDetails()
    {
        return $this->hasMany(SubDetails::class);
    }

    public function accountings()
    {
        return $this->hasMany(Accounting::class);
    }

    public function bussiness()
    {
        return $this->belongsTo(Bussiness::class);
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
