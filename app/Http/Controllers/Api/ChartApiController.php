<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use Carbon\Carbon;
use App\Apartment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChartApiController extends Controller
{
    //function to get the months from the db
    public function messagesChart(Request $request, $id){
        // $messages = $apartment->messages;

        // $messages_month = DB::table('messages')->select(DB::raw('count(messages)'),DB::raw( 'MONTH(created_at) month')->groupBy('month')->get();


        // SELECT apartments.id, COUNT(messages.id), MONTH(messages.created_at) as month FROM messages JOIN apartments ON apartments.id = messages.apartment_id GROUP BY month, apartments.id 
        // $messages_month = DB::tableraw('SELECT apartments.id, COUNT(messages.id), MONTH(messages.created_at) as month FROM messages JOIN apartments ON apartments.id = messages.apartment_id GROUP BY month, apartments.id ');

        
        $counted_messages = [];
        $total_count = 0;

        for ($i=1; $i <= 12; $i++) { 
            $count = 0;
            $month = $i;
            $messages_month = Message::whereMonth('created_at', $month)->get();
            foreach ($messages_month as $message_month) {
                if($message_month->apartment_id == $id) {
                    $count++;
                    $total_count++;
                }
            }
            array_push($counted_messages, $count);
        }

        

        return response()->json([
            'success' => true,
            'count' => $total_count,
            'results' => $counted_messages
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
    ;
    }
}
