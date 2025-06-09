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
