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
       <div>
      <table>
        <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Image</th>
        <th>Action</th>
        </tr>
        @foreach($foodData as $n=>$food)
        <tr>
          <th>{{$n+1}}</th>
          <th>{{$food->title}}</th>
          <th>{{$food->price}}</th>
          <th>{{$food->description}}</th>
          <th><img src="{{asset('foodimage/'.$food->image)}}" height="50px" width="50px"></th>
          <th><a href="{{route('delete.food',$food->id)}}">Delete</a></th>
        </tr>
        @endforeach
      </table>
     </div>
     </div>
     
          
     </div>   
   @include("admin.adminscript")
  </body>
</html>