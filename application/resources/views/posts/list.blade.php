<h2>Welcome</h2>
<a href="{{URL::to('/')}}/dashboard" style="float:left;"> Dashboard</a>
<a href="{{URL::to('/')}}/posts/create" style="float:right;">New Post</a>
<form method="POST" action="{{URL::to('/')}}/logout" >@csrf
    <button type="submit">Logout</button>
</form>

{{\Session()->get('message')}}
<table width="100%" border="1">
    <tr>
        <th>Title</th>
        <th>Content</th>
        <th>Action</th>
        <th>Delete</th>
    </tr>
    @foreach($list as $item)
    <tr>
        <td>{{$item->title}}</td>
        <td>{{$item->content}}</td>
        <td><a href="{{URL::to('/')}}/posts/{{$item->id}}/edit">Edit</a></td>
        <td>
            <form action="{{URL::to('/')}}/posts/{{$item->id}}" method="post"> @csrf
                {{ method_field('DELETE') }}
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{$list->links()}}

