@extends('front_website.layout.app')

@section('content')

<h2>Forget Password</h2>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('resetPasswordPost') }}">
        @csrf
        <input type="hidden" name="token" value="{{$token}}">
        <div>
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>


        <div>
            <label for="">New Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div>
            <label for="">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation">
        </div>
        <button type="submit">Submit</button>
    </form>








@endsection