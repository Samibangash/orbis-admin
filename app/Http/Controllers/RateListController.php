<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\RateList;
use App\Models\RateBank;
use Illuminate\Http\Request;

class RateListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = RateBank::where('active', 1)->get();
        return view('rate_list.rate_list_index', compact('banks'));
    }

    public function getRateList(Request $request)
    {
        if ($request->ajax()) {
            $data = RateList::query()->latest()->with(['bank'])->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('Actions', function($row){
                    $actionBtn = '<a href="'.route('rate_list.edit', $row->id).'" class="btn btn-sm btn-clean btn-icon edit-item" data-item-id="'.$row->id.'" title="Edit details"><i class="la la-edit"></i></a>

                    <a href="" class="btn btn-sm btn-clean btn-icon view-item" data-item-id="'.$row->id.'" data-toggle="modal" data-target="#viewItemModel" title="View Detail">
                    <i class="la la-eye"></i></a>';
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
        $banks = RateBank::where('active', 1)->get();
        // dd($banks);
        // dd($rate->all());
        return view('rate_list.rate_list_create', compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rate = new RateList();
        $rate->bank_id = $request->bank_id;
        $rate->type_id = $request->type_id;
        $rate->high_rate = $request->high_rate;
        $rate->rental = $request->rental;
        $rate->conv_one = $request->conv_one;
        $rate->conv_two = $request->conv_two;
        $rate->conv_three = $request->conv_three;
        $rate->conv_four = $request->conv_four;
        $rate->uninsurable_conv = $request->uninsurable_conv;
        $rate->uninsurable_refinance = $request->uninsurable_refinance;
        $rate->amortization = $request->amortization;
        $rate->rental = $request->rental;
        $rate->save();
        return redirect()->route('rate_list.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RateList  $rateList
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = RateList::find($request->itemID);
        return response()->json(['bank' => $data->bank->name, 'rate' => $data]);
        //return view('rate_list.rate_list_view', compact('rate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RateList  $rateList
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banks = RateBank::where('active', 1)->get();
        $rate = RateList::find($id);
        // dd($rate);
        return view('rate_list.rate_list_edit', compact('rate', 'banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RateList  $rateList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rate = RateList::find($id);
        $rate->bank_id = $request->bank_id;
        $rate->type_id = $request->type_id;
        $rate->high_rate = $request->high_rate;
        $rate->rental = $request->rental;
        $rate->conv_one = $request->conv_one;
        $rate->conv_two = $request->conv_two;
        $rate->conv_three = $request->conv_three;
        $rate->conv_four = $request->conv_four;
        $rate->uninsurable_conv = $request->uninsurable_conv;
        $rate->uninsurable_refinance = $request->uninsurable_refinance;
        $rate->amortization = $request->amortization;
        $rate->rental = $request->rental;
        $rate->save();
        return redirect()->route('rate_list.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RateList  $rateList
     * @return \Illuminate\Http\Response
     */
    public function destroy(RateList $rateList)
    {
        //
    }
}
