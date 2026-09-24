<h2>{{count($comments)}} reacties.</h2>
<br>
<table>
    <thead>
        <th>@include('partials.comments.create')</th>
    </thead>
    <tbody>
        @foreach($comments as $comment)
        <tr>
            <td><strong>{{$find_user_name($comment->user_id)}}</strong></td>
            <td>{{$comment->created_at}}</td>
        </tr>
        <tr>
            <td colspan="2">{{$comment->body}}</td>
        </tr>
        @endforeach
    </tbody>
</table>