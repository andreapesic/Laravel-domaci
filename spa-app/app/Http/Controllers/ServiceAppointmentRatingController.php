<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppointmentRating;
use App\Http\Resources\AppointmentRatingCollection;

class ServiceAppointmentRatingController extends Controller
{
    public function index($service_id)
    {
        $apprat = AppointmentRating::get()->where('service', $service_id);
        if (count($apprat) == 0)
            return response()->json('Data not found', 404);
        return new AppointmentRatingCollection($apprat);

    }
}
