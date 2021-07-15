<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::all();
        return view('admin.customers', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();





        $user->name =  $request->input('name');
        $user->email =  $request->input('email');

        if (!empty($request->file('profile_photo_path'))) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('uploads/customer_profile/') . $user->profile_photo_path);
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/customer_profile'), $filename);
            $user['profile_photo_path'] = $filename;
        }
        $user->password = Hash::make($request->input('password'));
        $address = new Address([
            'shipping_address_line_1' =>  $request->input('shipping_address_line_1'),
            'shipping_address_line_2' =>  $request->input('shipping_address_line_2'),
            'shipping_district' =>  $request->input('shipping_district'),
            'shipping_state' =>  $request->input('shipping_state'),
            'shipping_pin' =>  $request->input('shipping_pin'),

            'shipping_address_line_1' =>  $request->input('shipping_address_line_1'),
            'billing_address_line_2' =>  $request->input('billing_address_line_2'),
            'billing_district' =>  $request->input('billing_district'),
            'billing_state' =>  $request->input('billing_state'),
            'billing_pin' =>  $request->input('billing_pin')
        ]);
        $user->save();
        $user->address()->save($address);
        $alert_message = [
            'message' => 'Customer Created Successfully Successfully',
            'alert-type' => 'success'
        ];
        return redirect('admin/customer')->with($alert_message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = User::find($id);
        // dd($customer);

        return view('admin.customers_edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name =  $request->input('name');
        $user->email =  $request->input('email');

        if (!empty($request->file('profile_photo_path'))) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('uploads/customer_profile/') . $user->profile_photo_path);
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/customer_profile'), $filename);
            $user['profile_photo_path'] = $filename;
        }

        $user->address->shipping_address_line_1 =  $request->input('shipping_address_line_1');
        $user->address->shipping_address_line_2 =  $request->input('shipping_address_line_2');
        $user->address->shipping_district =  $request->input('shipping_district');
        $user->address->shipping_state =  $request->input('shipping_state');
        $user->address->shipping_pin =  $request->input('shipping_pin');

        $user->address->shipping_address_line_1 =  $request->input('shipping_address_line_1');
        $user->address->billing_address_line_2 =  $request->input('billing_address_line_2');
        $user->address->billing_district =  $request->input('billing_district');
        $user->address->billing_state =  $request->input('billing_state');
        $user->address->billing_pin =  $request->input('billing_pin');


        $user->push();
        $alert_message = [
            'message' => 'Customer Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect('admin/customer')->with($alert_message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->address()->delete();
        $user->delete();
        return 1;
    }
}
