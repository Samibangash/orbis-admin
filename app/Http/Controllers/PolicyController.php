<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Policy;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\EventListener\ProfilerListener;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policies = Policy::all();
        $banks = Bank::get_all();
        return view('policy.policy_index', compact('policies','banks'));
    }

    public function getBankPolicies(Request $request)
    {
        if ($request->ajax()) {
            $data = Policy::query()->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('Actions', function($row){
                    $actionBtn = '<a href="'.route('bank.policy.edit', $row->id).'" class="btn btn-sm btn-clean btn-icon edit-item" title="Edit details">
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
        $banks = Bank::query()->where('active', '1')->get();
        return view('policy.policy_create', compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Policy;
        $data->title = $request->policy_title;
        $data->bank_id = $request->bank;
        $data->detail = $request->policy_detail;
        $data->active = $request->active;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('bank.policy.list')->with(['type' => 'success', 'title' => __('messages.success'), 'message' => __('Policy has been created.')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function show(Policy $policy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Policy::find($id);
        $banks = Bank::query()->where('active', '1')->get();
        return view('policy.policy_edit', compact('data','banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $data = Policy::find($request->id);
        $data->title = $request->policy_title;
        $data->bank_id = $request->bank;
        $data->detail = $request->policy_detail;
        $data->active = ($request->active == 'on') ? 1 : 0;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('bank.policy.list')->with(['type' => 'success', 'title' => __('messages.success'), 'message' => __('Policy has been created.')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Policy $policy)
    {
        //
    }
}
