@extends('layouts.layout')

@section('title', $user->name)

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.side-bar')
        </div>
        <div class="col-6">
            @include('includes.success_message')
            @include('includes.error_message')
            <div class="mt-3">
                @include('users.shared.user-edit-card', ['editing'])
            </div>
            <hr>
            @forelse ($ideas as $idea)
                @include('ideas.shared.idea_card')
            @empty
                <p class="my-4">No Comments Found</p>
            @endforelse
            <div class="mt-3">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
    </div>
@endsection
