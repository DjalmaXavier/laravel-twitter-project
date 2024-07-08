<div class="row">
    <div class="mb-3">
        <form action="{{ route('idea.store') }}" method="POST">
            @csrf
            <textarea name="idea-content" class="form-control" id="idea" rows="3"></textarea>
            @error('idea-content')
                <span class="d-block m-2 fs-6 text-danger"> {{ $message }} </span>
            @enderror
    </div>
    <div class="">
        <button type="submit" class="btn btn-dark"> Share </button>
    </div>
    </form>
</div>
