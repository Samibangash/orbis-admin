<?php

namespace App\Http\Controllers;

use App\Models\RateBank;
use Illuminate\Http\Request;
use DataTables;

class RateBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bank_rates.rate_banks_index');
    }


    public function getRateBank(Request $request)
    {
        if ($request->ajax()) {
            $data = RateBank::query()->latest()->get();
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
        return view('bank_rates.rate_banks_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ratebank = new RateBank;
        if ($request->file('image_path')){
            $file = $request->file('image_path');
            $filename = time().uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('/public/images/ratebank', $filename);
            $ratebank->image = $filename;
        }
        $ratebank->name = $request->name;
        $ratebank->active = $request->active ?? 0;
        $ratebank->save();

        return back()->with(['type' => 'success', 'title' => __('messages.success'), 'message' => __('messages.consultant_category.success')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RateBank  $rateBank
     * @return \Illuminate\Http\Response
     */
    public function show(RateBank $rateBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RateBank  $rateBank
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id   = $request->itemID;
        $data = RateBank::find($id);
        return response()->json(['id' => $data->id, 'name' => $data->name, 'active' => $data->active , 'image_path' => $data->image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RateBank  $rateBank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ratebank = RateBank::find($request->item_id);
        if ($request->file('image_path')){
            $file = $request->file('image_path');
            if($ratebank->image) {
                Storage::delete('/public/images/ratebank/'.$ratebank->image);
            }
            $filename = time().uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('/public/images/ratebank', $filename);
            $ratebank->image = $filename;
        }
        $ratebank->name = $request->name;
        $ratebank->active = $request->active ?? 0;
        $ratebank->save();

        return back()->with(['type' => 'success', 'title' => __('messages.updated'), 'message' => __('messages.consultant_category.update')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RateBank  $rateBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(RateBank $rateBank)
    {
        //
    }
}
