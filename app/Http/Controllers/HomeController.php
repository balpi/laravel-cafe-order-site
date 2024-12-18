<?php

namespace App\Http\Controllers;
use App\Models\Settings;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Settings::first();
        $maincategories = DB::table('maincategories')->get();
        $categories = DB::table('categories')->get();

        return view("home.index", ['setting' => $setting, 'maincategory' => $maincategories, 'category' => $categories]);
    }
}
