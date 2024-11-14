<?php

namespace App\Http\Controllers;

use App\Exports\PackagesExport;
use App\Models\commune;
use App\Models\Delivery_type;
use App\Models\Package;
use App\Models\Packages_statuse;
use App\Models\Store;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::orderBy('created_at', 'desc')->paginate(50);
        return view('packages.index',compact('packages'));
    }

    public function export(){
        return Excel::download(new PackagesExport,'packages.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $communes = commune::all();
        $delivery_types = Delivery_type::all();
        $packages_statuses = Packages_statuse::all();
        $stores = Store::all();
        return view('packages.create',compact('communes','delivery_types','packages_statuses','stores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'commune'               => ['required','integer','exists:communes,id'],
            'delivery_type'         => ['required','integer','exists:delivery_types,id'],
            'status'                => ['required','integer','exists:package_statuses,id'],
            'store'                 => ['required','integer','exists:stores,id'],
            'country'               => ['required','string'],
            'wilaya'                => ['required','string'],
            'address'               => ['required','string'],
            'can_be_opened'         => ['nullable','integer','in:0,1'],
            'name'                  => ['required','string'],
            'client_first_name'     => ['required','string'],
            'client_last_name'    => ['required','string'],
            'client_phone'          => ['required','string'],
            'client_phone2'         => ['nullable','integer'],
            'cod_to_pay'            => ['required','numeric'],
            'commission'            => ['required','numeric'],
            'free_delivery'         => ['nullable','integer','in:0,1'],
            'delivery_price'        => ['required','numeric'],
            'extra_weight_price'    => ['required','integer'],
            'packaging_price'       => ['required','integer'],
            'partner_cod_price'     => ['required','numeric'],
            'partner_delivery_price'=> ['required','integer'],
            'partner_return'        => ['required','numeric'],
            'price'                 => ['required','numeric'],
            'price_to_pay'          => ['required','numeric'],
            'return_price'          => ['required','integer'],
            'weight'                => ['required','integer'],
        ]);

        Package::create([
            'uuid'                     =>Str::uuid(),
            'tracking_code'            =>Str::uuid(),
            'commune_id'               => $request->commune,
            'delivery_type_id'         => $request->delivery_type,
            'status_id'                => $request->status,
            'store_id'                 => $request->store,
            'address'               => $request->country.' '.$request->wilaya.' '.$request->address,
            'can_be_opened'         => $request->can_be_opened?1:0,
            'name'                  => $request->name,
            'client_first_name'     => $request->client_first_name,
            'client_last_name'    => $request->client_last_name,
            'client_phone'          => $request->client_phone,
            'client_phone2'         => $request->client_phone2,
            'cod_to_pay'            => $request->cod_to_pay,
            'commission'            => $request->commission,
            'free_delivery'         => $request->free_delivery?1:0,
            'delivery_price'        => $request->delivery_price,
            'extra_weight_price'    => $request->extra_weight_price,
            'packaging_price'       => $request->packaging_price,
            'partner_cod_price'     => $request->partner_cod_price,
            'partner_delivery_price'=> $request->partner_delivery_price,
            'partner_return'        => $request->partner_return,
            'price'                 => $request->price,
            'price_to_pay'          => $request->price_to_pay,
            'return_price'          => $request->return_price,
            'total_price'           => $request->price_to_pay - $request->return_price + $request->delivery_price + $request->packaging_price,
            'weight'                => $request->weight,
        ]);

        return to_route('packages.index')->with('successMessage','The package created with success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        //
    }
}
