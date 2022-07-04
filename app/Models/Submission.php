<?php

namespace App\Models;

use App\Mail\FormSubmitted;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Submission extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone_number',
        'whatsapp_number',
        'nationality',
        'language',
        'status',
        'package'
    ];


    public function getCreatedAtAttribute($value) {
        $date = Carbon::createFromTimestamp(strtotime($value), env("APP_TIMEZONE"));
        if($date->isToday()) {
            return $date->format('\\T\\o\\d\\a\\y H:i:s ');
        } elseif($date->isYesterday()) {
            return $date->format('\\Y\\e\\s\\t\\e\\r\\d\\a\\y H:i:s');
        } else {
            return $date->format('d-m-Y H:i:s ');
        }
    }

    public function sendNotificationEmail() {
        Mail::to($this->attributes['email'])->queue(new FormSubmitted($this));
    }

    public function getNameAttribute($value) {
        return ucwords($value);
    }

    public function getStatusAttribute($value) {
        return ucwords($value);
    }

    public function getSurnameAttribute($value) {
        return ucwords($value);
    }
}
