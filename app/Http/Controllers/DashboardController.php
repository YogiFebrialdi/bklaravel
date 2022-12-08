<?php

namespace App\Http\Controllers;

use App\Models\Datasiswa;
use App\Models\Historypelanggaran;
use App\Models\Kelas;
use App\Models\User;
// use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data["count_siswa"] = Datasiswa::count();
        $data["count_guru"] = User::where("level", "guru")->count();
        $data["count_kelas"] = Kelas::count();
        $data["count_history"] = Historypelanggaran::count();

        // $data = Dashboard::where("siswa_id", $data->id);

        $data["urutkan"] = DB::select("SELECT siswa_id, SUM(bobot) AS total FROM historypelanggaran GROUP BY siswa_id ORDER BY SUM(bobot) DESC LIMIT 8;");

        return view('dashboard', $data);
    }
}
