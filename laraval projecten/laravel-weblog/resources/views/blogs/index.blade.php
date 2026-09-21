<h1> Blogs </h1>

<table>
    <thead>
        <tr>
            <th>Blogs</th>
        </tr>
    </thead>
    <tbody>
        @foreach($blogs as $blog)
            <tr>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>