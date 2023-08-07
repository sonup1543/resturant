<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
  @include("admin.admincss")

  </head>
  <body>
  <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include("admin.navbar")
     <div>
        <table>
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Guest</th>
                <th>Date</th>
                <th>Time</th>
                <th>Message</th>
            </tr>
            @foreach($reservationData as $n=>$reserv)
            <tr>
                <td>{{$n+1}}</td>
                <td>{{$reserv->name}}</td>
                <td>{{$reserv->email}}</td>
                <td>{{$reserv->phone}}</td>
                <td>{{$reserv->numberguests}}</td>
                <td>{{$reserv->date}}</td>
                <td>{{$reserv->time}}</td>
                <td>{{$reserv->message}}</td>
            </tr>
            @endforeach
        </table>
     </div>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include("admin.adminscript")
  </body>
</html>