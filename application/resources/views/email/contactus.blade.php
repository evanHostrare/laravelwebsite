<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            .title{
                color:green;
            }
        </style>
    </head>
<body>    
<h4 class="title">Contact Us Message:</h4>
<p>Name: {{$name}}</p>
<p>Email From: {{$email}}</p>
<p>Phone: {{$phone}}</p>
<p>Message: {!!$content!!}</p>
</body>
</html>
