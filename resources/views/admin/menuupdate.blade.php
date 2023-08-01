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
        <form action="{{url('/updatefood/'.$foodData->id)}}" method="post" enctype="multipart/form-data">
          <div>
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          </div>
        <div>
            <label>Title</label>
            <input style="color:black;" type="text" name="title" value="{{$foodData->title}}" placeholder="Enter your Title" required>
        </div>
        <div>
            <label>price</label>
            <input style="color:black;" type="num" name="price" value="{{$foodData->price}}" placeholder="Enter your price" required>
        </div>
        <div>
            <label>Image</label>
            <label><img src="{{asset('foodimage/'.$foodData->image)}}" height="50px" width="50px"></label>
            <input style="color:black;" type="file" name="image" value="{{$foodData->image}}">
        </div>
        <div>
            <label>Description</label>
            <input style="color:black;" type="text" name="description" value="{{$foodData->description}}" placeholder="Enter your Description" required>
        </div>
        <div>
             <input style="color:black; background-color: red;" type="submit" value="update" >
        </div>
       </form>
      
     </div>
     
          
     </div>   
   @include("admin.adminscript")
  </body>
</html>