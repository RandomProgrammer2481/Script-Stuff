<form action="{{route('advertisements.store')}}" method="POST">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" placeholder="Fridge" value="{{old('title')}}">
    <br>
    <label for="price">Price:</label>
    <input type="number" step="0.01" name="price" id="price" placeholder="9.99" value="{{old('price')}}">
    <br>
    <label for="category">Category:</label>
    <select name="category_id" id="category_id" placeholder="1" value="{{old('category_id')}}">
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <br>
    <label style="vertical-align:top" for="description">Description:</label>
    <br>
    <textarea name="description" id="description" cols="48" rows="32" placeholder="Type your description here">{{old('description')}}</textarea>
    <br>
    <button type="submit">Place Ad</button>
</form>

@include('partials/errors')