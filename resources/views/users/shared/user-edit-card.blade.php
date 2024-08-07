<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}" method="POST">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageUrl() }}"
                        alt="{{ $user->name }}">
                    <div>

                        @method('PUT')
                        @csrf
                        <input name= "name" value='{{ $user->name }}' type="text" class="form-control">
                        @error('name')
                            <span class="d-block fs-6 text-danger mt-2"> {{ $message }}</span>
                        @enderror

                    </div>
                </div>
                <div>
                    @auth()
                        @if ($user->id === Auth::id())
                            <a href="{{ route('users.show', $user->id) }}">View</a>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="mt-4">
                <label for="">Profile Picture</label>
                <input name="image" class="form-control" type="file">
                @error('image')
                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }}</span>
                @enderror
            </div>

            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>

                <textarea name="bio" class="form-control" id="bio" rows="3">{{ $user->bio }}</textarea>
                @error('bio')
                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }}</span>
                @enderror
                <button class="btn btn-dark btn-sm mt-2 mb-2">Save</button>
        </form>
        @include('users.shared.user-stats')
    </div>
</div>
</div>
