<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentApiController extends Controller
{
    public function login(Request $request)
    {
        $agent = Agent::query()->where('email', $request->email)->first();
        if ($agent) {
            if(Hash::check($request->password, $agent->password)) {
                if($request->token) {
                    $agent->token = $request->token;
                    $agent->save();
                }
                $output = [
                    'response' => array('response_id' => 0, 'response_desc' => "Success"),
                    'result' => array('id' => $agent->id, 'picture' => url('/storage/images/agent/').'/'.$agent->picture, 'full_name' => $agent->full_name, 'email' => $agent->email, 'token' => $agent->token, 'phone' => $agent->phone, 'description' => $agent->description, 'active' => $agent->active)
                ];
            } else {
                $output = [ 'response' => ['response_id' => 1, 'response_desc' => "Invalid Credentials"]];
                return response()->json($output);
            }
        } else {
            $output = [ 'response' => ['response_id' => 1, 'response_desc' => "Invalid Credentials"]];
            return response()->json($output);
        }
        return response()->json($output);
    }

    public function allAgent() {
        $data = Agent::query()->select('id','picture','full_name','email','phone')->where('active', '1')->paginate(10);
        $output = [
            'response' => array('response_id' => 0, 'response_desc' => "Success"),
            'result' => array('media_url' => url('/storage/images/agent/'), 'collection' => $data),
        ];

        return response()->json($output);
    }

    public function allAnnouncement() {
        $data = Announcement::query()->select('id','title','message', 'created_at')->orderByDesc('id')->paginate(10);
        $output = [
            'response' => array('response_id' => 0, 'response_desc' => "Success"),
            'result' => $data,
        ];

        return response()->json($output);
    }
}
