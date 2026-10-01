<form action="{{route('categories.store')}}" method="POST">
    @csrf    
    @method('PUT')
    <span class="w-full flex justify-between my-5">
        <div class="w-full  ">
        <input type="text" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-sm py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
            name="name" id="name" placeholder='Category Name' required
            ></input>
        </div>

        <div class=" flex justify-end pl-3">
            
            <input type='submit' class="bg-blue-700 text-white mx-1 px-4 py-2.5 rounded-md font-semibold hover:bg-blue-500 transition" value='Add Category'>
        </div>
    </span>
</form>