<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Gallery;
use App\Models\Partner;
use App\Models\ProgramComponent;
use App\Models\Registration;
use App\Models\ScheduleItem;
use App\Models\SponsorOffer;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'counts' => [
                'registrations' => Registration::count(),
                'newRegistrations' => Registration::where('status', 'nouveau')->count(),
                'messages' => ContactMessage::count(),
                'unreadMessages' => ContactMessage::where('is_read', false)->count(),
                'partners' => Partner::count(),
                'galleries' => Gallery::count(),
                'components' => ProgramComponent::count(),
                'schedule' => ScheduleItem::count(),
                'offers' => SponsorOffer::count(),
            ],
            'latestRegistrations' => Registration::latest()->limit(6)->get(),
            'latestMessages' => ContactMessage::latest()->limit(5)->get(),
        ]);
    }
}
