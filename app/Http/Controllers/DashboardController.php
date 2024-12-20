<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Uplink;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'status'); // Default sorting by 'status'
        $direction = $request->get('direction', 'asc'); // Default direction is ascending
    
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
            $devices = Device::orderBy($sort, $direction);
        }
    
        $devices = $devices->paginate(10)->withQueryString();
    
        // Add custom property for row number
        $currentPage = $devices->currentPage();
        $perPage = $devices->perPage();
        foreach ($devices as $index => $device) {
            $device->row_number = ($currentPage - 1) * $perPage + $index + 1;
        }
    
        $high = Uplink::where('arc', '>=', 1)
            ->whereHas('device') // Ensure the associated device exists
            ->count();
    
        $jumlah = Device::count();

        // $critical = Uplink::where('device_id', $device_id)->where('arc', '>=',1)->count();
    
        return view('pages.dashboard.index', [
            'devices' => $devices,
            'high' => $high,
            'jumlah' => $jumlah,
            'sort' => $sort,
            'direction' => $direction,
            // 'critical' => $critical

        ]);
    }
    
}
