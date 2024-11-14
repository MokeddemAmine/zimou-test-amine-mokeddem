@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="d-flex justify-content-between align-items-center my-4">
            <a href="{{route('packages.create')}}" class="text-capitalize btn btn-success">create package</a>
            <a href="{{route('packages.export')}}" target="_blank" class="text-capitalize btn btn-outline-dark">export all packages</a>
        </div>
        @if (session('successMessage'))
            <div class="my-4 text-success">{{session('successMessage')}}</div>
        @endif
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