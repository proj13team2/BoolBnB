<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use Carbon\Carbon;
use App\Apartment;
use App\Visualization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChartApiController extends Controller
{
    //function to get the months from the db
    public function messagesChart(Request $request, $id){
        
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
        ]);
    }

    public function visualizationsChart(Request $request, $id){
        
        $counted_visualizations = [];
        $total_count = 0;

        for ($i=1; $i <= 12; $i++) { 
            $count = 0;
            $month = $i;
            $visualizations_month = Visualization::whereMonth('created_at', $month)->get();
            foreach ($visualizations_month as $visualization_month) {
                if($visualization_month->apartment_id == $id) {
                    $count++;
                    $total_count++;
                }
            }
            array_push($counted_visualizations, $count);
        }

        return response()->json([
            'success' => true,
            'count' => $total_count,
            'results' => $counted_visualizations
        ]);
    }
}
