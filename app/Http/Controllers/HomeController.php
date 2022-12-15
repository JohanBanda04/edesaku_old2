<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Models\File;

class HomeController extends Controller {

    public static function index(){
        $dateJson = json_decode(Storage::get('date.json'));
        $limitTime = Carbon::create($dateJson->year, $dateJson->month, $dateJson->date, 23, 59, 59, 'Asia/Singapore');
        $serverTime = Carbon::now('Asia/Singapore');
        $indonesianDayOfWeek = function($dayOfWeek){
            switch ($dayOfWeek) {
                case 0: return "Minggu";
                case 1: return "Senin";
                case 2: return "Selasa";
                case 3: return "Rabu";
                case 4: return "Kamis";
                case 5: return "Jumat";
                case 6: return "Sabtu";
                default: return "?";
            }
        };
        $indonesianMonth = function($month){
            switch ($month) {
                case 1: return "Januari";
                case 2: return "Februari";
                case 3: return "Maret";
                case 4: return "April";
                case 5: return "Mei";
                case 6: return "Juni";
                case 7: return "Juli";
                case 8: return "Agustus";
                case 9: return "September";
                case 10: return "Oktober";
                case 11: return "November";
                case 12: return "Desember";
                default: return "?";
            }
        };
        $limitTimeStr =
            $indonesianDayOfWeek($limitTime->dayOfWeek) .
            ", " . $limitTime->day .
            " " . $indonesianMonth($limitTime->month) .
            " " . $limitTime->year;

        $files = File::get();
        return view('welcome', [
            'limitTimeStr' => $limitTimeStr,
            'limitTime' => $limitTime->toISOString(),
            'serverTime' => $serverTime->toISOString(),
            'gantiTanggal' => $dateJson,
            'files' => $files,
        ]);
    }
    
    public static function change_time_limit(Request $request) {
        $request->validate([
            'date' => 'required|numeric|min:1|max:31',
            'month' => 'required|numeric|min:1|max:12',
            'year' => 'required|numeric|min:2022|max:2023',
        ]);
        if (Storage::put('date.json', json_encode($request->except('_token')))){
            return redirect("/");
        };
    }
};