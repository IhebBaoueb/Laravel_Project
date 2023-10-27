
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
    .font_size
    {
        text-align : center;
        font-size : 40px;
        padding-top : 20px
    }
    .th_color
    {
        background : skyblue ;
    }
    .th_deg
    {
        padding : 15px ;
    }

  </style>

  </head>
  <body>
  @include('admin.sidebar')
   
 
    @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <h2 class="font_size"> All Articles </h2>
            <table class="center">
                <tr class="th_color">
                    <td class="th_deg">Article Name </td>
                    <td class="th_deg">Article description </td>

                    <td>Edit</td>
                    <td>Delete</td>

                </tr>

                @foreach($article as $article)
                <tr>

                  <td>{{$article->title}}</td> 
                  <td>{{$article->description}}</td>  
 
                  <td><a class="btn btn-warning" href="{{url('edit_article',$article->id)}}">Edit</td>  
                  <td><a class="btn btn-danger" href="{{url('delete_article',$article->id)}}">Delete</td>  


                </tr>

                @endforeach

            </table>

        </div>

        
          <!-- partial -->
        
          @include('admin.js')

    <!-- End custom js for this page -->
  </body>
</html>
