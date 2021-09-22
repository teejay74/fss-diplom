<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Movie;
use App\Models\MovieShow;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class HallController extends Controller

{

    public function index()
    {
        return Hall::all();
    }

    public function saveSeats($hall) {
        $rows = $hall->row;
        $seats = $hall->seats;
        $hall_id = $hall->id;

        for ($rowNumber = 1; $rowNumber <= $rows; $rowNumber++) {
            for ($seatNumber = 1; $seatNumber <= $seats; $seatNumber++) {
                $seat = new Seat();
                $seat->hall_id = $hall_id;
                $seat->row_number = $rowNumber;
                $seat->seat_number = $seatNumber;
                $seat->status = 1;
                $seat->save();
            }
        }
    }

    public function saveStatus($req) {
        $seatsStatuses = $req->seatsStatus;
        foreach ($seatsStatuses as $value) {
            $seat = Seat::all()->where('hall_id', $req->id)->where('row_number', $value['row'])->where('seat_number', $value['seat'])->first();
            $seat->status = $value['status'];
            $seat->save();
        }
    }

    public function deleteSeats($id) {
            $seatsArr = Seat::all()->where('hall_id', $id);
            foreach($seatsArr as $seat) {
                $seat->delete();
            }
    }

    public function deleteSessions($id) {
        $sessionsArr = MovieShow::all()->where('hall_id', $id);
        foreach($sessionsArr as $session) {
            $session->delete();
        }
    }

    public function store (Request $request) {

        try {
            $this->validate($request, [
                'nameHall' => 'required|between:3,25'
            ]);
            $hall = new Hall();
            $hall->name = $request->nameHall;
            $hall->row = 5;
            $hall->seats = 5;
            $hall->price = 350;
            $hall->vip_price = 600;
            $hall->is_active = false;
            $hall->save();
            $this->saveSeats($hall);


            return Hall::all();
        } catch (ValidationException $e) {
            return Hall::all();
        }

    }

    public function deleteHall (Request $request) {
        $hall = Hall::findOrFail($request->id);
        $this->deleteSeats($hall->id);
        $this->deleteSessions($hall->id);
        $hall->delete();
        return Hall::all();
    }

    public function getCurrentHall (Request $request) {
        $currentHall = Hall::findOrFail($request->id);

        $allSeats = [];
        foreach(Seat::all()->where('hall_id', $request->id) as $value) {
            array_push($allSeats, $value);
        }
        $currentHall->allSeats = $allSeats;

        return $currentHall;
    }

    public function updateHall (Request $request) {

        $updatingHall = Hall::findOrFail($request->id);
        $updatingHall->row = $request->row;
        $updatingHall->seats = $request->seats;
        $updatingHall->save();
        $this->deleteSeats($updatingHall->id);
        $this->saveSeats($updatingHall);
        $this->saveStatus($request);;

        return $updatingHall;
    }

}
