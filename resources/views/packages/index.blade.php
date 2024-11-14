@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th class="text-capitalize">tracking code</th>
                    <th class="text-capitalize">store name</th>
                    <th class="text-capitalize">package name</th>
                    <th class="text-capitalize">status</th>
                    <th class="text-capitalize">client full name</th>
                    <th class="text-capitalize">phone</th>
                    <th class="text-capitalize">wilaya</th>
                    <th class="text-capitalize">commune</th>
                    <th class="text-capitalize">delivery type</th>
                    <th class="text-capitalize">status name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($packages as $package)
                    <tr>
                        <td>{{$package->tracking_code}}</td>
                        <td>{{$package->store->name}}</td>
                        <td>{{$package->name}}</td>
                        <td>{{$package->status_id}}</td>
                        <td>{{$package->client_first_name}} {{$package->client_first_name}}</td>
                        <td>{{$package->client_phone}}</td>
                        <td>{{$package->commune->wilaya->name}}</td>
                        <td>{{$package->commune->name}}</td>
                        <td>{{$package->delivery_type->name}}</td>
                        <td>{{$package->status->name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center my-5">{{$packages->links()}}</div>
    </div>
</div>
@endsection