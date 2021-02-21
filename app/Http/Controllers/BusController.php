<?php


namespace App\Http\Controllers;


use App\Models\Bus;
use App\Models\Owner;
use App\Models\RouteCategory;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;

class BusController
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('bus.index');
    }
    public function getBusData(Request $request)
    {
        if ($request->ajax()) {
            $data = Bus::with('owner','routeCategory')->get();


            return Datatables::of($data)
                ->editColumn('owner_id',function ($data) {
                    return $data->owner->name;
                })
                ->editColumn('category_id',function ($data) {
                    return $data->routeCategory->name;
                })
                ->editColumn('created_at',function ($data) {
                    return $data->created_at->format('Y-m-d h:m');
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('bus.edit',['id'=>$row->id]).'" class="edit btn btn-success btn-sm">Edit</a> <a href="'.route('bus.edit',['id'=>$row->id]).'" role="button" class="delete btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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

        if(!empty($request->owner_name))
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
            $bus->route_category_id=$request->category_id;
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

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {dd('dsds');
        $category = RouteCategory::all();
        $bus=Bus::find($id)->first();
        $owner=$bus->owner->first();
        return view('bus.edit',compact('bus','category','owner'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id)
    {
        $validate=$request->validate([
            'bus_reg_no'=>'required|max:8',
            'owner_name'=>'required',
            'owner_address'=>'required|max:50',
            'owner_contact_no'=>'required|max:10'
        ]);

        $bus=Bus::find($id);

        $owner=Owner::find($bus->owner_id);
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
            $bus = Bus::find($id);
            $bus->bus_reg_no = $request->bus_reg_no;
            $bus->owner_id=Owner::where('name',$request->owner_name)->first()->id;
            $bus->route_category_id=$request->category_id;
            $saved=$bus->save();
            if (!$saved){
                return redirect()
                    ->back()
                    ->with('error', 'Update Unsuccessfully');
            }
        }
        return redirect()
            ->back()
            ->with('status', 'Update Successfully');

    }

}
