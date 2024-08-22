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
                <div class='d-flex'>
                    <a href="{{ route('ideas.show', $idea->id) }}"> View </a>
                    @auth
                        @can('update', $idea)
                            <a class="mx-2" href="{{ route('ideas.edit', $idea->id) }}"> Edit </a>
                            <form action="{{ route('ideas.destroy', $idea->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="ms-1 btn btn-danger btn-sm"> X </button>
                            </form>
                        @endcan
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
                        {{ $idea->created_at->diffForHumans() }}</span>
                </div>
            </div>
            @include('ideas.shared.comment-box')
        </div>
    </div>

</div>
</div>
