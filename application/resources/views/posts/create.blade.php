<h2>New Post</h2>
{{\Session()->get('message')}}
<form action="{{URL::to('/')}}/posts" method="post"> @csrf
    <input type="text" name="title" placeholder="Title"><br>
    <textarea name="content" placeholder="Content" cols="30" rows="10"></textarea><br>
    <button type="submit">Save</button>
</form>