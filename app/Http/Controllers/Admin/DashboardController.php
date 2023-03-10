<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\Information;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $totalCode = Code::count();
        $scannedCode = Code::where('scanned', 1)->count();
        $multScannedCode = Code::where('scanned', '>', 1)->count();
        $recentScanned = Information::latest()->take(10)->get();

        $stats = Code::query()
                ->select('id')
                ->addSelect(['last_30' => Code::selectRaw('count(*) as total')
                                ->whereDate('created_at', '<', now()->subDays(1))])
                ->addSelect(['new_codes' => Code::selectRaw('count(*) as total')
                                ->whereDate('created_at', '>=', now()->subDays(1))])
                ->addSelect(['scanned_codes' => Code::where('scanned', 1)->selectRaw('count(*) as total')
                                ->whereDate('created_at', '<', now()->subDays(1))])
                ->addSelect(['new_scanned_codes' => Code::where('scanned', 1)->selectRaw('count(*) as total')
                                ->whereDate('created_at', '>=', now()->subDays(1))])
                ->addSelect(['multi_scanned_codes' => Code::where('scanned', '>', 1)->selectRaw('count(*) as total')
                                ->whereDate('created_at', '<', now()->subDays(1))])
                ->addSelect(['new_multi_scanned_codes' => Code::where('scanned', '>', 1)->selectRaw('count(*) as total')
                                ->whereDate('created_at', '>=', now()->subDays(1))])
                ->first();

        $growthPercentage = $this->calculatePercentage($stats->last_30, $stats->new_codes);
        $scannedGrowthPercentage = $this->calculatePercentage($stats->scanned_codes, $stats->new_scanned_codes);
        $multiScannedGrowthPercentage = $this->calculatePercentage($stats->multi_scanned_codes, $stats->new_multi_scanned_codes);

        return view('dashboard.pages.dashboard', compact('totalCode', 'scannedCode', 'multScannedCode', 'recentScanned', 'growthPercentage', 'scannedGrowthPercentage', 'multiScannedGrowthPercentage'));
    }

    public function calculatePercentage($oldNumber, $newNumber){
        $decreaseValue =  $newNumber - $oldNumber;
        return ($decreaseValue / $oldNumber) * 100;
    }
}
