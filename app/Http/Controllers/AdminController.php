<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\Imports\WasteImport;
use Excel;
use DB;

class AdminController extends Controller
{
    public function admin_dashboard()
    {
        return view('admin.dashboard');
    }

    public function get_waste()
    {
        $data = db::table('r_waste as w')
            ->join('r_waste_type as wt', 'w.waste_type_id', 'wt.waste_type_id')->get();
        $type = db::table('r_waste_type')->where('active_flag', 1)->get();
        $seg_type = db::table('r_segregate_type')->where('active_flag', 1)->get();

        return view('admin.manage_waste', compact('data', 'type', 'seg_type'));
    }

    public function get_routes()
    {
        $data = db::table('r_routes')->get();
        $region = db::table('r_region')->get();

        return view('admin.manage_routes', compact('data', 'region'));
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
        if ($request->get('status') == "add") {
            db::table('t_swm_location')
                ->insert([
                    'junkshop_name' => $request->get('junkshop_name'), 'junkshop_address' => $request->get('junkshop_address'), 'latitude' => $request->get('latitude'), 'longhitude' => $request->get('longhitude')

                ]);
        }

        return response()->json(['response' => "success"]);
    }

    public function crud_routes(Request $request)
    {
        if ($request->get('status') == "add") {
            db::table('r_routes')
                ->insert([
                    'region' => $request->region, 'province' => $request->province, 'city_municipality' => $request->city_muni, 'barangay' => $request->barangay, 'route_name' => $request->route_name
                ]);
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

    public function get_analytics()
    {

        return view('admin.analytics');
    }

    public function get_swm()
    {
        $data = db::table('t_swm_location')->get();
        return response()->json(['data' => $data]);
    }

    public function swm()
    {
        $data = db::table('t_swm_location')->get();
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

    public function crud_waste(Request $request)
    {
        if ($request->get('status') == "add") {
            db::table('r_waste')
                ->insert([
                    'waste_name' => $request->get('waste_name'), 'waste_type_id' => $request->get('waste_type_id'), 'segregate_type_id' => $request->get('segregate_type_id')
                ]);
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
}
