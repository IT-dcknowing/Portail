<?php

namespace Modules\LandingPage\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Order;


class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.  
     */
    public function index()
    {
        $plans = Plan::where('is_active', 1)->get();
        return view('landingpage::index', compact('plans'));
    }

    public function simulateur()
    {
        return view('landingpage::create');
    }

    public function contact(Request $request) 
    {
        return view('landingpage::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('landingpage::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
