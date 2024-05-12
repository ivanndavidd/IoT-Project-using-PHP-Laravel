<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelProject;

class ControllerProject extends Controller
{
    public function levelsensorfunc()
    {
        //baca, ambil, isi table
        $sensorultra = ModelProject::select('*')->get();
        //tampilan untuk level
        return view('levelsensor', ['value' => $sensorultra]);
    }
    public function alamatsensorfunc()
    {
        //baca, ambil, isi table
        $sensorultra = ModelProject::select('*')->get();
        //tampilan untuk level
        return view('alamatsensor', ['value' => $sensorultra]);
    }
    public function statussensorfunc()
    {
        //baca, ambil, isi table
        $sensorultra = ModelProject::select('*')->get();
        //tampilan untuk status
        foreach ($sensorultra as $status) {
            $status->nilai = (string) $status->nilai; // Ubah nilai menjadi string
        }
        return view('statussensor', ['value' => $sensorultra]);
    }
    public function simpansensor()
    {
        ModelProject::where('id', '1')->update(['sensor'=> request()->nilailevel, 'status'=>request()->nilaistatus]);
    }
}
