<?php

namespace App\Http\Controllers\Backend;

use App\Models\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $agents = Agent::query();

        if ($request->searchKeyword) {
            $agents->where('name',  'LIKE', "%$request->searchKeyword%")
                    ->orWhere('email',  'LIKE', "%$request->searchKeyword%")
                    ->orWhere('contact_number',  'LIKE', "%$request->searchKeyword%");
        }

        $agents = $agents->orderBy('name')->paginate(10);

        return view('backend.agent.index', compact('agents'));
    }

    /**
     * Update the visitor feedback status in reverse.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Agent $agent)
    {
        $status = $agent->status;
        $agent->status = $status;
        $agent->save();

        Alert::toast('Status successfully updated', 'success');

        return redirect()->back();
    }
}
