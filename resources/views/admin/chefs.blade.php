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
        <form action="{{route('chef.upload')}}" method="post" enctype="multipart/form-data">
          <div>
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          </div>
        <div>
            <label>Name</label>
            <input style="color:black;" type="text" name="name" placeholder="Enter your Name" required>
        </div>
        <div>
            <label>Speciallity</label>
            <input style="color:black;" type="text" name="speciallity" placeholder="Enter your speciallity" required>
        </div>
        <div>
            <label>Image</label>
            <input style="color:black;" type="file" name="image" required>
        </div>        
        <div>
             <input style="color:black; background-color: red;" type="submit" value="Save" >
        </div>
       </form>
       
       <div>
      <table>
        <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>speciallity</th>
        <th>Image</th>
        <th>Delete</th>
        <th>Update</th>
        </tr>
        @foreach($chefsdata as $n=>$chef)
        <tr>
          <th>{{$n+1}}</th>
          <th>{{$chef->name}}</th>
          <th>{{$chef->speciallity}}</th>
          <th><img src="{{asset('chefs/'.$chef->image)}}" height="50px" width="50px"></th>
          <th><a href="{{route('chefs.delete',$chef->id)}}">Delete</a></th>
          <th><a href="{{route('chef.update',$chef->id)}}">update</a></th>

        </tr>
        @endforeach
      </table>
     </div>
     
     </div>
     
          
     </div>   
   @include("admin.adminscript")
  </body>
</html>