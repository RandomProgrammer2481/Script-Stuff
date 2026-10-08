<form action="{{route('sessions.store')}}" method="POST">
    <label for="email">Enter Email:</label>
    <input type="email" name="email" id="email" placeholder="email@example.net" value="{{old('email')}}">
    <br>
    <label for="password">Enter Password:</label>
    <input type="password" name="password" id="password" placeholder="********">
    <br>
    <a href="{{route('password.request')}}">Forgot your password?<a>
    <br>
    <label for="remember">Remember me:</label> 
    <input type="checkbox" name="remember" id="remember" value="true">
    <br>
    <button type="submit">Login</button>
</form>



@include('partials/errors')