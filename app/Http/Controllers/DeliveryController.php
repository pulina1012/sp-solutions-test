<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\Package;
use App\Models\Priority;
use App\Models\Delivery_provider;


class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::all();
        $packages = Package::all();
        $priorities = Priority::all();
        $delivery_providers = Delivery_provider::all();

        $all_orders = Delivery::selectRaw('deliveries.*,packages.*')
            ->join('packages', 'packages.id', 'deliveries.packageId')
            ->orderBy('deliveries.id', 'DESC')
            ->get();

        return view('deliveries', compact('deliveries', 'packages','priorities','delivery_providers'));

        dd($all_orders);
        // echo "<PRE>";
        // print_r($all_orders);
        // echo "</PRE>";
    }

    public function create()
    {
        $deliveries = Delivery::all();
        $packages = Package::all();
        return view('deliveries.create', compact('deliveries', 'packages'));
    }

    public function store(Request $request)
    {


        $delivery->pickupAddress = $request->pickup_address;
        $delivery->pickupName = $request->pickup_name;
        $delivery->pickupContact = $request->pickup_contact;
        $delivery->pickupEmail = $request->pickup_email;
        $delivery->deliveryAddress = $request->delivery_address;
        $delivery->deliveryName = $request->delivery_name;
        $delivery->deliveryContact = $request->delivery_contact;
        $delivery->deliveryEmail = $request->delivery_email;
        $delivery->packageId = $request->packageType;
        $delivery->deliveryProviderId = $request->deliveryProviderId;
        $delivery->priorityId = $request->priorityId;
        $delivery->pickupDate = $request->pickup_date;
        $delivery->pickupTime = $request->pickup_time;


        Delivery::create($request->all());
        return redirect()->route('deliveries.index')->with('success', 'Delivery Order created successfully');
    }
}
