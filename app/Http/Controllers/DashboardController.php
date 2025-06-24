<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Total Produk
        $productCount = Product::count();

        // Pending & Completed
        $pendingCount = Purchase::where('status', 'pending')->count();
        $completedCount = Purchase::where('status', 'completed')->count();

        // Produk Terpopuler
        $popularProducts = Product::withCount('purchases')
            ->get()
            ->map(function ($product) {
                return (object)[
                    'nama' => $product->nama,
                    'total_pembelian' => $product->purchases_count
                ];
            })
            ->sortByDesc('total_pembelian')
            ->values();

        // 7 Hari Terakhir
        $dailyLabels = [];
        $dailyValues = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $dailyLabels[] = $date->format('d M');
            $dailyValues[] = Purchase::whereDate('created_at', $date)->sum('total_harga');
        }

        // Bulanan
        $monthlyLabels = [];
        $monthlyValues = [];
        for ($m = 1; $m <= 12; $m++) {
            $monthlyLabels[] = Carbon::create()->month($m)->format('M');
            $monthlyValues[] = Purchase::whereYear('created_at', now()->year)
                ->whereMonth('created_at', $m)
                ->sum('total_harga');
        }

        // Tahunan
        $yearlyLabels = [];
        $yearlyValues = [];
        $startYear = now()->year - 4;
        for ($y = $startYear; $y <= now()->year; $y++) {
            $yearlyLabels[] = (string) $y;
            $yearlyValues[] = Purchase::whereYear('created_at', $y)->sum('total_harga');
        }

        return view('dashboard.index', compact(
            'productCount',
            'pendingCount',
            'completedCount',
            'popularProducts',
            'dailyLabels',
            'dailyValues',
            'monthlyLabels',
            'monthlyValues',
            'yearlyLabels',
            'yearlyValues',
        ));
    }
}
