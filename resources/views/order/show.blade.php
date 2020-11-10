@extends('layouts.backendtemplate')

@section('content')
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
        <p>Start a beautiful journey here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h2>Order Detail</h2>

          <p>Orderno: {{$order->orderno}}</p>
          <p>Orderdate: {{$order->order_date}}</p>
          <p>Customer: {{$order->user->name}}</p>

          <table class="table table-bordered">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Item Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              @php $i=1; $total=0; @endphp
              @foreach($order->items as $item)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->price}} Ks</td>
                <td>{{$item->pivot->qty}}</td>
                <td>{{$item->price * $item->pivot->qty}} Ks</td>
              </tr>
              @php $total+= $item->price * $item->pivot->qty; @endphp
              @endforeach

              <tr>
                <td colspan="4" class="text-right">Total</td>
                <td>{{$total}} Ks</td>
              </tr>
            </tbody>
          </table>

          {{-- @if($order->status == 0)
          <form method="post" action="{{route('order.confirm',$order->id)}}">
            @csrf
            <button class="btn btn-info" type="submit">Confirm</button>
          </form>

          @elseif($order->status == 1)
            <button class="btn btn-success">Success Order</button>
          @endif --}}
        </div>
      </div>
    </div>
  </main>    
@endsection