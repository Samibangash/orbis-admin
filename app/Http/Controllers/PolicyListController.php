<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\PolicyBank;
use App\Models\PolicyList;
use DataTables;
use App\Models\PolicyDetail;
use Illuminate\Http\Request;

class PolicyListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('policies.policy_list');
    }

    public function getPolicies(Request $request)
    {
        if ($request->ajax()) {
            $data = PolicyList::query()->latest()->get();
            // dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('Actions', function($row){
                    $actionBtn = '<a href="" class="btn btn-sm btn-clean btn-icon edit-item" data-item-id="'.$row->id.'" data-toggle="modal" data-target="#editItemModel" title="Edit details"><i class="la la-edit"></i>
                                      </a>
                                      <a href="'.route('policy.policy.bank.list', $row->id).'" class="btn btn-sm btn-clean btn-icon view-item" title="Bank List">
                                        <i class="la la-file-alt"></i>
                                      </a>';
                    return $actionBtn;
                })
                ->rawColumns(['Actions'])
                ->make(true);
        }
    }

    public function policyBankIndex($id)
    {
        $policy = PolicyList::find($id);
        return view('policies.policy_bank_list', compact('policy'));
    }

    public function gePolicyBankList(Request $request)
    {

        if ($request->ajax()) {
            $data = PolicyDetail::query()->where('policy_id',$request->itemID)->latest()->with('bank')->get();
            // dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('Actions', function($row){
                    $actionBtn = '<a href="" class="btn btn-sm btn-clean btn-icon view-item" data-item-id="'.$row->id.'" data-toggle="modal" data-target="#viewItemModel" title="Edit details"><i class="la la-eye"></i>
                    </a>';
                    return $actionBtn;
                })
                ->rawColumns(['Actions'])
                ->make(true);
        }

    }
    public function show(Request $request)
    {
        $data = PolicyDetail::find($request->itemID);
        $bankName = $data->bank->name;
        return response()->json(['bank' => $bankName, 'description' => $data->description ]);
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
        $bank = new PolicyList;
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
     * @param  \App\Models\PolicyList  $policyList
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PolicyList  $policyList
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id   = $request->itemID;
        $data = PolicyList::find($id);
        return response()->json(['id' => $data->id, 'name' => $data->name, 'active' => $data->active , 'image_path' => $data->image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PolicyList  $policyList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $bank = PolicyList::find($request->item_id);
        if ($request->file('image_path')){
            $file = $request->file('image_path');
            Storage::delete('/public/images/bank_logo/'.$bank->image);
            $filename = time().uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('/public/images/bank_logo', $filename);
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
     * @param  \App\Models\PolicyList  $policyList
     * @return \Illuminate\Http\Response
     */
    public function destroy(PolicyList $policyList)
    {
        //
    }
}
