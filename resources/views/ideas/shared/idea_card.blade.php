<div class="mt-3">
    <div class="card">
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $idea->user->getImageUrl() }}"
                        alt="{{ $idea->user->name }}">
                    <div>
                        <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user->id) }}">
                                {{ $idea->user->name }}
                            </a></h5>
                    </div>
                </div>
                <div>
                    <form action="{{ route('ideas.destroy', $idea->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        @auth
                            @if ($idea->user_id == Auth::user()->id)
                                {{-- Check if the id_user of the current idea is the same as the auth user --}}
                                <a class="mx-2" href="{{ route('ideas.edit', $idea->id) }}"> Edit </a>
                            @endif
                        @endauth
                        <a href="{{ route('ideas.show', $idea->id) }}"> View </a>
                        @auth
                            @if ($idea->user_id == Auth::user()->id)
                                <button class="ms-1 btn btn-danger btn-sm"> X </button>
                            @endif
                        @endauth
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($editing ?? false)
                <div class="row">
                    <div class="mb-3">
                        <form action="{{ route('ideas.update', $idea->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <textarea name="idea-content" class="form-control" id="idea" rows="3">{{ $idea->idea }}</textarea>
                            @error('idea-content')
                                <span class="d-block m-2 fs-6 text-danger"> {{ $message }} </span>
                            @enderror
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-dark"> Share </button>
                    </div>
                    </form>
                </div>
            @else
                <p class="fs-6 fw-light text-muted">
                    {{ $idea->idea }}
                </p>
            @endif
            <div class="d-flex justify-content-between">
                @include('ideas.shared.like-button')
                <div>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                        {{ $idea->created_at }}</span>
                </div>
            </div>
            @include('shared.comment-box')
        </div>
    </div>

</div>
</div>
