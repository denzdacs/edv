@extends('layouts.app')

@section('title')
    EDV-Point of Sales
@endsection

@section('css')
    <link href="{{ asset('css/pos.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="custom-row-header">
                <div>
                   <h3>EDV TRADING & SERVICE CENTER</h3> 
                </div>
                <div>
                   VIRGILIO O. HERMIDA
                </div>
                <div>
                   P. Burgos St. Brgy. 22 Tacloban City 
                </div>
                <div>
                   VAT REG TIN NO. 180-486-825-001
                </div>
            </div>
            <div class="row custom-row">
                <div class="col-md-7"> 
                    <table class="table">
                      <tbody>
                        <tr>
                          <th>Sold To:</th>
                          <td><input type="text" id="sold_to" value="{{$invoice->customer}}" name="customer" class="custom-input2" disabled></input></td>
                        </tr>
                        <tr>
                          <th>Business Style:</th>
                          <td><input type="text" id="business_style" value="{{$invoice->business_style}}" name="business_style" class="custom-input2" disabled></input></td>
                        </tr>
                        <tr>
                          <th>Address:</th>
                          <td><input type="text" id="address" value="{{$invoice->address}}" name="address" class="custom-input2" disabled></input></td>
                        </tr>
                        <tr>
                          <th>TIN:</th>
                          <td><input type="text" id="tin" value="{{$invoice->tin}}" name="tin" class="custom-input2" disabled></input></td>
                        </tr>
                      </tbody>
                    </table>
                </div>     
                <div class="col-md-5" > 
                    <table class="table">
                      <tbody>
                        <tr>
                          <th>Invoice#:</th>
                          <td><input type="text" id="invoice_number" name="invoice_number" class="custom-input2"  value="{{$invoice->invoice_number}}" disabled></input></td>
                        </tr>
                        <tr>
                          <th>Date:</th>
                          <td><input type="text" class="custom-input2" name="date" value="{{$invoice->date}}" disabled></input></td>
                        </tr>
                        <tr>
                          <th>Terms:</th>
                          <td><input type="text" value="{{$invoice->terms}}" class="custom-input2" name="terms" disabled></input></td>
                        </tr>
                        <tr>
                          <th>Amount:</th>
                          <td><input type="text" value="{{$invoice->amount_given}}" class="custom-input2" value="0" name="amount_given" id="given_amount" disabled></input></td>
                        </tr>
                      </tbody>
                    </table>
                </div>     
            </div>
            <div class="row custom-row">
                <div class="table-container">
                    <table class="table table-striped tbl-pos">
                      <thead>
                        <tr>
                          <th scope="col">UNIT</th>
                          <th scope="col">UNIT PRICE</th>
                          <th scope="col">QTY</th>
                          <th scope="col">AMOUNT</th> </tr>
                      </thead>
                      <tbody id="transaction_items">
                        @foreach ($items as $item)
                          <tr>
                              <td>{{ $item[1] }}</td>
                              <td>{{ $item[3] }}</td>
                              <td>{{ $item[4] }}</td>
                              <td>{{ $item[6] }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
            <div class="row custom-row">
            </div>
            <div class="row custom-row">
                <div class="col-md-6"> 
                    <div style="padding-left: 40px;">
                        <button type="button"  data-toggle="modal" data-target="#pos-add-item" class="btn-custom btn btn-success"><i class="fa fa-lg fa-print"></i> Print</button>
                    </div>
                </div>     
                <div class="col-md-6" > 
                    <table class="table table-striped pos-table">
                      <tbody>
                        <tr>
                          <th>Total Sales(Net of VAT):</th>
                          <td><input type="text" class="custom-input2" value="{{$invoice->total_sales}}" name="total_sales" id="amount_total" disabled></td>
                        </tr>
                        <tr>
                          <th>Add 12% VAT:</th>
                          <td><input type="text" class="custom-input2" value="{{$invoice->total_sales_vat}}" name="total_sales_vat" id="amount_vat" disabled></td>
                        </tr>
                        <tr>
                          <th>TOTAL AMOUNT DUE:</th>
                          <td><input type="text" class="custom-input2" value="{{$invoice->amount_due}}" name="amount_due" id="amount_due" disabled></td>
                        </tr>
                        <tr>
                          <th>CHANGE:</th>
                          <td><input type="text" class="custom-input2" value="{{$invoice->amount_given - $invoice->amount_due}}" id="change" disabled></td>
                        </tr>
                      </tbody>
                    </table>
                </div>     
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/pos.js') }}"></script>
@endsection
