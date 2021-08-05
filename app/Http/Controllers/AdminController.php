<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\Imports\WasteImport;
use Excel;
use DB;
use Image;


class AdminController extends Controller
{
    public function admin_dashboard()
    {
        return view('admin.analytics');
    }

    public function get_waste()
    {
        $data = db::table('r_waste as w')
            ->join('r_segregate_type as wt', 'w.segregate_type_id', 'wt.segregate_type_id')
            ->get(['w.waste_name','w.active_flag','wt.segregate_type_name','w.waste_id','wt.segregate_type_id']);
        
        $seg_type = db::table('r_segregate_type')->where('active_flag', 1)->get();

        return view('admin.manage_waste', compact('data', 'seg_type'));
    }

    public function get_routes()
    {
        $data = db::table('r_routes')->get();
        $region = db::table('r_region')->get();

        return view('admin.manage_routes', compact('data', 'region'));
    }

    public function pv_waste_composition()
    {
        // $data = db::table('r_waste_composition as wd')
        // ->join('r_segregate_type as st','wd.waste_type','st.segregate_type_id')->get();
        $city = db::table('r_citymun')->get();
        $type = db::table('r_segregate_type')->get();
        $data = db::table("v_get_waste_comp")->get();
        $is_public = "yes";
        
        return view('admin.manage_waste_composition', compact('data','city','type','is_public'));
    }

    public function charts()
    {
        $data = db::table("v_get_waste_comp")->get();
        $waste = db::table("v_get_waste_data")->get();
        return response()->json(['result' => $data, 'waste' => $waste ]);
    }

    public function filter_charts(Request $request)
    {
        $value = $request->filter;
        if($value == "kg_day")
            $waste = db::table("v_get_waste_data")->get(['city','gen_kg_day as value']);
        else if($value == "psa")
            $waste = db::table("v_get_waste_data")->get(['city','psa_population as value']);
        else if($value == "capita")
            $waste = db::table("v_get_waste_data")->get(['city','per_capita_kg_day as value']);
        else if($value == "mrf")
            $waste = db::table("v_get_waste_data")->get(['city','mrf_kg_day as value']);
        else if($value == "diversion")
            $waste = db::table("v_get_waste_data")->get(['city','diversion_rate as value']);
        else if($value == "landfill")
            $waste = db::table("v_get_waste_data")->get(['city','landfill as value']);
        else if($value == "disposed")
            $waste = db::table("v_get_waste_data")->get(['city','disposed as value']);
        

        return response()->json(['waste' => $waste ]);

    }
    

    public function get_waste_composition()
    {
        // $data = db::table('r_waste_composition as wd')
        // ->join('r_segregate_type as st','wd.waste_type','st.segregate_type_id')->get();
        $city = db::table('r_citymun')->get();
        $type = db::table('r_segregate_type')->get();

        $data = db::table("v_get_waste_comp")->get();

        
        return view('admin.manage_waste_composition', compact('data','city','type'));
    }

    public function search_waste_data(Request $request)
    {
        $compo = db::table('r_waste_composition')->where('city',$request->city)
        ->where('waste_type',$request->waste_type)->count();

        if($compo > 0) {
            $data = db::table('r_waste_composition')->where('city',$request->city)->where('waste_type',$request->waste_type)->get();
        }
        else {
            
            $data = db::table('r_waste_data')->where('city',$request->city)->get();
        }
        
        return response()->json(['result' => $data, 'is_null' => $compo]);
        
    }

    public function get_waste_data()
    {
        $data = db::table('r_waste_data')->get();
        $city = db::table('r_citymun')->get();
        

        return view('admin.manage_waste_data', compact('data','city'));
    }

    public function pv_waste_data()
    {
        $data = db::table('r_waste_data')->get();
        $city = db::table('r_citymun')->get();
        $is_public = "yes";

        return view('admin.manage_waste_data', compact('data','city','is_public'));
    }


    public function crud_waste_data(Request $request)
    {
        if ($request->get('status') == "add") {
            db::table('r_waste_data')
                ->insert([
                    'city' => $request->city
                    , 'gen_kg_day' => $request->gen_kg_day
                    , 'psa_population' => $request->psa_population
                    , 'per_capita_kg_day' => $request->per_capita_kg_day
                    , 'mrf_kg_day' => $request->mrf_kg_day
                    , 'diversion_rate' => $request->diversion_rate
                    , 'landfill' => $request->landfill
                    , 'disposed' => $request->disposed
                ]);
        }
        else if($request->get('status') == "normal") {
            db::table('r_waste_data')->where('waste_data_id',$request->get('id'))
            ->update([
                'city' => $request->city
                , 'gen_kg_day' => $request->gen_kg_day
                , 'psa_population' => $request->psa_population
                , 'per_capita_kg_day' => $request->per_capita_kg_day
                , 'mrf_kg_day' => $request->mrf_kg_day
                , 'diversion_rate' => $request->diversion_rate
                , 'landfill' => $request->landfill
                , 'disposed' => $request->disposed
            ]);
        }
        
    }

    public function swm_filter(Request $request)
    {
        $value = $request->filter;
        $data = db::table('v_get_all_swm')->where(strtolower('facility_type'), strtolower($value))->get();
        return response()->json(['result' => $data]);
    }

    public function crud_waste_composition(Request $request)
    {
        if ($request->get('status') == "add") {
            db::table('r_waste_composition')
                ->insert([
                    'city' => $request->city
                    , 'waste_type' => $request->waste_type
                    , 'percentage' => $request->percentage
                    , 'total_kg' => $request->total_kg
                ]);
        }
        else if($request->get('status') == "normal") {
            db::table('r_waste_composition')->where('waste_composition_id',$request->get('id'))
            ->update([
                'city' => $request->city
                , 'waste_type' => $request->waste_type
                , 'percentage' => $request->percentage
                , 'total_kg' => $request->total_kg
            ]);
        }
        
    }

    public function provinces(Request $request)
    {
        $params = $request->get('params');
        $result = db::select("call sp_get_province(?)", array(
            $params
        ));

        return response()->json(['response' => $result]);
    }

    public function municipality(Request $request)
    {
        $params = $request->get('params');
        $result = db::select("call sp_get_municipality(?)", array(
            $params,
        ));

        return response()->json(['response' => $result]);
    }

    public function barangay(Request $request)
    {
        $params = $request->get('params');
        $result = db::select("call sp_get_barangay(?)", array(
            $params,
        ));

        return response()->json(['response' => $result]);
    }

    public function crud_swm(Request $request)
    {
        
        if ($request->get('status') == "add") 
        {
            
            $last_id = db::table('t_swm_location')
                ->insertgetid([
                    'junkshop_name' => $request->get('junkshop_name')
                    , 'junkshop_address' => $request->get('junkshop_address')
                    , 'latitude' => $request->get('latitude')
                    , 'longhitude' => $request->get('longhitude')
                    , 'acceptable_materials' => $request->get('acceptable_materials')
                    , 'working_hours_start' => $request->get('working_hours_start')
                    , 'working_hours_end' => $request->get('working_hours_end')
                    , 'working_days' => $request->get('working_days')
                    , 'facility_type' => $request->get('facility_type')
                    , 'capacity' => $request->get('capacity')
                    , 'capacity_rate' => $request->get('capacity_rate')
                    , 'last_update' => $request->get('last_update')
                    , 'contact_number' => $request->get('contact_number')
                ]);

                if ($request->hasFile('file')) 
                {
                
                    $dir_normal = public_path('uploads/junkshops/normal_size');
                    $dir_resize = public_path('uploads/junkshops/resize');
    
                    $image = $request->file('file');
                    $img = Image::make($image->path());
                    $derive_name = md5("swm_".$last_id);
                    
                    $img->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($dir_resize.'/'.$derive_name);
                    
                    
    
                    $file = $request->file('file');
                    $file->move($dir_normal, $derive_name); 
                    $file_name = $derive_name;

                    db::table('t_swm_location')->where('swm_location_id',$last_id)
                    ->update([
                        'file_name' => $file_name
                    ]);
                }
        }
        else if ($request->get('status') == "normal") 
        {
            
            $id = $request->get('id');
            $current_pic = db::table('t_swm_location')->where('swm_location_id',$id)->value('file_name');
            $file_name = $current_pic;
            

            if ($request->hasFile('file')) {

                $dir_normal = public_path('uploads/junkshops/normal_size');
                $dir_resize = public_path('uploads/junkshops/resize');

                if($current_pic != "default") {

                    if(file_exists($dir_normal.$current_pic) && file_exists($dir_resize.$current_pic)) 
                    {
                        File::delete($dir_normal.$current_pic);
                        File::delete($dir_resize.$current_pic);
                    }
                }

               

                $image = $request->file('file');
                $img = Image::make($image->path());
                $derive_name = md5("swm_".$id);
             
                
                $img->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($dir_resize.'/'.$derive_name);
                
                $file = $request->file('file');
                $file->move($dir_normal, $derive_name); 
                $file_name = $derive_name;
                
                
            }

            db::table('t_swm_location')->where('swm_location_id',$id)
            ->update([
                'junkshop_name' => $request->get('junkshop_name')
                , 'junkshop_address' => $request->get('junkshop_address')
                , 'latitude' => $request->get('latitude')
                , 'longhitude' => $request->get('longhitude')
                , 'acceptable_materials' => $request->get('acceptable_materials')
                , 'working_hours_start' => $request->get('working_hours_start')
                , 'working_hours_end' => $request->get('working_hours_end')
                , 'working_days' => $request->get('working_days')
                , 'file_name' => $file_name
                , 'facility_type' => $request->get('facility_type')
                , 'capacity' => $request->get('capacity')
                , 'capacity_rate' => $request->get('capacity_rate')
                , 'updated_date' => db::raw("CURRENT_DATE")
                , 'last_update' => $request->get('last_update')
                , 'contact_number' => $request->get('contact_number')
            ]);

        }

        else if ($request->get('status') == "deact") {
            db::table('t_swm_location')->where('swm_location_id',$request->get('id'))
                ->update([ 'active_flag' => 0, 'updated_date' => db::raw("CURRENT_DATE") ]);
        }
        else if ($request->get('status') == "act") {
            db::table('t_swm_location')->where('swm_location_id',$request->get('id'))
                ->update([ 'active_flag' => 1, 'updated_date' => db::raw("CURRENT_DATE") ]);
        }

        return response()->json(['response' => "success"]);
    }
 // $file_name = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();
                // $file_name = cloudinary()->upload($request->file('file')->getRealPath(), [
                //     'folder' => 'avatar',
                //     'transformation' => [
                //               'width' => 100,
                //               'height' => 100,
                //       'gravity' => 'faces',
                //       'crop' => 'fill'
                //      ]
                // ])->getSecurePath();
    public function crud_routes(Request $request)
    {
        if ($request->get('status') == "add") {
            db::table('r_routes')
                ->insert([
                    'region' => $request->region
                    , 'province' => $request->province
                    , 'city_municipality' => $request->city_muni
                    
                    , 'route_name' => $request->route_name
                    , 'route_details' => $request->route_details
                ]);
        }
        else if($request->get('status') == "normal") {
            db::table('r_routes')->where('routes_id',$request->get('id'))
            ->update([
                'region' => $request->region
                , 'province' => $request->province
                , 'city_municipality' => $request->city_muni
                
                , 'route_name' => $request->route_name
                , 'route_details' => $request->route_details
            ]);
        }
        else if ($request->get('status') == "deact") {
            db::table('r_routes')->where('routes_id',$request->get('id'))
                ->update([ 'active_flag' => 0 ]);
        }
        else if ($request->get('status') == "act") {
            db::table('r_routes')->where('routes_id',$request->get('id'))
                ->update([ 'active_flag' => 1 ]);
        }
    }

    public function import_waste(Request $request)
    {
        $extension = File::extension($request->file->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
            Excel::import(new WasteImport, $request->file('file'));
            return response()->json(['data' => "okay"]);
        } else
            return response()->json(['data' => "not"]);
    }

    public function get_analytics($typeofview)
    {
        $is_public = ($typeofview == "public") ? "public" : "abobakar";
        return view('admin.analytics',compact('is_public'));
    }

    public function get_swm()
    {
        $data = db::table('v_get_all_swm')->get();
        return response()->json(['data' => $data]);
    }

    public function swm()
    {
        $data = db::table('v_get_all_swm')->get();
        return view('admin.manage_swm', compact('data'));
    }

    public function guides()
    {
        $data = db::table('r_segregate_type')->get();
        
        return view('admin.manage_guide', compact('data'));
    }

    public function verification($typeofview)
    {
        if($typeofview == "pending")
            $data = db::table('v_get_verification')->where('status','pending')->get();
        else if($typeofview == "approved")
            $data = db::table('v_get_verification')->where('status','approved')->get();
        else
            $data = db::table('v_get_verification')->where('status','declined')->get();

        return view('admin.manage_verification', compact('data','typeofview'));
    }

    
    public function citizen_patrol($typeofview)
    {
        if($typeofview == "pending")
            $data = db::table('v_get_citizen_patrol')->where('status','pending')->get();
        else if($typeofview == "approved")
            $data = db::table('v_get_citizen_patrol')->where('status','approved')->get();
        else
            $data = db::table('v_get_citizen_patrol')->where('status','declined')->get();

        
            
        return view('admin.manage_citizen_patrol', compact('data','typeofview'));
    }

    public function crud_waste(Request $request)
    {
        if ($request->get('status') == "add") {
            db::table('r_waste')
                ->insert([
                    'waste_name' => $request->get('waste_name')
                    , 'segregate_type_id' => $request->get('segregate_type_id')
                ]);
        }
        else if ($request->get('status') == "normal") {
            db::table('r_waste')->where('waste_id',$request->get('waste_id'))
                ->update([
                    'waste_name' => $request->get('waste_name')
                    
                    , 'segregate_type_id' => $request->get('segregate_type_id')
                ]);
        }
        else if ($request->get('status') == "deact") {
            db::table('r_waste')->where('waste_id',$request->get('waste_id'))
                ->update([ 'active_flag' => 0 ]);
        }
        else if ($request->get('status') == "act") {
            db::table('r_waste')->where('waste_id',$request->get('waste_id'))
                ->update([ 'active_flag' => 1 ]);
        }
    }

    public function verification_update(Request $request)
    {
        db::table('t_citizen_verification')
        ->where('citizen_verification_id', $request->get('id'))
        ->update([
            'remarks' => $request->get('remarks')
            , 'status' => $request->get('status')
        ]);
    }

    public function patrol_update(Request $request)
    {
        db::table('t_citizen_patrol')
        ->where('citizen_patrol_id', $request->get('id'))
        ->update([
            'remarks' => $request->get('remarks')
            , 'status' => $request->get('status')
        ]);
    }

    public function collection_calendar()
    {
        $data = db::table('v_get_schedule')->orderby(DB::raw('DATE(date_added)'),'desc')->get();
        $type = db::table('r_waste_type')->get();
        $routes = db::table('r_routes')->get();

        
        return view('admin.manage_collection', compact('data','type','routes'));
    }

    public function crud_collection(Request $request)
    {
        if ($request->get('status') == "add") {

            $recurring = ($request->get('collection_days') == "") ? 0 : 1;
            db::table('t_location_schedule')
                ->insert([
                    'collection_date' => $request->get('col_date')
                    , 'waste_type_id' => $request->get('waste_type_id')
                    , 'routes_id' => $request->get('routes_id')
                    , 'recurring' => $recurring
                    , 'collection_days' => $request->get('collection_days') 
                ]);
        }
        else if ($request->get('status') == "normal") {

            $recurring = ($request->get('collection_days') == "") ? 0 : 1;
            db::table('t_location_schedule')->where('schedule_id',$request->get('id'))
                ->update([
                    'collection_date' => $request->get('col_date')
                    , 'waste_type_id' => $request->get('waste_type_id')
                    , 'routes_id' => $request->get('routes_id')
                    , 'recurring' => $recurring
                    , 'collection_days' => $request->get('collection_days') 
                ]);
        }
        else if ($request->get('status') == "deact") {
            db::table('t_location_schedule')->where('schedule_id',$request->get('id'))
                ->update([ 'active_flag' => 0 ]);
        }
        else if ($request->get('status') == "act") {
            db::table('t_location_schedule')->where('schedule_id',$request->get('id'))
                ->update([ 'active_flag' => 1 ]);
        }
    }

    public function crud_guide(Request $request)
    {
        if ($request->get('status') == "add") {

            db::table('r_segregate_type')
                ->insert([
                    'segregate_type_name' => $request->get('segregate_type_name')
                    , 'segregate_guide' => $request->get('segregate_guide')
                    
                ]);
        }
        else if ($request->get('status') == "normal") {

            db::table('r_segregate_type')->where('segregate_type_id',$request->get('id'))
                ->update([
                    'segregate_type_name' => $request->get('segregate_type_name')
                    , 'segregate_guide' => $request->get('segregate_guide')
                    
                ]);
        }
        else if ($request->get('status') == "deact") {
            db::table('r_segregate_type')->where('segregate_type_id',$request->get('id'))
                ->update([ 'active_flag' => 0 ]);
        }
        else if ($request->get('status') == "act") {
            db::table('r_segregate_type')->where('segregate_type_id',$request->get('id'))
                ->update([ 'active_flag' => 1 ]);
        }
    }

    public function swm_facilities()
    {
        return view('admin.public_swm');
    }

    public function routes()
    {
        
        $c_date = collect(db::table('v_get_current_date')->get());
        $c_date_2 = collect(db::table('v_get_current_date_2')->get());

        $data = $c_date->merge($c_date_2);
        
        //$data = db::table('v_get_schedule')->orderby(DB::raw('DATE(collection_date_full)'),'desc')->get();
        return view('admin.public_routes',compact('data'));
    }

    public function mobile_routes($city)
    {
        
        //$data = db::table('r_routes')->where('city_municipality', 'like', '%' . $city . '%')->get();

        $c_date = collect(db::table('v_get_current_date')->where('city_municipality', 'like', '%' . $city . '%')->get());
        $c_date_2 = collect(db::table('v_get_current_date_2')->where('city_municipality', 'like', '%' . $city . '%')->get());

        $data = $c_date->merge($c_date_2);
        $mobile = "true";
        return view('admin.public_routes',compact('data','mobile'));
    }

    public function waste_guide()
    {
        
        $data = db::table('r_waste')->get();
        return view('admin.public_guide');
    }

    public function return_waste()
    {
        $search_val = $_GET['search_val'];
        $data = db::select("call sp_typehead_waste(?)", array(
            $search_val,
        ));
        $wastes = [];
        
        for($i=0; $i<count($data); $i++) {
            $wastes[$i] = $data[$i]->waste_name;
        }
        
        echo json_encode($wastes);
    }

    public function search_waste_facility(Request $request)
    {
        $search_val = $request->get('search_swm');
        $facility = db::select("call sp_search_facility(?)", array(
            $search_val,
        ));

        $waste_guide = db::select("call sp_search_waste(?)", array(
            $search_val,
        ));

        return response()->json(['facility' => $facility, 'waste_guide' => $waste_guide ]);
    }

    public function search_facilities(Request $request)
    {
        $search_val = $request->get('search_swm');
        $result = db::select("call sp_search_facility(?)", array(
            $search_val,
        ));

        
        #default array
        // $daysOfWeek = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
        // #your array
        // $days = explode (",", $result[0]->working_days); 
        // #create a new array with key association property
        // $daysAux = array();
        // foreach($days as $k => $v) {
        //     $key = array_search($v, $daysOfWeek);
        //     if($key !== FALSE) {
        //         $daysAux[$key] = $v;
        //     }
        // }
        // array before sort
        // echo '<pre/>';
        // print_r($daysAux);

        // ksort($daysAux);
        // $days = $daysAux;
        // #final result
        // echo '<pre/>';
        // print_r($days);

        //return view('admin.public_swm',compact('result'));
        
        return response()->json(['result' => $result]);
        
    }
}
