<form action="{{route('sessions.store')}}" method="POST">
    <label for="email">Enter Email:</label>
    <input type="email" name="email" id="email" placeholder="email@example.net" value="{{old('email')}}">
    <br>
    <button type="submit">Send reset email</button>
</form>

@include('partials/errors')