<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppointmentRating;
use App\Http\Resources\AppointmentRatingCollection;

class UserAppointmentRatingController extends Controller
{
    public function index($user_id)
    {
        $apprat = AppointmentRating::get()->where('user', $user_id);
        if (count($apprat) == 0)
            return response()->json('Data not found', 404);
        return new AppointmentRatingCollection($apprat);

    }

    public function myapprat()
    {
        if(auth()->user()->isAdmin())
            return response()->json('You are not allowed to have appointment ratings.');  
        $apprat = AppointmentRating::get()->where('user', auth()->user()->id);
        if (count($apprat) == 0)
            return response()->json('Data not found', 404);
        return new AppointmentRatingCollection($apprat);

    }
}
