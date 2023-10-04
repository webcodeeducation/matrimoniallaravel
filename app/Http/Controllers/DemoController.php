<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\PoliceStation;
use App\District;
use App\Division;
use App\Degree;
use App\FamilyType;
use App\Complexion;
use App\Hobby;
use App\Interest;
use App\Music;
use App\Sport;
use App\Religion;
use App\Students;


class DemoController extends Controller
{
    public function demostudents(){
        $data['govinda'] = "Govinda Kashyap";
        $data['students'] = Students::all();
        $data['religions'] = Religion::all();
        return view('admin.information.demo',$data);
    }

    public function demorelogions(){

        echo 'show religion here';
    }

}
