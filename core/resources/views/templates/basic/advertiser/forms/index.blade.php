@extends($activeTemplate.'layouts.advertiser.frontend')
@php
    $user = auth()->guard('advertiser')->user();
@endphp
@section('panel')

    <div class="row">
        <div class="col-lg-12">
                    <div class=" ">
                        <div class="table-responsive--lg">
                            <table id="campaign_list" class="table table-striped table-bordered datatable " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Form Name</th>
                                        <th>Field 1</th>
                                        <th>Field 2</th>
                                        <th>Field 3</th>
                                        <th>Field 4</th>
                                        <th>Field 5</th>
                                        <th>Field 6</th>

                                        <th>Leads</th>
                                        <th>Download Leads</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i <= 5; $i++)
                                    <tr>

                                        <td>{{ $i }} CZ_Form</td>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Phone</td>
                                        <td>Length of stay</td>
                                        <td>Education</td>
                                        <td>Where do you live in singapore</td>
                                        <td>10</td>
                                        <td><a href="#">Download</a></td>
                                    </tr>
                                     @endfor
                                </tbody>

                            </table>
                        </div>
                    </div>

                    <div class="my-3">

                    </div>
            </div>
     </div>

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
               <button type="button" class="close ml-auto m-3" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
               </button>
                    <form action="" method="POST">
                        @csrf
                        <div class="modal-body text-center">
                            <i class="las la-exclamation-circle text-danger f-size--100  mb-15"></i>
                            <h3 class="text--secondary mb-15">@lang('Are You Sure Want to Delete This?')</h3>
                        </div>
                    <div class="modal-footer justify-content-center">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('close')</button>
                      <button type="submit"  class="btn btn--danger del">@lang('Delete')</button>
                    </div>
                    </form>
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
        var MyDatatable =  $('#campaign_list').DataTable({
            columnDefs: [
                { targets: 8, searchable: false,  visible: true, orderable: false},
            ]
        });
    });
</script>
@endpush
@push('style')
<style>
    .table th {   padding: 12px 10px; max-width: 200px; }
    .table td {  text-align: left!important; border: 1px solid #e5e5e5!important; padding: 10px 10px!important; }
</style>
@endpush
