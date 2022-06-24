<h2>Welcome</h2>
<a href="{{URL::to('/')}}/posts/create" style="float:right;">New Post</a>

{{\Session()->get('message')}}
<table width="100%" border="1">
    <tr>
        <th>Title</th>
        <th>Content</th>
    </tr>
    @foreach($list as $item)
    <tr>
        <td>{{$item->title}}</td>
        <td>{{$item->content}}</td>
    </tr>
    @endforeach
</table>
{{$list->links()}}

