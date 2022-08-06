<h2>New Post</h2>
{{\Session()->get('message')}}
<form action="{{URL::to('/')}}/posts" method="post" enctype="multipart/form-data"> @csrf
    <input type="text" name="title" placeholder="Title"><br>
    <select name="section" id="">
        <option value="">Select Section</option>
        <option value="services">Services</option>
        <option value="portfolio">Portfolio</option>
        <option value="about">About</option>
        <option value="team">Our Amazing Team</option>
    </select><br>
    <input type="file" name="picture"><br>
    <textarea name="content" placeholder="Content" cols="30" rows="10"></textarea><br>
    <button type="submit">Save</button>
</form>