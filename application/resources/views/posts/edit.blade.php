<h2>Update Post Information</h2>
{{\Session()->get('message')}}
<form action="{{URL::to('/')}}/posts/{{$singlepost->id}}" method="post"> @csrf
    {{ method_field('PUT') }}
    <input type="text" name="title" placeholder="Title" value="{{$singlepost->title}}"><br>
    <textarea name="content" placeholder="Content" cols="30" rows="10">{{$singlepost->content}}</textarea><br>
    <button type="submit">Save</button>
</form>