<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentRating extends Model
{
    use HasFactory;

    protected $table = 'appointments_ratings';

    public $primaryKey = 'id';


}
