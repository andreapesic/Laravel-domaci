<?php

namespace App\Models;

use App\Models\User;
use App\Models\Service;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentRating extends Model
{
    use HasFactory;

    protected $table = 'appointments_ratings';

    public $primaryKey = 'id';

    public function userkey() {
        return $this->belongsTo(User::class, 'user');
    }

    public function servicekey() {
        return $this->belongsTo(Service::class, 'service');
    }

    public function providerkey() {
        return $this->belongsTo(Provider::class, 'provider');
    }

}
