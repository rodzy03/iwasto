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
        
        $output = json_encode(array('Results' => $zipcodes,'Top_Location' => $top_location));
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
        $full_name = $request->get('full_name');
        $email_address = $request->get('email');
        $contact_number = $request->get('contact_number');
        $main_document = $request->file('photo');
        
        
        $main_document->move(public_path('uploads/')
                , $main_document->getClientOriginalName()); 
        

        $file_name = $main_document->getClientOriginalName();
        db::table('t_citizen_patrol')
        ->insert([
            'type' => $selType
            , 'location' => $location
            , 'description' => $description
            , 'full_name' => $full_name
            , 'email_address' => $email_address
            , 'contact_number' => $contact_number
            , 'file_path' => $file_name
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
    
}
