<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
  @include("admin.admincss")

  </head>
  <body>
    <div class="container-scroller">
     @include("admin.navbar")

     <div style="position:relative; top: 60px; right:-150px">
        <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">
        <div>
            <label>Title</label>
            <input type="text" name="title" placeholder="Enter your Title" required>
        </div>
        <div>
            <label>price</label>
            <input type="num" name="price" placeholder="Enter your price" required>
        </div>
        <div>
            <label>Image</label>
            <input type="file" name="image" required>
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description" placeholder="Enter your Description" required>
        </div>
        <div>
             <input style="color:black; background-color: red;" type="submit" value="Save" >
        </div>
       </form>
     </div>
          
     </div>   
   @include("admin.adminscript")
  </body>
</html>