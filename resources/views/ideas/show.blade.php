@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.side-bar')
        </div>
        <div class="col-6">
            <h4> Share yours ideas </h4>
            @include('includes.success_message')
            @include('includes.error_message')
            <div class="mt-3">
                @include('includes.idea_card')
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
    </div>
@endsection
