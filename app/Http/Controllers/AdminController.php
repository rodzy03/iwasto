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
       ->join('r_waste_type as wt', 'w.waste_type_id','wt.waste_type_id')->get();
       
       $type = db::table('r_waste_type')->where('active_flag',1)->get();
       
       return view('admin.manage_waste',compact('data','type'));
   }
   
   public function import_waste(Request $request) 
   {
        $extension = File::extension($request->file->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
            Excel::import(new WasteImport, $request->file('file') );
            return response()->json(['data' => "okay" ]);
        } else
            return response()->json(['data' => "not" ]);
   }

   public function crud_waste(Request $request)
   {
        if($request->get('status') == "add") {
            db::table('r_waste')
            ->insert([
                'waste_name' => $request->get('waste_name')
                , 'waste_type_id' => $request->get('waste_type_id')
            ]);
        }

   }
   
}
