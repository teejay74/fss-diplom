<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Hall;
use App\Models\Movie;
use App\Models\MovieShow;
use SimpleSoftwareIO\QrCode\Generator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Order;

class TicketController extends Controller
{
    public function index(Request $request) {
        $hallName = Hall::where('id', $request->hallId)->first()->name;
        $movieName = Movie::where('id', $request->movieId)->first()->name;
        $startTime = MovieShow::where('id', $request->sessionId)->first()->start_time;
        $startDay = MovieShow::where('id', $request->sessionId)->first()->start_day;

        $newTicket = new Ticket();
        $newTicket->show_id = $request->sessionId;
        $newTicket->start_time = $startTime;
        $newTicket->seats = $request->seats;
        $newTicket->hall_name = $hallName;
        $newTicket->start_day = $startDay;
        $newTicket->price = $request->price;
        $newTicket->movie = $movieName;
        try{
            $newTicket->save();
        }
        catch(\Exception $e){
            // do task when error
            return $e->getMessage();   // insert query
        }

        $newOrder = new Order();
        $newOrder->show_id = $request->sessionId;
        $newOrder->seats = $request->seats;
        try{
            $newOrder->save();
        }
        catch(\Exception $e){
            // do task when error
            return $e->getMessage();   // insert query
        }

        $qrtext = "Time: $startTime,
        Hall: $hallName,
        Movie: $movieName
        Date: $startDay";

        $qrtextDecode = utf8_encode($qrtext);
        $qrCode = QrCode::size(300)->generate($qrtextDecode);
        return $qrCode;

    }

    public function getOrders (Request $request) {
        $ordersArr = [];

        try {
            $Orders = Order::where('show_id', $request->id)->get();
            foreach ($Orders as $order) {
                $test = json_decode($order->seats);
                foreach ($test as $value) {
                    array_push($ordersArr, $value);
                }
            }
            return $ordersArr;
        }
        catch(\Exception $e){
            // do task when error
            return $e->getMessage();   // insert query
        }

    }
}
