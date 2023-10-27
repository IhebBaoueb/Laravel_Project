
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
    .text_color
    {
        color : black;
        padding-bottom : 20px;

    }

  </style>

  </head>
  <body>
  @include('admin.sidebar')
   
 
    @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="container" >
            <h1 class="title">Add Task </h1>
            @if(session()->has('message'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">X</button>
            {{session()->get('message')}}
            </div>
            @endif
            <form action="{{url('/add_ToDoList')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div style="padding:15px;">
                <label>Task Title</label>
                <input style="color:black" type="text" name="title" placeholder="Give  Product Title" required>
            </div>
            


            <div style="padding:15px;">
                <label>Task Description</label>
                <input style="color:black"  type="text" name="description" placeholder="Description Product" required>
            </div>
            <div style="padding:15px;">
                <label>Task Type :</label>
                <select class="text_color" name="type_task">
                    <option value="" selected=""> Add a type here  </option>
                    @foreach($type_task as $type_task)

                    <option value="{{$type_task->title}}">
                         {{$type_task->title}} 
                    </option>

                    @endforeach

                </select>
            </div>
            <div style="padding:15px;">
                <label>Deadline </label>
                <input style="color:black" type="date" name="deadline" placeholder="Give a deadline" required>
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
                <input type="submit" value="Add Task" >
            </div>
            </form>
            </div>

            
            <table class="center">
                <tr>
                    <td>Task Name </td>
                    <td>Task Type </td>
                    <td>Action</td>
                </tr>

                @foreach($data as $data)
                <tr>

                  <td>{{$data->title}}</td>  
                  <td>{{$data->type_task}}</td>  

                  <td>
                    <a class="btn btn-warning" href="{{url('delete_ToDoList',$data->id)}}">Done</td>  

                </tr>

                @endforeach

            </table>

            
          

            
        </div>

        
          <!-- partial -->
        
          @include('admin.js')

    <!-- End custom js for this page -->
  </body>
</html>
