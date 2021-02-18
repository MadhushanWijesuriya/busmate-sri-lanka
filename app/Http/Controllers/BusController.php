<?php


namespace App\Http\Controllers;


use App\Models\Bus;
use App\Models\Owner;
use App\Models\RouteCategory;
use Illuminate\Http\Request;

class BusController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('bus.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $category = RouteCategory::all();
        return view('bus.create',compact('category'));
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'bus_reg_no'=>'required|unique:buses|max:8',
            'owner_name'=>'required',
            'owner_address'=>'required|max:50',
            'owner_contact_no'=>'required|max:10'
        ]);

        $owner=new Owner;
        $owner->name = $request->owner_name;
        $owner->address=$request->owner_address;
        $owner->contact_no= $request->owner_contact_no;
        $saved=$owner->save();

        if(!$saved){
            return redirect()
                ->back()
                ->with('error', 'Unsuccessfully');
        }
        else{
            $bus = new Bus;
            $bus->bus_reg_no = $request->bus_reg_no;
            $bus->owner_id=Owner::where('name',$request->owner_name)->first()->id;
            $bus->category_id=$request->category_id;
            $saved=$bus->save();
            if (!$saved){
                return redirect()
                    ->back()
                    ->with('error', 'Unsuccessfully');
            }
        }
        return redirect()
            ->back()
            ->with('status', 'Saved Successfully');
    }

}
