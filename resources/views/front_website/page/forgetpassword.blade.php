@extends('front_website.layout.app')

@section('content')
<style>
    .row.justify-content-center {
    display: flex;
    justify-content: right;
}
</style>

<div class="row justify-content-center"> <!-- Added justify-content-center class -->
    <h2>Forget Password</h2>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('forgetPasswordPost') }}">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Submit</button>
    </form>
</div>







@endsection