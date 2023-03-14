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
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          </div>
        <div>
            <label>Title</label>
            <input style="color:black;" type="text" name="title" placeholder="Enter your Title" required>
        </div>
        <div>
            <label>price</label>
            <input style="color:black;" type="num" name="price" placeholder="Enter your price" required>
        </div>
        <div>
            <label>Image</label>
            <input style="color:black;" type="file" name="image" required>
        </div>
        <div>
            <label>Description</label>
            <input style="color:black;" type="text" name="description" placeholder="Enter your Description" required>
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