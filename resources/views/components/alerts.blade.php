@if (session('success'))

@endif
@if (session('error'))
    <div class="alert alert-success" role="alert">
        A simple success alert—check it out!
    </div>
@endif
