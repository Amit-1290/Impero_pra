@extends('front.layout.index')
@section('title') Business @endsection
@section('css')

@endsection

@section('content')

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Businesses</h1>
    </div>

    <div class="container">
        <div class="card-deck mb-3 text-center">
            @forelse ($businessList as $businessInfo)
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">{{ $businessInfo['name'] ?? '' }}</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title"></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Email :
                            <a href="mailto: {{ $businessInfo['email'] ?? '' }}">{{ $businessInfo['email'] ?? '' }}</a> </li>
                        <li>Call : <a  href="tel:{{ $businessInfo['phoneNumber'] ?? '' }}">{{ $businessInfo['phoneNumber'] ?? '' }}</a></li>
                    </ul>

                    <!-- Braches  Start --------->
                    <b>Branches</b>
                    <ul class="list-unstyled mt-3 mb-4">
                        @forelse ($businessInfo['branches'] as $branchInfo)
                            <li>{{ $branchInfo['associatedBusinessName'] ?? ''  }} ({{ $branchInfo['name'] ?? ''  }}) </li>
                        @empty
                        @endforelse
                    </ul>
                    <!-- Braches  End --------->
                    <a href="{{ route('getBusinessDetail',['business' => $businessInfo['id'] ] )}}"> View Details</a>
                </div>
            </div>
            @empty
            <div class="card mb-4 shadow-sm mt-5">
                <h4 class="text-center">Data not Found </h4>
            </div>
            @endforelse
        </div>
@endsection
