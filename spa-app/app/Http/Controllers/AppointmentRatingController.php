<?php

namespace App\Http\Controllers;

use App\Models\AppointmentRating;
use App\Models\Provider;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\AppointmentRatingResource;
use App\Http\Resources\AppointmentRatingCollection;
use Illuminate\Support\Facades\Validator;


class AppointmentRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new AppointmentRatingCollection(AppointmentRating::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date_and_time' => 'required|date',
            'service' => 'required|numeric|digits_between:1,5',
            'rating' => 'required|numeric|lte:5|gte:1',
            'note' => 'required|string|min:20',
            'provider' => 'required|numeric|digits_between:1,10',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        if(auth()->user()->isAdmin())
            return response()->json('You are not authorized to create new appointment ratings.'); 

        $apprat = AppointmentRating::create([
            'date_and_time' => $request->date_and_time,
            'user' => auth()->user()->id,
            'service' => $request->service,
            'rating' => $request->rating,
            'note' => $request->note,
            'provider' => $request->provider,
        ]);

        return response()->json(['Appointment rating is created successfully.', new AppointmentRatingResource($apprat)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AppointmentRating  $apprat
     * @return \Illuminate\Http\Response
     */
    public function show(AppointmentRating $apprat)
    {
        return new AppointmentRatingResource($apprat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AppointmentRating  $appointmentRating
     * @return \Illuminate\Http\Response
     */
    public function edit(AppointmentRating $appointmentRating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AppointmentRating  $appointmentRating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppointmentRating $apprat)
    {
        $validator = Validator::make($request->all(), [
            'date_and_time' => 'required|date',
            'service' => 'required|numeric|digits_between:1,5',
            'rating' => 'required|numeric|lte:5|gte:1',
            'note' => 'required|string|min:20',
            'provider' => 'required|numeric|digits_between:1,10',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        if(auth()->user()->isAdmin())
            return response()->json('You are not authorized to update appointment ratings.');    
            
        if(auth()->user()->id != $apprat->user)
            return response()->json('You are not authorized to update someone elses appointment ratings.');     

        $apprat->date_and_time = $request->date_and_time;
        $apprat->user = auth()->user()->id;
        $apprat->service = $request->service;
        $apprat->rating = $request->rating;
        $apprat->note = $request->note;
        $apprat->provider = $request->provider;

        $apprat->save();
        
        return response()->json(['Appointment rating is updated successfully.', new AppointmentRatingResource($apprat)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppointmentRating  $appointmentRating
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppointmentRating $apprat)
    {

        if(auth()->user()->isAdmin())
            return response()->json('You are not authorized to delete appointment ratings.');    
            
        if(auth()->user()->id != $apprat->user)
            return response()->json('You are not authorized to delete someone elses appointment ratings.');

        $apprat->delete();

        return response()->json('Appointment rating is deleted successfully.');
    }
}
