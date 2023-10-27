
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
    .center 
    {
        margin: auto;
        width: 50% ;
        text-align : center;
        margin-top : 30px; 
        margin-right : 30px; 

        border : 3px solid gray ;
    }

  </style>

  </head>
  <body>
  @include('admin.sidebar')
   
 
    @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="container" >
            <h1 class="title">Add Type of Task </h1>
            @if(session()->has('message'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">X</button>
            {{session()->get('message')}}
            </div>
            @endif
            <form action="{{url('/add_type_task')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div style="padding:15px;">
                <label>Type Name</label>
                <input style="color:black" type="text" name="title" placeholder="Give Type Name" required>
            </div>
            
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            
            <div class="btn btn-success" style="padding:15px;">
                <input type="submit" value="Add Type" >
            </div>
            </form>
            </div>

            <table class="center">
                <tr>
                    <td>Type Name </td>
                    <td>Action</td>
                </tr>

                @foreach($data as $data)
                <tr>

                  <td>{{$data->title}}</td>  
                  <td>
                    <a class="btn btn-danger" href="{{url('delete_type_task',$data->id)}}">Delete</td>  

                </tr>

                @endforeach

            </table>

        </div>

        
          <!-- partial -->
        
          @include('admin.js')

    <!-- End custom js for this page -->
  </body>
</html>
