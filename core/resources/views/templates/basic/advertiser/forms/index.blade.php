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
                                <td> Order : {{$form->field_1['sort'] }} <br> {{$form->field_1['question_text'] }}</td>
                                <td> Order : {{$form->field_2['sort'] }} <br> {{$form->field_2['question_text'] }}</td>
                                <td> Order : {{$form->field_3['sort'] }} <br> {{$form->field_3['question_text'] }}</td>
                                <td> Order : {{$form->field_4['sort'] }} <br> {{$form->field_4['question_text'] }}</td>
                                <td> Order : {{$form->field_5['sort'] }} <br> {{$form->field_5['question_text'] }}</td>
                                <td>10</td>
                                <td><a href="#">Download</a></td>
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
        var MyDatatable =  $('#form_list').DataTable({  columnDefs: [  { targets: 7, searchable: false,  visible: true, orderable: false}, ] });
    });
</script>
@endpush
@push('style')
<style>
    .table th {   padding: 12px 10px; max-width: 200px; }
    .table td {  text-align: left!important; border: 1px solid #e5e5e5!important; padding: 10px 10px!important; }
</style>
@endpush
