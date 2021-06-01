<table id="datatable_fixed_column" class="table table-condensed table-bordered bg-primary text-white" width="100%" style="font-size: 10px; width: 100%;" role="grid" aria-describedby="datatable_fixed_column_info">
<thead>
<tr role="row">
<th class="hasinput" rowspan="1" colspan="1"><input type="text" class="form-control" placeholder="ID"></th>
<th class="hasinput" rowspan="1" colspan="1"><input type="text" class="form-control" placeholder="Brand Name"></th>
<th class="hasinput" rowspan="1" colspan="1"><input type="text" class="form-control" placeholder="Product Name"></th>
<th class="hasinput" rowspan="1" colspan="1"> <input type="text" class="form-control" placeholder="Model Name"></th>
<th class="hasinput" rowspan="1" colspan="1"><input type="text" class="form-control" placeholder="Model Name"></th>
<th class="hasinput" rowspan="1" colspan="1"> <input type="text" class="form-control" placeholder="Part No"></th>
<th class="hasinput" rowspan="1" colspan="1"> <input type="text" class="form-control" placeholder="Color"></th>
<th class="hasinput" rowspan="1" colspan="1"> <input type="text" class="form-control" placeholder="Made In"></th>
<th colspan="5" class="hasinput" rowspan="1">
<table width="100%" border="0" >
<tr class="bg-warning text-primary">
<td>Total Stock Qty:</td>
<td><font color="#00CC00" class="font-weight-bolder"><span id="avltotalqtyspan" style="font-size: 15px;font-weight: bolder;"><?php echo $totalqty; ?></span></font></td>
<td align="right"><span style="text-align:right"><button onclick="refreshdiv()" class="btn btn-labeled btn-info" style="font-size:9px; font-weight:bold"> <span class="btn-label"><i class="glyphicon glyphicon-refresh"></i></span>REFRESH</button> </span></td>
<td align="right"><span style="text-align:right"><a class="btn btn-labeled btn-success" style="font-size:9px; font-weight:bold" href="<?php echo $ajaxacturrl;?>">
<span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>SEND ORDER</a></span></td></tr>
</table>
</th>
</tr>
<tr valign="middle" role="row">
    <th class="sorting_asc" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending">BOE NUMBER</th>
    <th class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Brand</th>
    <th class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Brand: activate to sort column ascending">Product Name</th>
    <th class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Model No: activate to sort column ascending">Model Name</th>
    <th class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Model Name.: activate to sort column ascending">EAN No.</th>
    <th class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Color: activate to sort column ascending">Part No.</th>
    <th class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Hscode: activate to sort column ascending">Color/Pin</th>
    <th class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="COO: activate to sort column ascending"> Made In</th>
    <th class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Quantity: activate to sort column ascending">Qty</th>
    <th class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Qty_R: activate to sort column ascending">Qty_R</th>
    <th data-hide="Request" class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Request: activate to sort column ascending">Request</th>
</tr>
</thead>
<tbody>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</tbody>
</table>
