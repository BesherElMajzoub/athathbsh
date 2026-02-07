<?php

namespace App\Http\Controllers;

use App\Models\ClickEvent;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(Request $request): View
    {
        $typeFilter = $request->input('type');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        // Summary cards
        $whatsappToday = ClickEvent::whatsapp()->today()->count();
        $callToday = ClickEvent::call()->today()->count();
        $whatsappWeek = ClickEvent::whatsapp()->lastSevenDays()->count();
        $callWeek = ClickEvent::call()->lastSevenDays()->count();

        // Recent clicks query
        $query = ClickEvent::query()->latest();

        if ($typeFilter && in_array($typeFilter, ['whatsapp', 'call'])) {
            $query->where('type', $typeFilter);
        }

        if ($dateFrom) {
            $query->whereDate('created_at', '>=', $dateFrom);
        }

        if ($dateTo) {
            $query->whereDate('created_at', '<=', $dateTo);
        }

        $recentClicks = $query->limit(200)->get();

        return view('admin.dashboard', compact(
            'whatsappToday',
            'callToday',
            'whatsappWeek',
            'callWeek',
            'recentClicks',
            'typeFilter',
            'dateFrom',
            'dateTo'
        ));
    }
}
