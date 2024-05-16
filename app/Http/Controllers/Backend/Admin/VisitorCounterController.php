<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorCounter;

class VisitorCounterController extends Controller
{
    public function countVisitor(Request $request)
    {
        // Get the visitor's IP address
        $visitorIp = $request->ip();

        // Get the current date
        $currentDate = now()->toDateString();

        // Check if the IP address already exists for the current day
        $visitor = VisitorCounter::where('Vis_Ip', $visitorIp)->whereDate('Vis_CreatedDate', $currentDate)->first();

        if ($visitor) {
            // IP address already exists, update the count
            $visitor->increment('Vis_Count');
        } else {
            // IP address doesn't exist, insert a new record
            VisitorCounter::create([
                'Log_Reg_Id' => 1, // Assuming the user ID is 1
                'Vis_Count' => 1,
                'Vis_Ip' => $visitorIp,
                'Vis_Location' => 'Unknown', // You can implement IP geolocation for more accurate location
                'Vis_CreatedDate' => now(),
            ]);
        }

        return response()->json(['message' => 'Visitor counted successfully']);
    }

    public function trackVisitor()
    {
        // Get the visitor's IP address
        $visitorIp = request()->ip();

        // Get the user's Log_Reg_Id from the session (replace with your actual session logic)
        $logRegId = session('log_reg_id');

        // Get the current date
        $currentDate = now()->format('Y-m-d');

        // Check if the IP address already exists for the current day
        $visitor = VisitorCounter::where('Vis_Ip', $visitorIp)->whereDate('Vis_CreatedDate', $currentDate)->first();

        if ($visitor) {
            // IP address already exists, update the count
            $visitor->increment('Vis_Count');
        } else {
            // IP address doesn't exist, insert a new record
            VisitorCounter::create([
                'Log_Reg_Id' => $logRegId, // Replace with your actual session logic
                'Vis_Count' => 1,
                'Vis_Ip' => $visitorIp,
                'Vis_Location' => 'Unknown', // You can implement IP geolocation here
                'Vis_CreatedDate' => now(),
            ]);
        }

        // Fetch the total count for the current day
        $totalCount = DB::table('tbl_visitorcounter')->whereDate('Vis_CreatedDate', $currentDate)->sum('Vis_Count');

        return view('your.view', compact('totalCount'));
    }
}
