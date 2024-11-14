@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <h2 class="text-capitalize text-center text-primary fw-bold">create package</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('packages.store')}}" method="POST" style="max-width: 800px;">
            @csrf
            <div class="form-group mb-2">
                <label for="commune" class="text-capitalize fw-bold">commune</label>
                <select name="commune" id="commune" class="form-select">
                    <option hidden>Choose commune</option>
                    @foreach ($communes as $commune)
                        <option value="{{$commune->id}}">{{$commune->name}} - {{$commune->wilaya->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="delivery_type" class="text-capitalize fw-bold">delivery type</label>
                <select name="delivery_type" id="delivery_type" class="form-select">
                    <option hidden>Choose delivery type</option>
                    @foreach ($delivery_types as $delivery_type)
                        <option value="{{$delivery_type->id}}">{{$delivery_type->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="status" class="text-capitalize fw-bold">package statuse</label>
                <select name="status" id="status" class="form-select">
                    <option hidden>Choose package statuse</option>
                    @foreach ($packages_statuses as $packages_statuse)
                        <option value="{{$packages_statuse->id}}">{{$packages_statuse->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="store" class="text-capitalize fw-bold">store</label>
                <select name="store" id="store" class="form-select">
                    <option hidden>Choose store</option>
                    @foreach ($stores as $store)
                        <option value="{{$store->id}}">{{$store->name}}</option>
                    @endforeach
                </select>
            </div>
            <h3 class="fw-bold text-capitalize">address</h3>
            <div class="form-group mb-2">
                <label for="country" class="text-capitalize fw-bold">country</label>
                <select name="country" id="country" class="form-select">
                    <option hidden>Choose country</option>
                    <option value="algeria">Algeria</option>
                    <option value="spain">spain</option>
                    <option value="germany">germany</option>
                    <option value="moroco">moroco</option>
                </select>
            </div>
            <div class="form-group mb-2">
                {{-- wilayas can chose by using ajax method : when chose a country the wilayas changes --}}
                <label for="wilaya" class="text-capitalize fw-bold">wilaya</label>
                <select name="wilaya" id="wilaya" class="form-select">
                    <option hidden>Choose wilaya</option>
                    <option value="alger">alger</option>
                    <option value="oran">oran</option>
                    <option value="tlemcen">tlemcen</option>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="address" class="text-capitalize fw-bold">address</label>
                <input type="text" name="address" placeholder="Enter your address" id="address" class="form-control">
            </div>
            <h3 class="fw-bold text-capitalize">others</h3>
            <div class="form-check form-switch mb-2">
                <input class="form-check-input" name="can_be_opened" value="1" type="checkbox" role="switch" id="can_be_opened">
                <label class="form-check-label" for="can_be_opened">can be opened</label>
            </div>
            <div class="form-group mb-2">
                <label for="name" class="text-capitalize fw-bold">name</label>
                <input type="text" name="name" placeholder="Enter the name of package" id="name" class="form-control">
            </div>
            <h2 class="fw-bold text-capitalize">client infos</h2>
            <div class="form-group mb-2">
                <label for="client_first_name" class="text-capitalize fw-bold">client first name</label>
                <input type="text" name="client_first_name" placeholder="Enter the client first name" id="client_first_name" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="client_last_name" class="text-capitalize fw-bold">client first name</label>
                <input type="text" name="client_last_name" placeholder="Enter the client last name" id="client_last_name" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="client_phone" class="text-capitalize fw-bold">client phone</label>
                <input type="text" name="client_phone" placeholder="Enter the client phone" id="client_phone" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="client_phone2" class="text-capitalize fw-bold">client phone 2</label>
                <input type="text" name="client_phone2" placeholder="Enter the client second phone" id="client_phone2" class="form-control">
            </div>
            <h2 class="fw-bold text-capitalize">delivery</h2>
            <div class="form-group mb-2">
                <label for="cod_to_pay" class="text-capitalize fw-bold">cod to pay</label>
                <input type="number" name="cod_to_pay" placeholder="Enter the cod to pay" id="cod_to_pay" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="commission" class="text-capitalize fw-bold">commission</label>
                <input type="number" name="commission" placeholder="Enter the commission" id="commission" class="form-control">
            </div>
            <div class="form-check form-switch mb-2">
                <input class="form-check-input" name="free_delivery" value="1" type="checkbox" role="switch" id="free_delivery">
                <label class="form-check-label" for="free_delivery">free delivery</label>
            </div>
            <div class="form-group mb-2">
                <label for="delivery_price" class="text-capitalize fw-bold">delivery price</label>
                <input type="number" name="delivery_price" placeholder="Enter the delivery price" id="delivery_price" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="extra_weight_price" class="text-capitalize fw-bold">extra weight price</label>
                <input type="number" name="extra_weight_price" placeholder="Enter the extra weight price" id="extra_weight_price" class="form-control">
            </div>
            <h2 class="fw-bold text-capitalize">packaging</h2>
            <div class="form-group mb-2">
                <label for="packaging_price" class="text-capitalize fw-bold">packaging price</label>
                <input type="number" name="packaging_price" placeholder="Enter the packaging price" id="packaging_price" class="form-control">
            </div>
            <h2 class="fw-bold text-capitalize">partner</h2>
            <div class="form-group mb-2">
                <label for="partner_cod_price" class="text-capitalize fw-bold">partner cod price</label>
                <input type="number" name="partner_cod_price" placeholder="Enter the partner cod price" id="partner_cod_price" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="partner_delivery_price" class="text-capitalize fw-bold">partner delivery price</label>
                <input type="number" name="partner_delivery_price" placeholder="Enter the partner delivery price" id="partner_delivery_price" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="partner_return" class="text-capitalize fw-bold">partner return </label>
                <input type="number" name="partner_return" placeholder="Enter the partner return" id="partner_return" class="form-control">
            </div>
            <h2 class="fw-bold text-capitalize">price infos</h2>
            <div class="form-group mb-2">
                <label for="price" class="text-capitalize fw-bold">price</label>
                <input type="number" name="price" placeholder="Enter the price" id="price" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="price_to_pay" class="text-capitalize fw-bold">price to pay</label>
                <input type="number" name="price_to_pay" placeholder="Enter the price to pay" id="price_to_pay" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="return_price" class="text-capitalize fw-bold">price return</label>
                <input type="number" name="return_price" placeholder="Enter the return price" id="return_price" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="weight" class="text-capitalize fw-bold">weight</label>
                <input type="number" name="weight" placeholder="Enter the weight" id="weight" class="form-control">
            </div>
            <div class="d-grid gap-2">
                <input type="submit" value="Add Package" class="btn btn-outline-dark text-capitalize">
            </div>
        </form>
    </div>
</div>
@endsection