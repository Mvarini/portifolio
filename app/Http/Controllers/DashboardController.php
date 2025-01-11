<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::where('email', 'marciel_mav@hotmail.com')->first()->load('skills', 'projects');

        $skillCount = $user->skills->count();
        $projectCount = $user->projects->count();
        $projectAnalistaCount = $user->projects->where('category', 'Analista')->count();
        $projectDesenvolvedorCount = $user->projects->where('category', 'Desenvolvedor')->count();

        $userCount = User::count();


        return view('dashboard.index', [
            'menu' => 'dashboard',
            'skillCount' => $skillCount,
            'projectCount' => $projectCount,
            'userCount' => $userCount,
            'projectAnalistaCount' => $projectAnalistaCount,
            'projectDesenvolvedorCount' => $projectDesenvolvedorCount,
        ]);
    }
}
