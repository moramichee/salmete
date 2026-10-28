<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Partner;
use App\Models\ProgramComponent;
use App\Models\Registration;
use App\Models\ScheduleItem;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        return view('public.home', [
            'components' => ProgramComponent::where('is_visible', true)
                ->orderBy('sort_order')->limit(6)->get(),
            'partners' => Partner::where('is_visible', true)
                ->orderBy('sort_order')->limit(12)->get(),
            'galleries' => Gallery::where('is_visible', true)
                ->orderBy('sort_order')->limit(8)->get(),
            'nextSessions' => ScheduleItem::where('is_visible', true)
                ->orderBy('day_date')->orderBy('start_time')->limit(5)->get(),
            'registrationCount' => Registration::count(),
        ]);
    }
}
