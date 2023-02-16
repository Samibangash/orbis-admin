<?php

namespace App\Http\Controllers;

use App\Imports\ImportRate;
use App\Models\Bank;
use App\Models\Rate;
use App\Models\RateValue;
use DataTables;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::get_all();
        return view('rate.rate_index', compact('banks'));
    }

    public function getRates(Request $request)
    {
        if ($request->ajax()) {
            $data = Rate::query()->latest()->with(['bank'])->get();
            // dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('Actions', function($row){
                    $actionBtn = '<a href="'.route('bank.rate.edit', $row->id).'" class="btn btn-sm btn-clean btn-icon edit-item" title="Edit details">
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
        $rate = new Rate;
        $rate->type = $request->type;
        $rate->bank_id = $request->bank;
        $rate->active = $request->active ?? 0;
        if($rate->save()) {
            $rate_value = new RateValue;
            $rate_value->rate_id = $rate->id;
            $rate_value->label = "5bps";
            $rate_value->value = $request->input('5bps');
            $rate_value->save();

            $rate_value = new RateValue;
            $rate_value->rate_id = $rate->id;
            $rate_value->label = "10bps";
            $rate_value->value = $request->input('10bps');
            $rate_value->save();

            $rate_value = new RateValue;
            $rate_value->rate_id = $rate->id;
            $rate_value->label = "15bps";
            $rate_value->value = $request->input('15bps');
            $rate_value->save();

            $rate_value = new RateValue;
            $rate_value->rate_id = $rate->id;
            $rate_value->label = "20bps";
            $rate_value->value = $request->input('20bps');
            $rate_value->save();

            $rate_value = new RateValue;
            $rate_value->rate_id = $rate->id;
            $rate_value->label = "max";
            $rate_value->value = $request->input('max');
            $rate_value->save();
        }
        return redirect()->route('bank.rate.list')->with(['type' => 'success', 'title' => __('messages.success'), 'message' => __('Rates has been created.')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function show(Rate $rate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Rate::find($id);
        $banks = Bank::get_all();
        return view('rate.rate_edit', compact('data','banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rate = Rate::find($request->id);
        $rate->type = $request->type;
        $rate->bank_id = $request->bank;
        $rate->active = ($request->active == 'on') ? 1 : 0;
        $rate->save();

        $rate_value = RateValue::query()->where([['rate_id', $request->id],['label', '5bps']])->first();
        $rate_value->value = $request->input('5bps');
        $rate_value->save();

        $rate_value = RateValue::query()->where([['rate_id', $request->id],['label', '10bps']])->first();
        $rate_value->value = $request->input('10bps');
        $rate_value->save();

        $rate_value = RateValue::query()->where([['rate_id', $request->id],['label', '15bps']])->first();
        $rate_value->value = $request->input('15bps');
        $rate_value->save();

        $rate_value = RateValue::query()->where([['rate_id', $request->id],['label', '20bps']])->first();
        $rate_value->value = $request->input('20bps');
        $rate_value->save();

        $rate_value = RateValue::query()->where([['rate_id', $request->id],['label', 'max']])->first();
        $rate_value->value = $request->input('max');
        $rate_value->save();

        return redirect()->route('bank.rate.list')->with(['type' => 'success', 'title' => __('messages.success'), 'message' => __('Rates has been created.')]);
    }

    public function import(Request $request)
    {
        Excel::import(new ImportRate, $request->file('import'));
        return redirect()->route('bank.rate.list')->with(['type' => 'success', 'title' => 'success', 'message' => 'Rates have been updated']);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rate $rate)
    {
        //
    }
}
