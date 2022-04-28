<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class persentaseKarakterController extends Controller
{
    public function index()
    {
        return view ('fiturPresentaseKarakter.presentaseKarakter');
    }
}
