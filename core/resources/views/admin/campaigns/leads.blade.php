@extends('admin.layouts.app')

@section('panel')

    <div class="row">

        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table id="leadsTable" class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>Lead Id</th>
                                    <th>Price</th>
                                    <th>Field 1</th>
                                    <th>Field 2</th>
                                    <th>Field 3</th>
                                    <th>Field 4</th>
                                    <th>Field 5</th>
                                    <th>Campaign ID</th>
                                    <th>publisher  Id</th>

                                    <th>Form Id</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($leads as $lead)
                            <tr>
                                <td>{{ $lead->id }} </td>
                                <td>{{ $lead->price?$lead->price:0  }}</td>
                                <td>{{ $lead->field_1 }}</td>
                                <td>{{ $lead->field_2 }}</td>
                                <td>{{ $lead->field_3 }}</td>
                                <td>{{ $lead->field_4 }}</td>
                                <td>{{ $lead->field_5 }}</td>
                                <td>{{ $lead->campaign_id }}</td>
                                <td>{{ $lead->publisher_id }}</td>
                                <td>{{ $lead->form_id }}</td>
                                <td>{{ $lead->created_at  }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>

            </div><!-- card end -->
            <div class="card-footer py-4">

            </div>
        </div>


    </div>
@endsection


@push('breadcrumb-plugins')


@endpush
@push('script')
    <script>
        'use strict';
        $(document).ready(function() {

        });
    </script>
@endpush
@push('style')
<style>
    .table th { padding: 12px 10px; max-width: 200px; }
    .table td { text-align: left!important; border: 1px solid #e5e5e5!important; padding: 10px 10px!important; }
    .toggle-group .btn {  padding-top: 0!important;  padding-bottom: 0!important;  top: -3px;  }
    .toggle.btn-sm {  min-width: 40px; min-height: 15px;  height: 15px; }
    .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
    .toggle.ios .toggle-handle { border-radius: 20px; }
    .toggle input[data-size="small"] ~ .toggle-group label {   text-indent: -999px;   }
    .toggle.btn .toggle-handle{ left: -9px;  top: -2px; }
    .toggle.btn.off .toggle-handle{ left: 9px; }
    #selectimportfile{     display: inline-block;  width: auto; padding: 5px; }
</style>
@endpush
