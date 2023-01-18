<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bussiness extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'image',
        'number'
    ];

    public function groups()
    {
        return $this->hasMany(Group::class);
    }


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

    public function users()
    {
        return $this->belongsTo(Users::class);
    }


    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != '' ? asset('/storage/bussiness/' . $value) : 'https://ui-avatars.com/api/?name=' . str_replace(' ', '+', $this->name) . '&background=4e73df&color=ffffff&size=100',
        );
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
