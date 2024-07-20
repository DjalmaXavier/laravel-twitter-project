@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.side-bar')
        </div>
        <div class="col-6">
            @include('includes.success_message')
            @include('includes.error_message')
            @include('includes.submit_idea')
            <hr>
            @foreach ($ideas as $idea)
                @include('includes.idea_card')
            @endforeach
            <div class="mt-3">
                {{ $ideas->links() }}

            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
    </div>
@endsection
