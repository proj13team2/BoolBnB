<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use Carbon\Carbon;

class ChartApiController extends Controller
{
    //function to get the months from the db
    public function messagesChart(Request $request){
        $messages = Message::all();
        return response()->json([
            'success' => true,
            'count' => $messages->count(),
            'results' => $messages
        ])


    //     function getMonths(){
    //         //devo recuperare il mese dal "created_at"
    //         $dateMessages = Message::orderBy('created_at', 'ASC')
    //         ->pluck('created_at');
    //         $dateMessages = json_decode($dateMessages);
    //         if (!empty($dateMessages)) {
    //             foreach ($dateMessages as $completeDate) {
    //                 $month = Carbon::parse($completeDate->date)->format('M');
    //                 return $month;
    //             }
    //         }
    //         // $datesMessage = DB::table('messages')
    //         // ->whereMonth('created_at', '=', date('m'))
    //         // ->get();
    //         //
    //         // foreach ($datesMessage as $dateMessage) {
    //         //     $date = new \DateTime($dateMessage->created_at);
    //         //     $month = $date->format('m');
    //         //     return $month;
           
    //     }
    //     //function to get the messages(count) x month
    //     function getData($month)
    //     {
    //         $monthlyMessagesCount = Message::whereMonth('created_at', $month)
    //         ->get()
    //         ->count();
    //         dd($monthlyMessagesCount);
    //     }

    //     return response()->json(compact('month', 'monthlyMessagesCount'));
    // }
    };
