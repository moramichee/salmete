<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Partner;
use App\Models\ProgramComponent;
use App\Models\ScheduleItem;
use App\Models\SponsorOffer;

class PageController extends Controller
{
    public function about()
    {
        return view('public.about');
    }

    public function program()
    {
        $components = ProgramComponent::where('is_visible', true)
            ->orderBy('sort_order')->get();

        $schedule = ScheduleItem::where('is_visible', true)
            ->orderBy('day_date')->orderBy('start_time')->get()
            ->groupBy(fn ($item) => $item->day_label);

        return view('public.program', compact('components', 'schedule'));
    }

    public function exhibitors()
    {
        $offers = SponsorOffer::where('is_visible', true)
            ->whereIn('audience', ['Institutions internationales', 'ONGs nationales', 'Centres de formation & écoles', 'Jeunes entrepreneurs & artisans'])
            ->orderBy('sort_order')->get();

        return view('public.exhibitors', compact('offers'));
    }

    public function gallery()
    {
        $galleries = Gallery::where('is_visible', true)
            ->orderBy('sort_order')->get();

        $categories = $galleries->pluck('category')->unique()->values();

        return view('public.gallery', compact('galleries', 'categories'));
    }

    public function partners()
    {
        $partners = Partner::where('is_visible', true)
            ->orderBy('category')->orderBy('sort_order')->get()
            ->groupBy('category');

        return view('public.partners', compact('partners'));
    }

    public function sponsoring()
    {
        $offers = SponsorOffer::where('is_visible', true)
            ->orderBy('sort_order')->get();

        return view('public.sponsoring', compact('offers'));
    }

    public function contact()
    {
        return view('public.contact');
    }
}
