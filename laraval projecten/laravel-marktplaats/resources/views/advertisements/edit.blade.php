<form action="{{route('advertisements.update', $advertisement)}}" method="POST">
    @csrf
    @method('PUT')
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" placeholder="Fridge" value="{{$advertisement->title}}">
    <br>
    <label for="price">Price:</label>
    <input type="number" step="0.01" name="price" id="price" placeholder="9.99" value="{{$advertisement->price}}">
    <br>
    <label for="category">Category:</label>
    <select name="category_id" id="category_id" placeholder="1" value="{{$advertisement->category_id}}">
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <br>
    <label style="vertical-align:top" for="description">Description:</label>
    <br>
    <textarea name="description" id="description" cols="48" rows="32" placeholder="Type your description here">{{$advertisement->description}}</textarea>
    <br>
    <button type="submit">Submit Edit</button>
</form>

@include('partials/errors')