
@include("layouts.header")

<div>
<table align="center" style="margin-top:5%;">
  <tr>
    <th>Food Name</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Action</th>
  </tr>
  <form action="{{route('order.conform')}}" method="post">
  @csrf
  @foreach($cartInfo as $items)
  <tr>
    <td><input type="hidden" name="foodQuantity[]" value="{{$items->quantity}}">
      {{$items->quantity}}</td>
    @foreach($foodData as $food)
    @if($items->food_id == $food->id)
    <td><input type="hidden" name="foodname[]" value="{{$food->title}}">
      {{$food->title}}</td>
    <td><input type="hidden" name="foodprice[]" value="{{$food->price * $items->quantity}}">
      {{$food->price * $items->quantity}}</td>
    <td><a href="{{route('cart.delete', $items->id)}}">Delete</a></td>
    @endif
    @endforeach
  </tr>
  @endforeach
</table>
</div>

<div align="center" style="padding:10px;">
  <button type="button" id="order">Order Now</button>
</div>


<div id="orderaform" align="center" style="display:none;">
  <div style="padding:10px;">
    <label for="name">Name</label>
    <input type="text" name="name" placeholder="Enter Name">
  </div>
  <div style="padding:10px;">
    <label for="name">Phone</label>
    <input type="tel" name="phone" placeholder="Enter Phone Number">
  </div>
  <div style="padding:10px;">
    <label for="name">Address</label>
    <input type="text" name="address" placeholder="Address">
  </div>
  <div style="padding:10px;"> 
    <input type="submit" name="submit" value="Order Conform">
    <button type="button" id="close">Close</button>
  </div>
</div>
</form>
@include("layouts.footer")
