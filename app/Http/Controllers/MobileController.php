<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use DB;
use Session;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Crypt;

class MobileController extends Controller
{
    public function upload()
    {
        // $req_reupload = $request->file('req_reupload');
        

        //         $req_reupload->move(public_path('mydocuments/student-requests/')
        //             , $req_reupload->getClientOriginalName());
    }

    public function get_zipcodes()
    {
        $zipcodes = db::table('v_get_zipcodes')->get();
        $output = json_encode(array('Results' => $zipcodes));
        echo $output;

    }

    public function get_barangays()
    {
        $selected_major_area = $_POST['major_area'];
        $barangays = db::select("call sp_get_barangays(?)",array($selected_major_area));
        $output = json_encode(array('Results' => $barangays));
        echo $output;
    }

    public function register_user()
    {
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $major_area = $_POST['major_area'];
        $barangay = $_POST['barangay'];
        $password = $_POST['password'];
        $social_reg = $_POST['social_reg'];
        $region = $_POST['region'];
        $province = $_POST['province'];
        $pubkey = db::select("call sp_add_user(?,?,?,?,?,?,?,?,?,?)",array(
            $firstname ,
            $middlename ,
            $lastname ,
            $email ,
            $major_area ,
            $barangay,
            $password,
            $social_reg,
            $region,
            $province
        ));
        
        if($pubkey[0]->pubkey != 'account exists') {

            $data = [
            'subject' => 'IWasto Verification',
            'to_email' => $_POST['email'],
            'from' => 'iwasto2021@gmail.com','IWasto'
            ];
            
            $url = asset('');
            Mail::send('verify_email', 
            [ 'url' => $url."verify_email/".Crypt::encrypt($email) ] ,
            function($message) use ($data) {
                        
                $message->from($data['from'])
                ->to($data['to_email'],$data['to_email'])
                ->subject($data['subject']);
              });
        }
        

        $output = json_encode(array('Results' => $pubkey));
        echo $output;
    }
    

    public function login_mobile()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $status = $_POST['login_type'];

        $result = db::select("call sp_login(?,?,?)",array(
            $email ,
            $password ,
            $status
            
        ));

        $output = json_encode(array('Results' => $result));
        echo $output;

    }

    public function get_profile()
    {
        $pubkey = $_POST['pubkey'];
        $result = db::select("call sp_get_profile(?)",array(
            $pubkey ,
            
        ));
        $output = json_encode(array('Results' => $result));
        echo $output;
    }

    public function get_all()
    {
        $result = db::select("select * from r_users");
        $output = json_encode(array('Results' => $result));
        echo $output;
    }

    public function verify_email($email)
    {   
        db::table('users')->where('email',Crypt::decrypt($email))
        ->update([ 'email_verified_at' => Carbon::now('Asia/Manila') ]);
        return redirect()->intended('https://iwasto.ph/');
    }

    public function test()
    {
        return User::all();
    }

    public function forgot_pass()
    {
        $email = $_POST['social_email'];
        
        $result = db::select("call sp_forgot_password(?)",array(
            $email
            
        ));

        if($result[0]->response != "false") {
            $data = [
                'subject' => 'IWasto Password Reset',
                'to_email' => $_POST['social_email'],
                'from' => 'iwasto2021@gmail.com','IWasto'
                ];
                // $url = asset('');
                Mail::send('forgot_password', 
                [ 'newpassword' => $result[0]->newpassword ] ,
                function($message) use ($data) {
                            
                    $message->from($data['from'])
                    ->to($data['to_email'],$data['to_email'])
                    ->subject($data['subject']);
                  });   
        }

        $output = json_encode(array('Results' => $result));
        echo $output;
    }

    public function get_location_schedule()
    {
        $zipcodes = db::table('v_get_location_schedule')->where('major_area',$_POST['major_area'])->get();
        $top_location = db::table('v_get_top_location')->where('major_area',$_POST['major_area'])->get();
        
        $output = json_encode(array('Results' => $zipcodes, 'Top_Location' => $top_location));
        echo $output;
    }

    public function get_location_by_day()
    {
        $zipcodes = db::table('v_schedule_by_day')->where('major_area',$_POST['major_area'])->get();
        $output = json_encode(array('Results' => $zipcodes));
        echo $output;
    }

    public function get_next_location()
    {
        $pubkey = $_POST['schedule_id'];
        $result = db::select("call sp_get_next_collection(?)",array(
            $pubkey ,
        ));

        $output = json_encode(array('Results' => $result));
        echo $output;
    }

    public function get_region()
    {
        $result = db::select("select * from r_region");
        $output = json_encode(array('Results' => $result));
        echo $output;
    }

    public function get_provinces()
    {
        $pubkey = $_POST['pregion_desc'];
        $result = db::select("call sp_get_province(?)",array(
            $pubkey ,
        ));

        $output = json_encode(array('Results' => $result));
        echo $output;
    }

    public function get_municipality()
    {
        $pubkey = $_POST['pprovince_desc'];
        $result = db::select("call sp_get_municipality(?)",array(
            $pubkey ,
        ));

        $output = json_encode(array('Results' => $result));
        echo $output;
    }

    public function get_barangay()
    {
        $pubkey = $_POST['pcitymun_desc'];
        $result = db::select("call sp_get_barangay(?)",array(
            $pubkey ,
        ));

        $output = json_encode(array('Results' => $result));
        echo $output;
    }

    

    public function citizen_patrol($pubkey)
    {   
        
        $user = db::table('users')->where('public_token',$pubkey)->get();
        if($user->isEmpty()) {
            return redirect()->intended('https://iwasto.ph/');
        }
        else {
            session(['session_public_key' => Crypt::encrypt($pubkey)]);
            return view('home',compact('user'));
        }
        
        
    }

    
    public function submit_patrol(Request $request)
    {
        $selType = $request->get('selType');
        $location = $request->get('location');
        $description = $request->get('description');
       
        $contact_number = $request->get('contact_number');
        $main_document = $request->file('photo');
        $pubkey = Crypt::decrypt(session('session_public_key'));
        $user_id = db::table('users')->where('public_token',$pubkey)->value('id');
        $main_document->move(public_path('uploads/')
                , $main_document->getClientOriginalName()); 
        

        $file_name = $main_document->getClientOriginalName();
        db::table('t_citizen_patrol')
        ->insert([
            'type' => $selType
            , 'location' => $location
            , 'description' => $description
            , 'contact_number' => $contact_number
            , 'file_path' => $file_name
            , 'user_id' => $user_id
        ]);
        
        session(['message' => "Concern Added"]);
        session()->forget('session_public_key');
        return redirect()->back();
        
    
    }

    public function citizen_patrol_verification($pubkey)
    {
        $user = db::table('users')->where('public_token',$pubkey)->get();
        if($user->isEmpty()) {
            return redirect()->intended('https://iwasto.ph/');
        }
        else {
            session(['session_public_key' => Crypt::encrypt($pubkey)]);
            return view('verify_id');
        }
        
    }

    public function submit_verification(Request $request)
    {
        $main_document = $request->file('photo');
        $main_document->move(public_path('uploads/')
                , $main_document->getClientOriginalName()); 
        $file_name = $main_document->getClientOriginalName();
        $pubkey = Crypt::decrypt(session('session_public_key'));
        $user_id = db::table('users')->where('public_token',$pubkey)->value('id');
        
        db::table('t_citizen_verification')
        ->insert([
            'file_path' => $file_name
            , 'status' => 'pending'
            , 'user_id' => $user_id
            , 'created_at' => Carbon::now('Asia/Manila')
        ]);
        
        session(['message' => "Please wait to access citizen module"]);
        session()->forget('session_public_key');
        return redirect()->back();
        
    }


    public function check_id_ifverified()
    {
        $pubkey = $_POST['pubkey'];
        $pstatus = $_POST['pstatus'];
        $result = db::select("call sp_check_id_ifverified(?,?)",array(
            $pubkey ,
            $pstatus
        ));

        $output = json_encode(array('Results' => $result));
        echo $output;

    }
    
    public function get_waste_type()
    {
        $zipcodes = db::table('r_waste_type')->get();
        $output = json_encode(array('Results' => $zipcodes));
        echo $output;
        
    }

    public function update_waste_type()
    {
        $waste_type_id = $_POST['pwaste_type_id'];
        $waste_type_name = $_POST['pwaste_type_name'];
        db::table('r_waste_type')->where('waste_type_id',$waste_type_id)
        ->update([
            'waste_type_name' => $waste_type_name
        ]);
        $output = json_encode(array('Results' => "success"));
        echo $output;
        
    }


    public function add_waste_type()
    {
        
        $waste_type_name = $_POST['pwaste_type_name'];
        db::table('r_waste_type')
        ->insert([
            'waste_type_name' => $waste_type_name
        ]);
        $output = json_encode(array('Results' => "success"));
        echo $output;
        
    }

    public function get_routes()
    {
        $zipcodes = db::table('r_routes')->get();
        $output = json_encode(array('Results' => $zipcodes));
        echo $output;
    }

    public function update_routes()
    {
        $pstart_lat = $_POST['pstart_lat'];
        $pstart_longh = $_POST['pstart_longh'];
        $pend_lat = $_POST['pend_lat'];
        $pend_longh = $_POST['pend_longh'];
        $pregion = $_POST['pregion'];
        $pprovince = $_POST['pprovince'];
        $pcity_municipality = $_POST['pcity_municipality'];
        $pbarangay = $_POST['pbarangay'];
        $proute_name = $_POST['proute_name'];

        db::table('r_routes')->where('routes_id',$_POST['proutes_id'])
        ->update([
            'start_lat' => $pstart_lat,
            'start_longh' => $pstart_longh,
            'end_lat' => $pend_lat,
            'end_longh' => $pend_longh,
            'region' => $pregion,
            'province' => $pprovince,
            'city_municipality' => $pcity_municipality,
            'barangay' => $pbarangay,
            'route_name' => $proute_name,
        ]);
        
        $output = json_encode(array('Results' => "success"));
        echo $output;
    }

    public function add_routes()
    {
        $pstart_lat = $_POST['pstart_lat'];
        $pstart_longh = $_POST['pstart_longh'];
        $pend_lat = $_POST['pend_lat'];
        $pend_longh = $_POST['pend_longh'];
        $pregion = $_POST['pregion'];
        $pprovince = $_POST['pprovince'];
        $pcity_municipality = $_POST['pcity_municipality'];
        $pbarangay = $_POST['pbarangay'];
        $proute_name = $_POST['proute_name'];

        db::table('r_routes')
        ->insert([
            'start_lat' => $pstart_lat,
            'start_longh' => $pstart_longh,
            'end_lat' => $pend_lat,
            'end_longh' => $pend_longh,
            'region' => $pregion,
            'province' => $pprovince,
            'city_municipality' => $pcity_municipality,
            'barangay' => $pbarangay,
            'route_name' => $proute_name,
        ]);
        
        $output = json_encode(array('Results' => "success"));
        echo $output;
    }

    public function get_schedule()
    {
        
        $zipcodes = db::table('v_get_schedule')->get();
        $output = json_encode(array('Results' => $zipcodes));
        echo $output;
    }

    public function add_schedule()
    {
        $pcollection_date = $_POST['pcollection_date'];
        $pwaste_type = $_POST['pwaste_type'];
        $proute_name = $_POST['proute_name'];
        $barangays = db::select("call sp_add_location(?,?,?)"
        ,array($pcollection_date, $pwaste_type, $proute_name));
        $output = json_encode(array('Results' => $barangays));
        echo $output;
    }

    public function update_schedule()
    {
        $pcollection_date = $_POST['pcollection_date'];
        $pwaste_type = $_POST['pwaste_type'];
        $proute_name = $_POST['proute_name'];
        $pschedule_id = $_POST['pschedule_id'];
        $barangays = db::select("call sp_update_location(?,?,?,?)"
        ,array($pcollection_date, $pwaste_type, $proute_name, $pschedule_id));
        $output = json_encode(array('Results' => $barangays));
        echo
        
        $output;
    }

    public function get_verification()
    {
        $status = $_POST['pstatus'];
        if($status == "all") {
            $zipcodes = db::table('v_get_verification')->get();
        }
        else {
            $zipcodes = db::table('v_get_verification')->where('status',$status)->get();
        }
        
        $output = json_encode(array('Results' => $zipcodes));
        echo $output;
    }

    public function get_status()
    {
        $data = db::table('r_status')->get();
        $output = json_encode(array('Results' => $data));
        echo $output;

    }

    public function update_status()
    {
        
        $pstatus = $_POST['pstatus'];
        $premarks = $_POST['premarks'];
        $pcitizen_verification_id = $_POST['pcitizen_verification_id'];
        $data = db::table('t_citizen_verification')
        ->where('citizen_verification_id',$pcitizen_verification_id)
        ->update([
            'status' => $pstatus
            , 'remarks' => $premarks
        ]);

        $output = json_encode(array('Results' => $data));
        echo $output;
        
    }

    public function get_citizen_patrol()
    {   
        $pstatus = $_POST['pstatus'];
        $data = db::table('v_get_citizen_patrol')->where('status',$pstatus)->get();
        $output = json_encode(array('Results' => $data));
        echo $output;
    }

    public function update_concern()
    {   
        $pcitizen_patrol_id = $_POST['pcitizen_patrol_id'];
        $premarks = $_POST['premarks'];
        $data = db::table('t_citizen_patrol')->where('citizen_patrol_id', $pcitizen_patrol_id)
        ->update([
            'status' => 'approved'
            , 'remarks' => $premarks
        ]);

        $output = json_encode(array('Results' => $data));
        echo $output;
    }

    public function get_waste()
    {
        $data = db::table('r_waste as w')->join('r_waste_type as wt','w.waste_type_id','wt.waste_type_id')->get();
        $output = json_encode(array('Results' => $data));
        echo $output;
    }

    public function add_waste()
    {
        $data = db::table('r_waste')
        ->insert([
            'waste_name' => $_POST['pwaste_name']
            , 'waste_type_id' => db::table('r_waste_type')->where('waste_type_name',$_POST['pwaste_type_name'])->value('waste_type_id')
        ]);
        $output = json_encode(array('Results' => $data));
        echo $output;
    }
}
