<?php

namespace App\Models;

use App\Models\AppointmentRating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    public $primaryKey = 'id';

    public function appointmentrating() {
        return $this->hasMany(AppointmentRating::class);
    }

    protected $fillable = [
        'name',
    ];
}
