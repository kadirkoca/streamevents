<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index(Request $request): Response
    {
        $page = $request->get('page') ?? 1;
        $user =  $request->user();
        $followers = $user->Followers()->paginate(
            $perPage = 25, $columns = ['*'], $pageName = 'followers', $page
        )->items();
        $donations = $user->Donations()->paginate(
            $perPage = 25, $columns = ['*'], $pageName = 'donations', $page
        )->items();
        $merchSales = $user->MerchSales()->paginate(
            $perPage = 25, $columns = ['*'], $pageName = 'merchsales', $page
        )->items();
        $subscribers = $user->Subscribers()->paginate(
            $perPage = 25, $columns = ['*'], $pageName = 'subscribers', $page
        )->items();

        $events['followers'] = $followers;
        $events['donations'] = $donations;
        $events['merchSales'] = $merchSales;
        $events['subscribers'] = $subscribers;

        return Inertia::render('Dashboard', [
            'events' => $events,
        ]);
    }
}
