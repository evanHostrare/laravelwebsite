<h2>Update Post Information</h2>
{{\Session()->get('message')}}
<form action="{{URL::to('/')}}/posts/{{$singlepost->id}}" method="post" enctype="multipart/form-data"> @csrf
    {{ method_field('PUT') }}
    <input type="text" name="title" placeholder="Title" value="{{$singlepost->title}}"><br>
    <select name="section" id="">
        <option value="">Select Section</option>
        <option value="services" @if($singlepost->section=='services') selected @endif>Services</option>
        <option value="portfolio" @if($singlepost->section=='portfolio') selected @endif>Portfolio</option>
        <option value="about" @if($singlepost->section=='about') selected @endif>About</option>
        <option value="team" @if($singlepost->section=='team') selected @endif>Our Amazing Team</option>
    </select><br>   
    @if($singlepost->picture)     
    Old Picture:<br>
    <img style="width:50px;" src="{{URL::to('/')}}/application/storage/app/posts/{{$singlepost->picture}}" alt=""><br>
    @endif
    <input type="file" name="picture"><br>
    <textarea name="content" placeholder="Content" cols="30" rows="10">{{$singlepost->content}}</textarea><br>
    <button type="submit">Save</button>
</form>