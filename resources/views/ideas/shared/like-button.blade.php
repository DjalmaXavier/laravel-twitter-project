<div>
    @auth()
        @if ($idea->liked(Auth::user()))
            <form action="{{ route('ideas.unlike', $idea->id) }}" method="post">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                        {{ $idea->likes_count }}
                </button>
            </form>
        @else
            <form action="{{ route('ideas.like', $idea->id) }}" method="post">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
                        {{ $idea->likes_count }}
                </button>
            </form>
        @endif
    @endauth
    @guest()
        <a href="{{ route('login') }}"><span class="fas fa-heart me-1">
                {{ $idea->likes_count }}
            </span></a>
    @endguest
</div>
