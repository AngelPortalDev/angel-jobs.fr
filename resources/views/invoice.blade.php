@extends('layouts.main')
@section('content')
    <style>
        /* Logo styling */
        .logo-1 {
            width: 130px;
        }

        /* Invoice Header */
        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f6f5fe;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            border-bottom: 1px solid #eeeeee;
        }

        .invoice-header .logo-container {
            display: flex;
            justify-content: flex-start;
        }

        .invoice-header .details-container {
            display: flex;
            justify-content: flex-end;
            gap: 30px;
        }

        .invoice-header p {
            margin: 0;
            font-size: 14px;
        }

        .invoice-header b {
            font-size: 16px;
            color: #333;
        }

        .invoice-header .details-container div {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .invoice-header .details-container div p:last-child {
            font-weight: bold;
            color: #333;
        }

        .invoice-header .details-container div:not(:last-child) {
            border-right: 1.5px solid #ddd;
            padding-right: 15px;
            margin-right: 15px;
        }

        /* Address Section */
        .address-section {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            border-bottom: 1px solid #eeeeee;
        }

        .address-section .address {
            margin-bottom: 15px;
        }

        .address-section b {
            color: #333;
        }

        /* Table Styling */
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
            /* white-space: nowrap; */
        }

        /* table tbody td th{
            white-space: nowrap;
        } */

        table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tfoot tr {
            font-weight: bold;
            background-color: #f8f9fa;
        }

        /* Total Section */
        .total-section {
            margin-top: 20px;
            text-align: right;
            font-size: 18px;
            font-weight: bold;
        }

        /* Notes Section */
        .notes-section {
            font-size: 14px;
            color: #777;
            margin-top: 5px;
            text-align: left;
        }

        table tbody tr td {
            white-space: nowrap;
        }

        table tfoot tr td {
            white-space: nowrap;
        }

        table thead th {
            white-space: nowrap
        }

        @media print {

            .print-button,
            .print-button i,
            footer,
            header {
                display: none;
            }
        }
    </style>

    <!-- Content -->
    <div class="page-content bg-white" style="padding-top: 50px">

        <div class="container card pt-4">
            <div class="text-right mb-3">
                <button onclick="window.print()" class="btn btn-primary border-0 print-button">
                    <i class="fa-solid fa-print"></i> Print Invoice
                </button>
               
            </div>
        
            <!-- Invoice Header Section -->
            <div class="invoice-header flex-column flex-md-row">
                <div class="logo-container">
                    <img class="logo-1 mb-2" src="{{ asset('images/angel-Jobs-France.png') }}" alt="Angel Jobs France">
                </div>
                <div class="details-container">
                    <div>
                        <p class="mb-0">Date</p>
                        <p><strong>{{ \Carbon\Carbon::parse($InvoiceData->created_at)->format('d M Y') }}</strong></p>
                    </div>
                    <div>
                        <p class="mb-0">Order Id #</p>
                        <p><strong>{{ $InvoiceData->order_id }}</strong></p>
                    </div>
                </div>
            </div>
        
            <!-- Address Section -->
            <div class="address-section">
                <div class="d-flex justify-content-between flex-column flex-md-row">
                    <div class="address">
                        <p class="mb-0"><b>Angel Portal Pvt Ltd.</b></p>
                        <p class="mb-0"> Royal Palms, Aarey Colony,</p> 
                        <p class="mb-0">Goregaon East,</p>
                        <p class="mb-0">Mumbai - 400065.</p>
                        <p>India</p>
                    </div>
                    <div class="address">
                        @if (session()->has('js_username') || session()->has('emp_username'))
                            <p class="mb-0"><b>{{ ucwords($data->fullname) }}</b></p>
                            <p class="mb-0">{{ $data->email }}</p>
                            <p class="mb-0">{{$data->city_name ?? 'N/A'}}</p>
                            <p class="mb-0">{{$data->country_name ?? 'N/A'}}</p>
                            
                        @endif
                    </div>
                </div>
            </div>
        
            <!-- Payment Mode Section -->
            <div class="payment_mode_section d-flex justify-content-between flex-column flex-md-row">
                {{-- <div>Payment Mode: <span><strong>Credit Card</strong></span></div> --}}
                <div>Date: <span><strong>{{ \Carbon\Carbon::parse($InvoiceData->created_at)->format('d M Y') }}</strong></span></div>
            </div>
        
            <!-- Invoice Table -->
            <div class="table-responsive">
                <table class="table table-job-bx border-0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Cost Details</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{ $planData[0]->plan_name ?? 'Plan Name' }}</th>
                            <td>{{ \Carbon\Carbon::parse($InvoiceData->created_at)->format('d M Y') }}</td>
                            <td></td>
                            <td>{{ number_format($InvoiceData->payment_amount, 2) }}</td>
                        </tr>
                    </tbody>
                    <tfoot class="border-0">
                        {{-- <tr>
                            <td colspan="2"></td>
                            <td class="text-left fw-normal">Original Price</td>
                            <td class="fw-normal">{{ number_format($InvoiceData->payment_amount, 2) }}</td>
                        </tr> --}}
                        {{-- <tr>
                            <td colspan="2"></td>
                            <td class="text-left fw-normal">Scholarship</td>
                            <td class="fw-normal">0</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td class="text-left fw-normal">Discount</td>
                            <td class="fw-normal">0</td>
                        </tr> --}}
                        <tr>
                            <td colspan="2"></td>
                            <td class="text-left fw-bold">Grand Total</td>
                            <td>{{ number_format($InvoiceData->payment_amount, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        
            <!-- Notes Section -->
            <div class="notes-section">
                <p>Notes: Invoice was created on a computer and is valid without the signature and seal.</p>
            </div>
        </div>
    </div>
    <!-- Content END-->
@endsection
