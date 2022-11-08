@extends('admin.layouts.app')

@section('panel')

    <div class="row">

        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>Off/On</th>
                                    <th>Campaign Name</th>
                                    <th>Delivery</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Target Country / City</th>
                                    <th>Form Used</th>
                                    <th>Daily Budget</th>
                                    <th>Cost</th>
                                    <th>Leads</th>
                                    <th>Cost per Leads</th>
                                    <th>Approve</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($campaigns as $campaign)

                            <tr>
                                <td><input disabled type="checkbox" name="status" @if($campaign->status) checked @endif  data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" class="toggle-status" data-id="{{$campaign->id}}"></td>
                                <td>{{ $campaign->name }} </td>
                                <td>{{ $campaign->delivery ? "Active" : "Inactive" }}</td>
                                <td>{{ $campaign->start_date }}</td>
                                <td>{{ $campaign->end_date }}</td>
                                <td>{{ $campaign->target_country }}, {{ $campaign->target_city }}</td>
                                <td>CZ Form</td>
                                <td>${{  $campaign->daily_budget }}</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><input type="checkbox" name="approve" @if($campaign->approve) checked @endif  data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" class="toggle-status" data-id="{{$campaign->id}}"></td>
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
</style>
@endpush
