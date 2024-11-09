<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Uplink;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Get the sort direction (asc or desc) and the column to sort by from the request
        $sort = $request->get('sort', 'status'); // Default to sorting by 'status'
        $direction = $request->get('direction', 'asc'); // Default direction is ascending
    
        // Custom sorting using CASE for SQLite
        if ($sort == 'status') {
            $devices = Device::orderByRaw("
                CASE status
                    WHEN 'High' THEN 1
                    WHEN 'Medium' THEN 2
                    WHEN 'Low' THEN 3
                    ELSE 4
                END {$direction}
            ");
        } else {
            // Default sorting by ID (or other fields)
            $devices = Device::orderBy($sort, $direction);
        }
    
        // Paginate the results (10 devices per page)
        $devices = $devices->paginate(10)->withQueryString();
    
        // Count of devices with 'High' severity status
        $high = Device::where('status', 'High')->count();
    
        // Total device count
        $jumlah = Device::count();
    
        // Return the view with the sorted and paginated devices and other data
        return view('pages.dashboard.index', [
            'devices' => $devices,
            'high' => $high,
            'jumlah' => $jumlah,
            'sort' => $sort,
            'direction' => $direction
        ]);
    }
    

    
    
}
