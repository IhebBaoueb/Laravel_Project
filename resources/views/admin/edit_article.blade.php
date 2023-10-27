
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')
  <style type="text/css">
    .title{
        color:white;
        padding-top:25px;
        font-size:25px

    }
    label{
        display:inline-block;
        width:200px;
    }
    input{
        color:black;
    }

  </style>

  </head>
  <body>
  @include('admin.sidebar')
   
 
    @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center">
            <h1 class="title">Edit Article</h1>
            @if(session()->has('message'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">X</button>
            {{session()->get('message')}}
            </div>
            @endif
            <form action="{{url('/edit_article_confirm',$article->id)}}" method="post" enctype="multipart/form-data">
                @csrf
            <div style="padding:15px;">
                <label>Article Title</label>
                <input style="color:black" type="text" name="title" placeholder="Give article Title" required="" 
                value="{{$article->title}}">
            </div>
            <div style="padding:15px;">
                <label>Article Description</label>
                <textarea style="color:black"  type="text" name="description" placeholder="Description " required=""
                value="{{$article->description}}">
                {{$article->description}}  
              </textarea>
            </div>

            
            <div class="btn btn-success" style="padding:15px;">
                <input type="submit" value="Edit Article">
            </div>
            </form>

            </div>
        </div>
          <!-- partial -->
        
          @include('admin.js')

    <!-- End custom js for this page -->
  </body>
</html>
