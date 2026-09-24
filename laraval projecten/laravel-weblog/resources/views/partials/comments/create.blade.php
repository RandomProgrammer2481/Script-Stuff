
<form action="{{route('comments.store', $blog)}}" method="POST">
    <textarea name="body" id="body" rows="2" cols="64"></textarea>
    <br>
    <span>
        <button type="submit">Post Reactie</button>
        <button type="reset">Cancel</button>
    </span>
</form>
