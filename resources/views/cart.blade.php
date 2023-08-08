
@include("layouts.header")

<div>
<table align="center" style="margin-top:5%;">
  <tr>
    <th>Food Name</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Action</th>
  </tr>
  @foreach($cartInfo as $items)
  <tr>
    <td>{{$items->quantity}}</td>
    @foreach($foodData as $food)
    @if($items->food_id == $food->id)
    <td>{{$food->title}}</td>
    <td>{{$food->price * $items->quantity}}</td>
    <td><a href="{{route('cart.delete', $items->id)}}">Delete</a></td>
    @endif
    @endforeach
  </tr>
  @endforeach
</table>
</div>

@include("layouts.footer")
