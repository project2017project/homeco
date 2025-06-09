<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Securitysafety;
use App\Models\PropertySecuritysafety;

class SecuritysafetyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $securitysafeties = Securitysafety::orderBy('id', 'desc')->get();

        return view('admin.securitysafety',compact('securitysafeties'));
    }

    public function create(){
        return view('admin.securitysafety_create');
    }

    public function store(Request $request)
    {
        $rules = [
            'securitysafety'=>'required'
        ];
        $customMessages = [
            'securitysafety.required' => trans('admin_validation.Securitysafety is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $securitysafety = new Securitysafety();
        $securitysafety->securitysafety = $request->securitysafety;
        $securitysafety->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id){

        $securitysafety = Securitysafety::find($id);

        return view('admin.securitysafety_edit', compact('securitysafety'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'securitysafety'=>'required'
        ];
        $customMessages = [
            'securitysafety.required' => trans('admin_validation.Securitysafety is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $securitysafety = Securitysafety::find($id);
        $securitysafety->securitysafety = $request->securitysafety;
        $securitysafety->save();

        $notification = trans('admin_validation.Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.securitysafety.index')->with($notification);
    }

    public function destroy($id)
    {
        $count = PropertySecuritysafety::where('securitysafety_id', $id)->count();
        if($count == 0){
            $securitysafety = Securitysafety::find($id);
            $securitysafety->delete();

            $notification = trans('admin_validation.Delete Successfully');
            $notification = array('messege'=>$notification,'alert-type'=>'success');
            return redirect()->back()->with($notification);
        }else{
            $notification = trans('admin_validation.In this item multiple property exist, so you can not delete this item');
            $notification = array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }

    }
}
