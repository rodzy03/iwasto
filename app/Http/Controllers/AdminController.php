<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\RDocumentCategory;
use App\Models\RDocumentPurpose;
use App\Models\RPriorityLevel;

use App\Models\RDocumentInfo;
use App\Models\RSupportingDocumentInfo;
use App\Models\TDocumentHistory;
use App\Models\TDocumentManagement;
use App\Models\TDocumentMonitoring;
use App\Models\ROffice;
use App\User;
use Carbon\Carbon;
use ZipArchive;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function office() 
    {
        
        $offices = ROffice::get(['office_id','office_name']);
        return view('admin.addoffice',compact('offices'));

    }

    public function addoffices(Request $request)
    {
        ROffice::insert(['office_name' => $request->office_id, 'active_flag'=>1]);
        echo "good";
        return response()->json(['response' => "success" ]);

    }

    public function user()
    {
        $user = User::get(['id','email','name','role','office_id']);
        return view('admin.adduser',compact('user'));

    }

    public function documentsSetup() 
    {
        
        $category = RDocumentCategory::get(['category_id','category_description']);
        $purpose = RDocumentPurpose::select(['purpose_id','purpose_description'])->get();
        return view('admin.documentssetup',compact('category','purpose'));

    }

    public function addCategory(Request $request)
    {
        RDocumentCategory::insert(['category_description' => $request->id]);
        return response()->json(['response' => "success" ]);
    }
    public function updateCategory()
    {
        $category_id = request('cat_id');
            \DB::TABLE('r_document_category')
            ->where('category_id',$category_id)
            ->update(
                [
                    'category_description'=> request('cat_desc'),
                ]
            );          
            echo "good";
    }
   
}
