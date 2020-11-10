@extends('layouts.frontendtemplate')
@section('title', 'cart')

@section('content')
<!-- Content -->
<div class="container mt-5">
    <div class="row mt-5 shoppingcart_div">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th colspan="3"> Product </th>
                    <th colspan="3"> Qty </th>
                    <th> Price </th>
                    <th> SubTotal </th>
                </tr>
                </thead>
                <tbody id="shoppingcart_table">
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">
                            <textarea class="form-control notes" id="notes" placeholder="Any Request..."></textarea>
                        </td>
                        <td colspan="3">
                               @role('customer')
                                <button class="btn btn-outline-info btn-block mainfullbtncolor checkoutBtn">
                                        Check Out
                                </button>
                               @endrole
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

      {{-- <!-- No Shopping Cart Div -->
      <div class="row mt-5 noneshoppingcart_div text-center">

        <div class="col-12">
            <h5 class="text-center"> There are no items in this cart </h5>
        </div>

        <div class="col-12 my-2">
            <a href="categories" class="btn btn-secondary mainfullbtncolor px-3" >
                <i class="icofont-shopping-cart"></i>
                Continue Shopping
            </a>
        </div> --}}

    </div>

</div>
@endsection

@section('script')
<script src="{{ asset('my_asset/js/custom.js') }}"></script>
@endsection