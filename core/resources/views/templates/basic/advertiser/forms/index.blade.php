@extends($activeTemplate.'layouts.advertiser.frontend')
@php
    $user = auth()->guard('advertiser')->user();
@endphp
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class=" ">
                <div class="table-responsive--lg">
                    <table id="form_list" class="table table-striped table-bordered datatable " style="width:100%">
                        <thead>
                            <tr>
                                <th>Form Name</th>
                                <th>Field 1</th>
                                <th>Field 2</th>
                                <th>Field 3</th>
                                <th>Field 4</th>
                                <th>Field 5</th>

                                <th>Leads</th>
                                <th>Download Leads</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($forms as $form)
                            <tr>
                                <td>{{ $form->form_name }}</td>
                                 <td>{{$form->field_1['question_text']?? '' }}</td>
                                <td>{{$form->field_2['question_text']?? '' }}</td>
                                <td>{{$form->field_3['question_text']?? '' }}</td>
                                <td>{{$form->field_4['question_text']?? '' }}</td>
                                <td>{{$form->field_5['question_text']?? '' }}</td>
                                <td>10</td>
                                <td><a href="{{ route('advertiser.formleads.exportxlsx',$form->id) }}">Xlsx</a> |
                                <a href="{{ route('advertiser.formleads.exportcsv',$form->id) }}">Csv</a>
                                {{-- | <a href="#">Google Sheet</a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    'use strict';
    $(document).ready(function () {
        var MyDatatable =  $('#form_list').DataTable({  columnDefs: [  { targets: 7, searchable: false,  visible: true, orderable: false}, ],"sDom": 'Lfrtlip' });
    });
</script>
@endpush
@push('style')
<style>
    .table th {   padding: 12px 10px; max-width: 200px; }
    .table td {  text-align: left!important; border: 1px solid #e5e5e5!important; padding: 10px 10px!important; }
    table.dataTable thead tr {
    background-color: #1A273A;
}
label {
    color: #000 !important;
}
 #form_list_wrapper .dataTables_filter input {
    border-radius: 0!important;
}
#form_list_wrapper {
    overflow-x: scroll;
}
.dataTables_paginate .pagination .page-item.active .page-link {
    background-color: #1361b2;
    border-color: #1361b2;
    box-shadow: 0px 3px 5px rgb(0,0,0,0.125);
}
#form_list_wrapper .dataTables_paginate .pagination .page-item .page-link {
    border-radius: 0!important;
}
table.dataTable thead tr th {
    font-size: 15px;
    border-right: 1px solid #ffffff36;
}
#form_list_wrapper {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
#form_list_info {
    flex: auto;
    text-align: right;
}
#form_list_length {
    /*width: 30%;
    float: left;*/
    padding: 5px 0px 0px 5px;
}

div.dataTables_wrapper div.dataTables_paginate ul.pagination {
    margin: 2px 0;
    white-space: nowrap;
    justify-content: flex-start !important;
    padding-left: 10px;
}
</style>
@endpush
