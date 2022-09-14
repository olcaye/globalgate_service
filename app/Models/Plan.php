<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $appends = ['duration_with_month', 'price_with_symbol'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function getNameAttribute($value) {
        return ucwords($value);
    }

    public function getDurationWithMonthAttribute(){
        return $this->duration . ' Months';
    }

    public function getPriceWithSymbolAttribute(){
        return $this->price . ' €';
    }
}
