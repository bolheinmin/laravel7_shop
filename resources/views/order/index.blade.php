@extends('layouts.backendtemplate')

@section('content')

  <main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-tasks"></i> Order Page</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Order List</a></li>
        </ul>
      </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h2 class="d-inline-block">Order List</h2>
          
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pending</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Confirm</a>
            </li>
          </ul>
          <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <table class="table mt-3 table-bordered dataTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Orderno</th>
                    <th>Orderdate</th>
                    <th>Total Amount</th>
                    <th>Customer Name</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @php 
                    $i=1;
                  @endphp
                  @foreach($pending_orders as $row)
                  <tr>
                    <td>
                        <span class="text-primary">
                            {{$i++}}
                        </span>
                    </td>
                    <td>
                        <span class="text-muted">
                            {{$row->orderno}}
                        </span>    
                    </td>
                    <td>
                      <span class="text-muted">{{ date('Y-M-d', strtotime($row->order_date)) }}</span>
                    </td>
                    <td>
                        <span class="text-dark font-weight-bold">{{$row->total_amount}} mmk</span>
                    </td>
                    <td>
                        <div class="text-primary font-weight-bold">
                            {{$row->user->name}}
                        </div>
                    </td>
                    <td>
                      <a href="{{route('order.show',$row->id)}}" class="btn btn-outline-info">Detail</a>
                      <a href="{{url('order/'.$row->id.'/confirm')}}" class="btn btn-outline-primary" onclick="return confirm('Are you sure ?')">Confirm</a>
                      <a href="{{url('order/'.$row->id.'/cancle')}}" class="btn btn-outline-danger" onclick="return confirm('Are you sure ?')">Cancle</a>

                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <table class="table mt-3 table-bordered dataTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Orderno</th>
                    <th>Orderdate</th>
                    <th>Total Amount</th>
                    <th>Customer Name</th>
                  </tr>
                </thead>
                <tbody>
                  @php 
                    $i=1;
                  @endphp
                  @foreach($confirmed_orders as $row)
                  <tr>
                    <td>
                        <span class="text-primary">
                            {{$i++}}
                        </span>
                    </td>
                    <td>
                        <span class="text-muted">
                            {{$row->orderno}}
                        </span>    
                    </td>
                    <td>
                      <span class="text-muted">{{ date('Y-M-d', strtotime($row->order_date)) }}</span>
                    </td>
                    <td>
                        <span class="text-dark font-weight-bold">{{$row->total_amount}} mmk</span>
                    </td>
                    <td>
                        <div class="text-primary font-weight-bold">
                            {{$row->user->name}}
                        </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('backend_asset/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend_asset/js/plugins/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript">
    $('.dataTable').DataTable();
  </script>
@endsection