<?php

namespace App\Http\Controllers;

use App\Models\PolicyBank;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PolicyBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('policies.Policy_Banks');

    }

    public function getBanks(Request $request)
    {
        if ($request->ajax()) {
            $data = PolicyBank::query()->latest()->get();
            // dd($data);
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
        $bank = new PolicyBank;
        if ($request->file('image_path')){
            $file = $request->file('image_path');
            $filename = time().uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('/public/images/policy_bank ', $filename);
            $bank->image = $filename;
        }
        $bank->name = $request->name;
        $bank->active = $request->active ?? 0;
        $bank->save();

        return back()->with(['type' => 'success', 'title' => __('messages.success'), 'message' => __('messages.consultant_category.success')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PolicyBank  $policyBank
     * @return \Illuminate\Http\Response
     */
    public function show(PolicyBank $policyBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PolicyBank  $policyBank
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id   = $request->itemID;
        $data = PolicyBank::find($id);
        return response()->json(['id' => $data->id, 'name' => $data->name, 'active' => $data->active , 'image_path' => $data->image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PolicyBank  $policyBank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $bank = PolicyBank::find($request->item_id);
        if ($request->file('image_path')){
            $file = $request->file('image_path');
            Storage::delete('/public/images/bank_logo/'.$bank->image);
            $filename = time().uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('/public/images/policy_bank', $filename);
            $bank->image = $filename;
        }
        $bank->name = $request->name;
        $bank->active = $request->active ?? 0;
        $bank->save();

        return back()->with(['type' => 'success', 'title' => __('messages.updated'), 'message' => __('messages.consultant_category.update')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PolicyBank  $policyBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(PolicyBank $policyBank)
    {
        //
    }
}
