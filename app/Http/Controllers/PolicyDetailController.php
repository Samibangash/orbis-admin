<?php

namespace App\Http\Controllers;

use App\Models\PolicyDetail;
use App\Models\PolicyList;
use App\Models\PolicyBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;



class PolicyDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $lists = PolicyList::all(); 
        $banks = PolicyBank::all(); 
        return view('policies.policy_detail',compact('lists','banks'));
    }

    public function getBanks(Request $request)
    {
        if ($request->ajax()) {
            $data = PolicyDetail::query()->latest()->with(['bank','policy'])->get();
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

        $bank = new PolicyDetail;
        $bank->policy_id = $request->policysel;
        $bank->bank_id = $request->banksel;
        $bank->description = $request->description;
        $bank->created_by    =  Auth::user()->id;
        $bank->active = $request->active ?? 0;
        $bank->save();

        return back()->with(['type' => 'success', 'title' => __('messages.success'), 'message' => __('messages.consultant_category.success')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PolicyDetail  $policyDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PolicyDetail $policyDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PolicyDetail  $policyDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $lists = PolicyList::all(); 
        $banks = PolicyBank::all(); 
        return view('policies.policy_detail',compact('lists','banks'));
        $id   = $request->itemID;
        $data = PolicyDetail::find($id);
        return response()->json(['id' => $data->id, 'bank_id' => $data->bank_id,'policy_id' => $data->policy_id,'description' => $data->description , 'active' => $data->active ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PolicyDetail  $policyDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $bank = new PolicyDetail;
        $bank->policy_id = $request->policysel;
        $bank->bank_id = $request->banksel;
        $bank->description = $request->description;
        $bank->created_by    =  Auth::user()->id;
        $bank->active = $request->active ?? 0;
        $bank->save();

        return back()->with(['type' => 'success', 'title' => __('messages.updated'), 'message' => __('messages.consultant_category.update')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PolicyDetail  $policyDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PolicyDetail $policyDetail)
    {
        //
    }
}
