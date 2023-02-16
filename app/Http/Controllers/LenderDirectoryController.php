<?php

namespace App\Http\Controllers;

use App\Models\LenderDirectory;
use App\Models\LenderBank;
use App\Http\Requests\StoreLenderDirectoryRequest;
use App\Http\Requests\UpdateLenderDirectoryRequest;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Auth;

class LenderDirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = LenderBank::all();
        return view('lender_directory.lender_directory_list', compact('banks'));
    }
    public function getLenderDirectory(Request $request)
    {
        if ($request->ajax()) {
            $data = LenderDirectory::query()->latest()->with(['bank'])->get();
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
     * @param  \App\Http\Requests\StoreLenderDirectoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $directory = new LenderDirectory();
        $directory->bank_id  = $request->bank_id;
        $directory->name  = $request->name;
        $directory->phone  = $request->phone;
        $directory->email  = $request->email;
        $directory->position  = $request->position;
        $directory->active  = $request->active?? 0;
        $directory->save();
        return back()->with(['type' => 'success', 'title' => __('messages.success'), 'message' => __('messages.consultant_category.success')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LenderDirectory  $lenderDirectory
     * @return \Illuminate\Http\Response
     */
    public function show(LenderDirectory $lenderDirectory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LenderDirectory  $lenderDirectory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = LenderDirectory::find($request->itemID);
        return response()->json(['id' => $data->id, 'bankId' => $data->bank_id, 'bankName' => $data->bank->name, 'name'=>$data->name, 'email'=>$data->email, 'phone'=>$data->phone, 'position'=>$data->position, 'active' => $data->active ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLenderDirectoryRequest  $request
     * @param  \App\Models\LenderDirectory  $lenderDirectory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $bank = LenderDirectory::find($request->item_id);
        $bank->bank_id = $request->bank_id;
        $bank->name = $request->name;
        $bank->phone = $request->phone;
        $bank->email = $request->email;
        $bank->position = $request->position;
        $bank->active  = $request->active ?? 0;
        $bank->save();
        return back()->with(['type' => 'success', 'title' => 'Updated', 'message' => 'Bank Policy Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LenderDirectory  $lenderDirectory
     * @return \Illuminate\Http\Response
     */
    public function destroy(LenderDirectory $lenderDirectory)
    {
        //
    }
}
