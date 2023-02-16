<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Agent::all();
        return view('agent.agent_index', compact('data'));
    }

    public function getAgents(Request $request)
    {
        if ($request->ajax()) {
            $data = Agent::query()->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('Actions', function($row){
                    $actionBtn = '<a href="" class="btn btn-sm btn-clean btn-icon edit-item" data-item-id="'.$row->id.'" data-toggle="modal" data-target="#editItemModel" title="Edit details">
                                        <i class="la la-edit"></i>
                                      </a>';
                    return $actionBtn;
                })
                ->rawColumns(['Actions'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agent = new Agent;
        if ($request->file('image_path')){
            $file = $request->file('image_path');
            $filename = time().uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('/public/images/agent', $filename);
            $agent->picture = $filename;
        }
        $agent->full_name = $request->full_name;
        $agent->email = $request->email;
        $agent->phone = $request->phone;
        $agent->description = $request->description;
        $agent->password = app('hash')->make($request->password);
        $agent->active = $request->active ?? 0;
        $agent->save();

        return back()->with(['type' => 'success', 'title' => __('messages.success'), 'message' => __('messages.consultant_category.success')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id   = $request->itemID;
        $data = Agent::find($id);
        return response()->json(['id' => $data->id, 'full_name' => $data->full_name, 'email' => $data->email, 'phone' => $data->phone, 'description' => $data->description, 'active' => $data->active , 'image_path' => $data->picture]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $agent = Agent::find($request->item_id);
        if ($request->file('image_path')){
            $file = $request->file('image_path');
            Storage::delete('/public/images/bank_logo/'.$agent->image);
            $filename = time().uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('/public/images/agent', $filename);
            $agent->picture = $filename;
        }
        $agent->full_name = $request->full_name;
        $agent->email = $request->email;
        $agent->phone = $request->phone;
        $agent->description = $request->description;
        if($request->password != '') {
            $agent->password = app('hash')->make($request->password);
        }
        $agent->active = $request->active ?? 0;
        $agent->save();

        return back()->with(['type' => 'success', 'title' => __('messages.success'), 'message' => __('messages.consultant_category.success')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        //
    }
}
