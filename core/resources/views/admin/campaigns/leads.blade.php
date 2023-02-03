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
                                <th>A.ID</th>
                                <th>A.Name</th>
                                <th>Price</th>
                                <th>Field 1</th>
                                <th>Field 2</th>
                                <th>Field 3</th>
                                <th>Field 4</th>
                                <th>Field 5</th>
                                <th>Campaign ID</th>
                                <th>Campaign Name</th>
                                <th>publisher Id</th>
                                <th>publisher name</th>
                                <th>lgen_source</th>
                                <th>lgen_medium</th>
                                <th>lgen_campaign</th>
                                <th>Form Id</th>
                                <th>Form Name</th>
                                <th>Date</th>
                                <th>Expiry</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($leads as $lead)
                            <tr>
                                <td>{{ $lead->id }} </td>
                                <td>{{ $lead->advertiser_id }} </td>
                                <td>{{ $lead->aname }} </td>
                                <td>{{ $lead->price?$lead->price:0  }}</td>
                                <td>{{ $lead->field_1 }}</td>
                                <td>{{ $lead->field_2 }}</td>
                                <td>{{ $lead->field_3 }}</td>
                                <td>{{ $lead->field_4 }}</td>
                                <td>{{ $lead->field_5 }}</td>
                                <td>{{ $lead->campaign_id }}</td>
                                <td>{{ get_campaign_name_by_id($lead->campaign_id) }}</td>
                                <td>{{ $lead->publisher_id }}</td>
                                <td>{{ get_publisher_name_by_id($lead->campaign_id) }}</td>
                                <td>{{ $lead->lgen_source }}</td>
                                <td>{{ $lead->lgen_medium }}</td>
                                <td>{{ $lead->lgen_campaign }}</td>
                                <td>{{ $lead->form_id }}</td>
                                <td>{{ $lead->cfname }}</td>
                                <td>{{ $lead->created_at  }}</td>
                                <td>{{ $lead->expiry?'Expired':''  }}</td>
                                <td>
                                   
                                    <a href="{{ route('admin.leads.complete.delete',['id'=>$lead->id]) }}?tab=trash" onclick="return confirm('Do you want parmenent delete the lead?')" class="trashIocn" data-toggle="tooltip" title="" data-original-title="Delete">
                                        <i class="fa-regular fa-circle-xmark"></i>

                                    </a>
                                </td>
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


    $('#leadsTable').DataTable({

        "sDom": 'Lfrtlip',
        order: [[18, 'desc']],
        "pageLength": 50,
        "language": {
            "lengthMenu": "Show rows  _MENU_",
            search: "",
            searchPlaceholder: "Search"
        }

    });
</script>
@endpush
@push('style')
<style>
    .table th {
        max-width: 200px;
    }

    .table td {
        text-align: left !important;
        border: 1px solid #e5e5e5 !important;
        padding: 10px 10px !important;
    }

    .toggle-group .btn {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
        top: -3px;
    }

    .toggle.btn-sm {
        min-width: 40px;
        min-height: 15px;
        height: 15px;
    }

    .toggle.ios,
    .toggle-on.ios,
    .toggle-off.ios {
        border-radius: 20px;
    }

    .toggle.ios .toggle-handle {
        border-radius: 20px;
    }

    .toggle input[data-size="small"]~.toggle-group label {
        text-indent: -999px;
    }

    .toggle.btn .toggle-handle {
        left: -9px;
        top: -3px;
    }

    .toggle.btn.off .toggle-handle {
        left: 9px;
    }

    #selectimportfile {
        display: inline-block;
        width: auto;
        padding: 5px;
    }

    table thead tr th:after {
        top: 14px !important;
    }

    table thead tr th:before {
        bottom: 14px !important;
    }
    #leadsTable > tbody > tr > td:last-child{
        text-align: center !important;
    }
    #leadsTable .trashIocn i {
        color: red;
        border-radius: 100%;
    }

</style>
@endpush