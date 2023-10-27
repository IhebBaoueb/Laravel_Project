
<!DOCTYPE html>
<html lang="en">
  <head>
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
            <h1 class="title">Add Article</h1>
            @if(session()->has('message'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">X</button>
            {{session()->get('message')}}
            </div>
            @endif
            <form action="{{url('/add_article')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div style="padding:15px;">
                <label>Article Title</label>
                <input style="color:black" type="text" name="title" placeholder="Give article Title" required>
            </div>
            <div style="padding:15px;">
                <label>Article Description</label>
                <textarea style="color:black"  type="text" name="description" rows="3" cols="20" placeholder="Description " required>
                
                </textarea>

            </div>

            <div style="padding:15px;">
                <input type="file" name="file" >
            </div>
            <div class="btn btn-success" style="padding:15px;">
                <input type="submit" value="Add Article">
            </div>
            </form>

            </div>
        </div>
          <!-- partial -->
        
          @include('admin.js')

    <!-- End custom js for this page -->
  </body>
</html>
