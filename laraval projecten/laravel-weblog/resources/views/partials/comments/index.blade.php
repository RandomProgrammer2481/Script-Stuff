<div class="w-full bg-white rounded-lg border p-2 my-4">
        <h2 class="font-bold">{{count($comments)}} Reactions.</h2>
        @include('partials.comments.create')
            <div class="flex flex-col">
                @foreach($comments as $comment)
                <div class="border rounded-md p-3 ml-3 my-3">
                    <div class="flex gap-3 items-center">>
                        <h3 class="font-bold">
                            {{$find_user_name($comment->user_id)}}
                        </h3>
                        {{$comment->created_at}}
                    </div>
                    <p class="text-gray-600 mt-2">
                        {{$comment->body}}
                    </p>
                </div>
                @endforeach
            </div>

    </div>