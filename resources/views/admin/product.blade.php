
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
            <h1 class="title">Add Product</h1>
            @if(session()->has('message'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">X</button>
            {{session()->get('message')}}
            </div>
            @endif
            <form action="{{url('addproduct')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div style="padding:15px;">
                <label>Product Title</label>
                <input style="color:black" type="text" name="title" placeholder="Give  Product Title" required>
            </div>
            <div style="padding:15px;">
                <label>Product Description</label>
                <input style="color:black"  type="text" name="description" placeholder="Description Product" required>
            </div>
            <div style="padding:15px;">
                <label>Price</label>
                <input style="color:black"  type="number" name="price" placeholder="Price" required>
            </div>
            <div style="padding:15px;">
                <label>Quantity</label>
                <input style="color:black"  type="number" name="quantity" placeholder="Product Quantity" required>
            </div>
            <div style="padding:15px;">
            
                <input type="file" name="file" >
            </div>
            <div class="btn btn-success" style="padding:15px;">
                <input type="submit" value="add product" >
            </div>
            </form>

            </div>
        </div>
          <!-- partial -->
        
          @include('admin.js')

    <!-- End custom js for this page -->
  </body>
</html>
