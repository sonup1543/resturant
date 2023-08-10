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

     
      <table>
        <tr>
        <th>S.No</th>
        <th>Food Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
        </tr>

        @foreach($orderdata as $n=>$order)
        <tr>
          <th>{{$n+1}}</th>
          <th>{{$order->foodname}}</th>
          <th>{{$order->price}}</th>
          <th>{{$order->quantity}}</th>
          <th>{{$order->name}}</th>
          <th>{{$order->phone}}</th>
          <th>{{$order->address}}</th>
        </tr>
        @endforeach
        
      </table>
     </div>
     </div>
     
          
     </div>   
   @include("admin.adminscript")
  </body>
</html>