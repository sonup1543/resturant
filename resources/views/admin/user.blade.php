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

        <div style="position:relative; top : 60px; right:-60px;">

        <table bgcoloe="gray" border="3px">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
                <th>Position</th>
            </tr>
            @foreach($data as $data)
            <tr>
                <?php
                $position= $data->usertype;
                if($position == 0){
                    $positiondata = "customer";
                }else{
                    $positiondata = "admin";
                }
                ?>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$positiondata}}</td>
                
                @if($position == 0){
                <td><a href="{{url('/deleteuser', $data->id)}}">Delete</a></td>
               @else
                <td>Not Allowed</td>
                @endif
            </tr>
           @endforeach
        </table>

       </div>
</div>
   @include("admin.adminscript")
  </body>
</html>