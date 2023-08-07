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
        <form action="{{route('chef.update.data', $updatechef->id)}}" method="post" enctype="multipart/form-data">
          <div>
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          </div>
        <div>
            <label>Name</label>
            <input style="color:black;" type="text" name="name" value="{{$updatechef->name}}" required>
        </div>
        <div>
            <label>Speciallity</label>
            <input style="color:black;" type="text" name="speciallity" value="{{$updatechef->speciallity}}" required>
        </div>
        <div>
            <label>Image</label>
            <label><img src="{{asset('chefs/'.$updatechef->image)}}" height="50px" width="50px"></label>
            <input style="color:black;" type="file" name="image">
        </div>        
        <div>
             <input style="color:black; background-color: red;" type="submit" value="Save" >
        </div>
       </form>
       
       
     </div>   
   @include("admin.adminscript")
  </body>
</html>