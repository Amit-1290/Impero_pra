@extends('front.layout.index')
@section('title')
    Business Details
@endsection
@section('css')
@endsection

@section('content')

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Business Detail</h1>
    </div>

    <div class="container">

        <a class="btn btn-outline-primary" href="{{ route('getBusiness') }}">Back</a>
        <a class="btn btn-outline-primary" href="{{ route('addBranches', ['business' => $businessInfo['id']]) }}">Add
            Branches</a>

        <div class="card-deck mb-3 text-center mt-3">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">{{ $businessInfo['name'] ?? '' }}</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title"></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Email : <a
                                href="mailto: {{ $businessInfo['email'] ?? '' }}">{{ $businessInfo['email'] ?? '' }}</a>
                        </li>
                        <li>Call : <a
                                href="tel:{{ $businessInfo['phoneNumber'] ?? '' }}">{{ $businessInfo['phoneNumber'] ?? '' }}</a>
                        </li>
                    </ul>

                    <!-- Branches  Start --------->
                    <hr>
                    <h5><b>Branches ({{count( $businessInfo['branches'])}})</b></h5>
                    <ul class="list-unstyled mt-3 mb-4">
                        @forelse ($businessInfo['branches'] as $branchInfo)
                            <li><b>{{ $branchInfo['associatedBusinessName'] ?? '' }} ({{ $branchInfo['name'] ?? '' }})
                                </b></li>

                            @foreach (json_decode($branchInfo['workingDayAndTime']) as $key => $dayInfo)
                                <div>
                                    {{ ucfirst($key) }} :
                                    @if ($dayInfo)
                                        @forelse ($dayInfo as $d)
                                            {{ $d }}
                                        @empty
                                        @endforelse
                                    @else
                                        Closed
                                    @endif
                                </div>
                            @endforeach
                            <br/>
                            @empty
                            @endforelse
                            <br />
                        </ul>

                    </div>
                </div>
            </div>
        @endsection
