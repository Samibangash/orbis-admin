<?php

namespace App\Http\Controllers;

use App\Models\BankCredit;
use App\Http\Requests\StoreBankCreditRequest;
use App\Http\Requests\UpdateBankCreditRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class BankCreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bank_credit.bank_credit_index');
    }


    public function getBankCredit(Request $request)
    {
        if ($request->ajax()) {
            $data = BankCredit::query()->latest()->get();
            // dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('Actions', function($row){
                    $actionBtn = '<a href="'.route('bank.credit.edit', $row->id).'" class="btn btn-sm btn-clean btn-icon edit-item" data-item-id="'.$row->id.'" data-toggle="modal" data-target="#editItemModel" title="Edit details">
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
     * @param  \App\Http\Requests\StoreBankCreditRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBankCreditRequest $request)
    {
        DB::beginTransaction();
        try {
            $bank_credit = new BankCredit();
            $bank_credit->name    =  $request->name;
            $bank_credit->active  =  $request->active ?? 0;
            $bank_credit->save();
            DB::commit();
            return back()->with(['type' => 'success', 'title' => 'success', 'message' => 'Bank Credit add successfully']);
        }catch (Exception $e){
            DB::rollBack();
            return back()->with(['type' => 'success', 'title' => 'error', 'message' => $e->getMessage().'something wrong!!']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankCredit  $bankCredit
     * @return \Illuminate\Http\Response
     */
    public function show(BankCredit $bankCredit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankCredit  $bankCredit
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id   = $request->itemID;
        $data = BankCredit::find($id);
        return response()->json(['id' => $data->id, 'name' => $data->name, 'active' => $data->active ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBankCreditRequest  $request
     * @param  \App\Models\BankCredit  $bankCredit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBankCreditRequest $request, BankCredit $bankCredit)
    {
        $bank = BankCredit::find($request->item_id);
        DB::beginTransaction();
        try {
            $bank->name = $request->name;
            $bank->active = $request->active ?? 0;
            $bank->save();
            DB::commit();
            return back()->with(['type' => 'success', 'title' => 'Updated', 'message' => 'Bank Credit Updated successfully']);
        }catch (Exception $e){
            DB::rollBack();
            return back()->with(['type' => 'error', 'title' => 'error', 'message' => $e->getMessage().'something wrong!!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankCredit  $bankCredit
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankCredit $bankCredit)
    {
        //
    }
}
