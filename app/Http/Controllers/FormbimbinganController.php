<?php

namespace App\Http\Controllers;

use App\Models\Formbimbingan;
use Illuminate\Http\Request;

class FormbimbinganController extends Controller
{
    public function index(){
        return view('Form.formbimbingan');
    }
}
