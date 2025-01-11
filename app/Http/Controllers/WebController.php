<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $user = User::with('skills', 'projects')->where('email', 'marciel_mav@hotmail.com')->first();

        return view('web.index', ['user' => $user]);
    }
}
