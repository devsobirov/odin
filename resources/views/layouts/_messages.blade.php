<div class="container">
    @if($errors -> any())
        @foreach($errors->all() as $message)
            <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif
    @if(session('msg'))
        <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
            <strong>{{ session()->get('msg') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
            <strong>{{ session()->get('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
