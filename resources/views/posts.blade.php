<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>POSTS</h2>
    <p>DATABASE EMAIL NOTIFICATION</p>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Approved</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>
                @if($post->is_approved)
                    <button class="btn btn-success" disabled>Approved</button>
                @else
                    <button class="btn btn-primary approve" type="button" data-id="{{$post->id}}">Approve</button>
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".approve").on('click',function(){
        $.ajax({
            type:'PUT',
            url:"/posts/"+$(this).data('id'),
            data:{},
            success:(data)=>{
                if (data.success === true){
                    $(this).removeClass('btn-primary');
                    $(this).addClass('btn-success');
                    $(this).attr('disabled',true);
                    $(this).text('Approved');
                }else{
                    alert("Something Went Wrong")
                }
            }
        });

    });
</script>
</body>
</html>
