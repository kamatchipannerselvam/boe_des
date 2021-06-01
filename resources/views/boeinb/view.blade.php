<!--- Page layout design --->
<x-app-layout>     <!-- page title description ---->
<x-slot name="title">
    Inbound Management
</x-slot>
@section('content')
<div class="w-full overflow-x-hidden border-t flex flex-col">
<div class="card">
    <div class="card-header text-center">BOE Inbound - Document</div>
<!-- Body Content start  here-->                
<div class="card-body">
    <table class="table">
        <tr>
            <td>
                <label>Document No:</label> xxx<br>
                <label>Document Date:</label> xxx<br>
                <label>Vendor Name:</label> xxx<br>
            </td>
            <td>
                <label>Invoice No:</label> xxx<br>
                <label>Invoice Date:</label> xxx<br>
                <label>Currency:</label> xxx<br>
            </td>
            <td>
                <label>Total Qty:</label> xxx<br>
                <label>Total Value:</label> xxx<br>
                <label>Total GW:</label> xxx<br>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table class="table">
                    <tr>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Model No</th>
                        <th>Model Name</th>
                        <th>Hscode</th>
                        <th>Coo</th>
                        <th>Qty</th>
                        <th>U.Price</th>
                        <th>T.Price</th>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table class="table">
                    <tr>
                        <th>Hscode</th>
                        <th>Coo</th>
                        <th>Qty</th>
                        <th>T.Price</th>
                        <th>T.GW</th>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<!-- Body Content end here-->                
</div>
</div>
@endsection
<x-slot name="scripts">
<style>
.bg-light .itemdetails{
    color: #CC3363 !important;
}
.select2-results__options{
        font-size:13px !important;
}
.select2-selection__rendered {
    font-size: 13px !important;
    line-height: 31px !important;
}
.select2-container .select2-selection--single {
    height: 35px !important;
}
.select2-selection__arrow {
    height: 34px !important;
}
</style>
</x-slot>
</x-app-layout>