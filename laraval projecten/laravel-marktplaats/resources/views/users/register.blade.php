<form action="{{route('users.store')}}" method="POST">
    <label for="name">Enter Name:</label>
    <input type="text" name="name" id="name" placeholder="John Doe" value="{{old('name')}}">
    <br>
    <label for="email">Enter Email:</label>
    <input type="email" name="email" id="email" placeholder="email@example.net" value="{{old('email')}}">
    <br>
    <label for="password">Enter Password:</label>
    <input type="password" name="password" id="password" placeholder="********">
    <br>
    <label for="password_confirmation">Confirm Password:</label>
    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="********">
    <br>
    <button type="submit">Register</button>
</form>

@include('partials/errors')