<?php

namespace App\Http\Controllers\API;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\CampaignMailable;

class CampaignController extends Controller
{
    /**
     * Send a promotional email to all customers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Campaign::all();
    }

    public function create()
    {
        return view('campaigns.create');


    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
        ]);
        return response()->json(['message' => 'Campaign created', 'campaign' => $campaign]);
        }
    public function update(Request $request, Campaign $campaign)
    {
        // Update campaign with request data

        $campaign->save();

        return response()->json(['message' => 'Campaign updated', 'campaign' => $campaign]);
    }

    public function delete(Campaign $campaign)
    {
        $campaign->delete();

        return response()->json(['message' => 'Campaign deleted']);
    }
    public function send(Request $request)
    {
        $customers = Customer::all();

        foreach($customers as $customer) {
            Mail::to($customer->email)->send(new CampaignMailable($request->message));
        }

        return response()->json(['message' => 'Campaign emails sent']);
    }
}
