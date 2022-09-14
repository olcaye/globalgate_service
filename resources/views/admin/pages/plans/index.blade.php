@extends('admin.layouts.app')
@section('title', 'Plans')
@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Plans</h1>
                           <span>You're showing the plans.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">List of Plans</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead class="table-dark">
                                    <tr>
                                        <th scope="col" class="col-3">Name</th>
                                        <th scope="col" class="col-3">Price</th>
                                        <th scope="col" class="col-3">Duration</th>
                                        <th scope="col" class="col-1 text-center">Credit</th>
                                        <th scope="col" class="col-2 text-center">#</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($plans as $plan)
                                    <tr>
                                        <td>{{ $plan->name }}</td>
                                        <td>{{ $plan->price_with_symbol }}</td>
                                        <td>{{ $plan->duration_with_month }}</td>
                                        <td class="text-center">{{ $plan->credits }}</td>
                                        <td class="text-center"><a href="{{ route('admin.plans.show', ['id' => $plan->id ]) }}" class="btn btn-dark">Edit</a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('footer-scripts')
@endsection
