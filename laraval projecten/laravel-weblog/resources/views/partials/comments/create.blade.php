@if(Auth::user())
<form action="{{route('comments.store', $blog)}}" method="POST">
    @csrf    
    @method('PUT')
    <div class="w-full px-3 my-2">
        <textarea
            class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
            name="body" placeholder='Type Your Comment' required></textarea>
    </div>

    <div class="w-full flex justify-end px-3">
        <input type='reset' class="bg-blue-700 text-white mx-1 px-6 py-2.5 rounded-md font-semibold hover:bg-blue-500 transition" value='Cancel'>
        <input type='submit' class="bg-blue-700 text-white mx-1 px-6 py-2.5 rounded-md font-semibold hover:bg-blue-500 transition" value='Post Comment'>
    </div>
</form>
@else
    <div class="w-full px-3 my-2">
        <h3>Please first log in to comment</h3>
    </div>

@endif