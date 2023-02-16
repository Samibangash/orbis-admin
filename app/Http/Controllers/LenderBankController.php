<?php

namespace App\Http\Controllers;

use App\Models\LenderBank;
use App\Models\PolicyBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use DataTables;

class LenderBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('hello');
        return view('lender_bank.lender_bank_list');
    }

    public function getLenderBanks(Request $request)
    {
        if ($request->ajax()) {
            $data = LenderBank::query()->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('Actions', function($row){
                    $actionBtn = '<a href="" class="btn btn-sm btn-clean btn-icon edit-item" data-item-id="'.$row->id.'" data-toggle="modal" data-target="#editItemModel" title="Edit details">
                                        <i class="la la-edit"></i>
                                      </a>
                                      <a href="" class="btn btn-sm btn-clean btn-icon view-item" data-item-id="'.$row->id.'" data-toggle="modal" data-target="#viewItemModel" title="View details">
                                        <i class="la la-eye"></i>
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
        $bank = new LenderBank;
        if ($request->file('image_path')){
            $file = $request->file('image_path');
            $filename = time().uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('/public/images/lender_bank ', $filename);
            $bank->image = $filename;
        }
        $bank->name = $request->name;
        $bank->submission_process = $request->submission_process;
        $bank->acreditation_process = $request->acreditation_process;
        $bank->active = $request->active;
        $bank->save();
        return back()->with(['type' => 'success', 'title' => __('messages.success'), 'message' => __('messages.consultant_category.success')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LenderBank  $lenderBank
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = LenderBank::find($request->itemID);
        return response()->json(['name' => $data->name, 'submission_process' => $data->submission_process, 'acreditation_process'=>$data->acreditation_process ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LenderBank  $lenderBank
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = LenderBank::find($request->itemID);
        return response()->json(['id' => $data->id, 'name' => $data->name, 'image_path'=> $data->image, 'active'=>$data->active, 'submission_process'=>$data->submission_process, 'acreditation_process'=>$data->acreditation_process]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LenderBank  $lenderBank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $bank = LenderBank::find($request->item_id);
        if ($request->file('image_path')){
            $file = $request->file('image_path');
            if($bank->image) {
                Storage::delete('/public/images/lender_bank/'.$bank->image);
            }
            $filename = time().uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('/public/images/lender_bank', $filename);
            $bank->image = $filename;
        }
        $bank->name=$request->name;
        $bank->submission_process=$request->submission_process;
        $bank->acreditation_process=$request->acreditation_process;
        $bank->active=$request->active?? 0;
        $bank->save();
        return back()->with(['type' => 'success', 'title' => __('messages.success'), 'message' => __('messages.consultant_category.success')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LenderBank  $lenderBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(LenderBank $lenderBank)
    {
        //
    }
}
