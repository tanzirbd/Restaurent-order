<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;

class HomeController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('admin.home.home-content');
    }

    public function homeV2(){
        return view('admin.homeV2.homeV2-content');
    }

    public function reservationDetails(){
        $reservations = Reservation::orderBy('id', 'dsc')->get();
        return view('admin.reservation.reservation-details',['reservations'=>$reservations]);
    }

    public function orderDetails(){
        $reservations = Reservation::orderBy('id', 'dsc')->get();
        return view('admin.reservation.reservation-details',['reservations'=>$reservations]);
    }
}
