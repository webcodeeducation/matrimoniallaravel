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

class InformationController extends Controller
{
    public function policeStation(Request $request)
    {
        $addresses = DB::table('tbl_division')
                        ->join('tbl_district', 'tbl_division.id', '=', 'tbl_district.division')
                        ->join('tbl_police_station', 'tbl_district.id', '=', 'tbl_police_station.district')
                        ->select('tbl_police_station.id as psId', 'tbl_district.id as districtId', 'tbl_division.id as divisionId')
                        ->orderBy('tbl_division.id')
                        ->first();
        $divisionList = Division::orderBy('id')
                                    ->get();
        $districtList = District::where('division', $addresses->divisionId)
                                    ->get();
        $psList = PoliceStation::where('district', $addresses->districtId)
                                    ->get();
    	return view('admin.information.police-station')
    			->with('psList', $psList)
    			->with('districtList', $districtList)
                ->with('divisionList', $divisionList)
                ->with('addresses', $addresses);
    }
    public function storePoliceStation(Request $request)
    {
        $ps = new PoliceStation();
        $ps->name = $request->name;
        $ps->district = $request->district;
        $ps->save();
        return redirect()->route('information.police');
    }
    public function editPoliceStation(Request $request)
    {
        $ps = PoliceStation::find($request->ps);
        $addresses = DB::table('tbl_division')
                        ->join('tbl_district', 'tbl_division.id', '=', 'tbl_district.division')
                        ->join('tbl_police_station', 'tbl_district.id', '=', 'tbl_police_station.district')
                        ->select('tbl_police_station.id as psId', 'tbl_district.id as districtId', 'tbl_division.id as divisionId')
                        ->where('tbl_police_station.id', $request->ps)
                        ->first();
        $divisionList = Division::all();
        $districtList = District::where('division', $addresses->divisionId)
                                ->get();
        return view('admin.information.update-police-station')
                ->with('ps', $ps)
                ->with('districtList', $districtList)
                ->with('divisionList', $divisionList)
                ->with('addresses', $addresses);
    }
    public function updatePoliceStation(Request $request)
    {
        $ps = PoliceStation::find($request->psId);
        $ps->name = $request->name;
        $ps->district = $request->district;
        $ps->save();
        return redirect()->route('information.police');
    }
    public function district(Request $request)
    {
        $addresses = DB::table('tbl_division')
                        ->join('tbl_district', 'tbl_division.id', '=', 'tbl_district.division')
                        ->select('tbl_district.id as districtId', 'tbl_division.id as divisionId')
                        ->orderBy('tbl_division.id')
                        ->first();
    	$divisionList = Division::orderBy('id')->get();
        $districtList = District::where('division', $addresses->divisionId)->get();
    	return view('admin.information.district')
    			->with('districtList', $districtList)
    			->with('divisionList', $divisionList)
                ->with('addresses', $addresses);
    }
    public function storeDistrict(Request $request)
    {
        $district = new District();
        $district->name = $request->name;
        $district->division = $request->division;
        $district->save();
        return redirect()->route('information.district');
    }
    public function editDistrict(Request $request)
    {
        $district = District::find($request->district);
        $divisionList = Division::all();
        return view('admin.information.update-district')
                ->with('district',$district)
                ->with('divisionList', $divisionList);
    }
    public function updateDistrict(Request $request)
    {
        $district = District::find($request->districtId);
        $district->name = $request->name;
        $district->division = $request->division;
        $district->save();
        return redirect()->route('information.district');
    }
    public function division(Request $request)
    {
    	$divisionList = Division::orderBy('name')->get();
    	return view('admin.information.division')
    			->with('divisionList', $divisionList);
    }
    public function religion(Request $request){
        $data['title'] = 'RishtaGuru| Matrimonial | India';
        $data['keywords'] = 'RishtaGuru | Matrimonial, Matrimony, matrimonials, marriage, Brides, matchmaking, grooms, shaadi, Online Matrimonial, Online Matrimony, Matrimonial, shadi, Online Services, USA Indian single';
        $data['description'] = 'RishtaGuru | Best Online Matrimonial site for singles. Meet educated single men and women near your city. Join today register for free.';
        //$data['visits'] = Tracker::count();
        $data['religions'] = Religion::all();
        
        return view('admin.information.religion')->with($data);
    }
    public function addreligion(Request $request){
        $division = new Religion();
        $division->name = $request->name;
        $division->save();
        return redirect()->route('information.religion');
    }
    public function storeDivision(Request $request)
    {
        $division = new Division();
        $division->name = $request->name;
        $division->save();
        return redirect()->route('information.division');
    }
    public function editDivision(Request $request)
    {
        $division = Division::find($request->division);
        return view('admin.information.update-division')
                ->with('division', $division);
    }
    public function updateDivision(Request $request)
    {
        $division = Division::find($request->divisionId);
        $division->name = $request->name;
        $division->save();
        return redirect()->route('information.division');
    }
    public function degree(Request $request)
    {
    	$degreeList = Degree::orderBy('degree')->get();
    	return view('admin.information.degree')
    			->with('degreeList', $degreeList);
    }
    public function storeDegree(Request $request)
    {
        $degree = new Degree();
        $degree->degree = $request->name;
        $degree->save();
        return redirect()->route('information.degree');
    }
    public function editDegree(Request $request)
    {
        $degree = Degree::find($request->degree);
        return view('admin.information.update-degree')
                ->with('degree', $degree);
    }
    public function updateDegree(Request $request)
    {
        $degree = Degree::find($request->degreeId);
        $degree->degree = $request->name;
        $degree->save();
        return redirect()->route('information.degree');
    }
    public function family(Request $request)
    {
    	$familyList = FamilyType::orderBy('type')->get();
    	return view('admin.information.family-type')
    			->with('familyList', $familyList);
    }
    public function storeFamily(Request $request)
    {
        $family = new FamilyType();
        $family->type = $request->name;
        $family->save();
        return redirect()->route('information.family');
    }
    public function editFamily(Request $request)
    {
        $family = FamilyType::find($request->family);
        return view('admin.information.update-family-type')
                ->with('family', $family);
    }
    public function updateFamily(Request $request)
    {
        $family = FamilyType::find($request->familyId);
        $family->type = $request->name;
        $family->save();
        return redirect()->route('information.family');
    }
    public function complexion(Request $request)
    {
    	$complexionList = Complexion::orderBy('type')->get();
    	return view('admin.information.complexion')
    			->with('complexionList', $complexionList);
    }
    public function storeComplexion(Request $request)
    {
        $complexion = new Complexion();
        $complexion->type = $request->name;
        $complexion->save();
        return redirect()->route('information.complexion');
    }
    public function editComplexion(Request $request)
    {
        $complexion = Complexion::find($request->complexion);
        return view('admin.information.update-complexion')
                ->with('complexion', $complexion);
    }
    public function updateComplexion(Request $request)
    {
        $complexion = Complexion::find($request->complexion);
        $complexion->type = $request->name;
        $complexion->save();
        return redirect()->route('information.complexion');
    }
    public function hobby(Request $request)
    {
    	$hobbyList = Hobby::orderBy('name')->get();
    	return view('admin.information.hobby')
    			->with('hobbyList', $hobbyList);
    }
    public function storeHobby(Request $request)
    {
        $hobby = new Hobby();
        $hobby->name = $request->name;
        $hobby->save();
        return redirect()->route('information.hobby');
    }
    public function editHobby(Request $request)
    {
        $hobby = Hobby::find($request->hobby);
        return view('admin.information.update-hobby')
                ->with('hobby', $hobby);
    }
    public function updateHobby(Request $request)
    {
        $hobby = Hobby::find($request->hobbyId);
        $hobby->name = $request->name;
        $hobby->save();
        return redirect()->route('information.hobby');
    }
    public function interest(Request $request)
    {
    	$interestList = Interest::orderBy('name')->get();
    	return view('admin.information.interest')
    			->with('interestList', $interestList);
    }
    public function storeInterest(Request $request)
    {
        $interest = new Interest();
        $interest->name = $request->name;
        $interest->save();
        return redirect()->route('information.interest');
    }
    public function editInterest(Request $request)
    {
        $interest = Interest::find($request->interest);
        return view('admin.information.update-interest')
                ->with('interest', $interest);
    }
    public function updateInterest(Request $request)
    {
        $interest = Interest::find($request->interestId);
        $interest->name = $request->name;
        $interest->save();
        return redirect()->route('information.interest');
    }
    public function music(Request $request)
    {
    	$musicList = Music::orderBy('name')->get();
    	return view('admin.information.music')
    			->with('musicList', $musicList);
    }
    public function storeMusic(Request $request)
    {
        $music = new Music();
        $music->name = $request->name;
        $music->save();
        return redirect()->route('information.music');
    }
    public function editMusic(Request $request)
    {
        $music = Music::find($request->music);
        return view('admin.information.update-music')
                ->with('music', $music);
    }
    public function updateMusic(Request $request)
    {
        $music = Music::find($request->musicId);
        $music->name = $request->name;
        $music->save();
        return redirect()->route('information.music');
    }
    public function sport(Request $request)
    {
    	$sportList = Sport::orderBy('name')->get();
    	return view('admin.information.sport')
    			->with('sportList', $sportList);
    }
    public function storeSport(Request $request)
    {
        $sport = new Sport();
        $sport->name = $request->name;
        $sport->save();
        return redirect()->route('information.sport');
    }
    public function editSport(Request $request)
    {
        $sport = Sport::find($request->sport);
        return view('admin.information.update-sport')
                ->with('sport', $sport);
    }
    public function updateSport(Request $request)
    {
        $sport = Sport::find($request->sportId);
        $sport->name = $request->name;
        $sport->save();
        return redirect()->route('information.sport');
    }
    public function students(){
        $data['students'] = Students::all();
        return view('admin.information.govinda', $data);
    }
    public function addstudent(Request $request){
        //print_r($_POST);
        $name = $request->name;
        $city = $request->city;
        $phone = $request->phone;
        //die();
        $student = new Students();
        $student->name = $name;
        $student->city = $city;
        $student->phone = $phone;
        $student->save();
        Session::flash('alert-success', 'Student Added Successfully');
        return redirect()->route('information.students');
    }

/*Govinda Works*/
    public function deleteStudent(Request $request){
        //echo 'Testing delete student_id';
        $id = $request->id;
        $data = students::find($id);
        $data->delete();
        Session::flash('alert-danger', 'Student data deleted Successfully');
        return redirect()->route('information.students');
        //die();
    }
    public function showstudent(Request $request){
        //echo 'testing show student';
        echo $id = $request->id;
        $data['id'] = students::find($id);
        //$student = new Students();
        //echo $data->id = $id;
        //$student->city = $city;
        //obj->name
        //return view('admin.information.update-govinda',['data'=>$data]) 
          //      ->with('id', $id);


    }
}
