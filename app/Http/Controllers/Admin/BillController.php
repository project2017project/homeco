<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\PropertyBill;

class BillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $bills = Bill::orderBy('id', 'desc')->get();

        return view('admin.bill',compact('bills'));
    }

    public function create(){
        return view('admin.bill_create');
    }

    public function store(Request $request)
    {
        $rules = [
            'bill'=>'required'
        ];
        $customMessages = [
            'bill.required' => trans('admin_validation.Bill is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $bill = new Bill();
        $bill->bill = $request->bill;
        $bill->save();

        if ($request->item1_icon) {
            $exist_banner = $bill->item1_icon;

            $file = $request->file('item1_icon'); // ✅ Properly get UploadedFile
            $extention = $file->getClientOriginalExtension();
            $banner_name = 'bill-item-one' . date('-Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $extention;
            $file_path = 'uploads/icons/' . $banner_name;
            $file->move(public_path('uploads/icons/'), $banner_name);

            $bill->item1_icon = $file_path;
            $bill->save();

            if ($exist_banner && File::exists(public_path($exist_banner))) {
                unlink(public_path($exist_banner));
            }
        }

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id){

        $bill = Bill::find($id);

        return view('admin.bill_edit', compact('bill'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'bill'=>'required'
        ];
        $customMessages = [
            'bill.required' => trans('admin_validation.Bill is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $bill = Bill::find($id);
        $bill->bill = $request->bill;
        $bill->save();

        if ($request->item1_icon) {
            $exist_banner = $bill->item1_icon;

            $file = $request->file('item1_icon'); // ✅ Properly get UploadedFile
            $extention = $file->getClientOriginalExtension();
            $banner_name = 'bill-item-one' . date('-Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $extention;
            $file_path = 'uploads/icons/' . $banner_name;
            $file->move(public_path('uploads/icons/'), $banner_name);

            $bill->item1_icon = $file_path;
            $bill->save();

            if ($exist_banner && File::exists(public_path($exist_banner))) {
                unlink(public_path($exist_banner));
            }
        }

        $notification = trans('admin_validation.Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.bill.index')->with($notification);
    }

    public function destroy($id)
    {
        $count = PropertyBill::where('bill_id', $id)->count();
        if($count == 0){
            $bill = Bill::find($id);
            $bill->delete();

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
