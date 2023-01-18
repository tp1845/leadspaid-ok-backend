@extends('admin.layouts.app')

@section('panel')
<link href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<div class="row">
    <div class="col-lg-12">
        <div class="card b-radius--10 ">
            <div class="card-body">
                <ul class="nav nav-tabs border-0" role="tablist">
                  <li class="nav-item mx-1">
                    <a class="nav-link btn-primary active" href="#profile" role="tab" data-toggle="tab">Publisher Admin</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link btn-primary" href="#buzz" role="tab" data-toggle="tab">Campaign Manager</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link btn-primary" href="#references" role="tab" data-toggle="tab">Campaign Exective</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link btn-primary" href="#admin" role="tab" data-toggle="tab">Admin</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content mt-3">
              <div role="tabpanel" class="tab-pane active" id="profile">
                <div class="table-responsive--md  table-responsive">
                    <table class="table table--light style--two" id="myTable">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th scope="col">Role</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Company Name</th>

                                <th scope="col">Phone</th>
                                <th scope="col">Country</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody> 

                            @if(!empty($Publisher))

                            @foreach($Publisher as $pub)                           
                            <tr>
                                <td data-label="Name" class="text--primary">
                                  <input type="checkbox" name="approve" @if($pub->status) checked @endif  data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" class="toggle-approve" data-id="{{$pub->id}}">



                              </td>
                              <td data-label="Name" class="text--primary">
                                 @if($pub->role == 0) normal @elseif($pub->role == 1) publisher_admin  @elseif($pub->role == 2) campaign_manager @elseif($pub->role == 3) campaign_executive @endif</td>
                                 <td data-label="Username">{{ $pub->name }}</td>
                                 <td data-label="Email">{{ $pub->email }}</td>
                                 <td data-label="Email">{{ $pub->company_name }}</td>
                                 <td data-label="Phone">{{ $pub->phone }}</td>
                                 <td>{{ $pub->country }}</td>

                                 <td data-label="Actions " class="">
                                    <a href="http://localhost/leadspaids/leadspaid/public/admin/advertiser/details/36" class="icon-btn d-none" data-toggle="tooltip" title="" data-original-title="Details">
                                        <i class="las la-desktop text--shadow"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif


                        </tbody>
                    </table><!-- table end -->
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="buzz">
                <div class="table-responsive--md  table-responsive">
                    <table class="table table--light style--two" id="myTable">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th scope="col">Role</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Company Name</th>

                                <th scope="col">Phone</th>
                                <th scope="col">Country</th>
                                <th scope="col">Actions</th>
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
                            </tr>
                        </tbody>
                    </table><!-- table end -->
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="references">
                <div class="table-responsive--md  table-responsive">
                    <table class="table table--light style--two" id="myTable">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th scope="col">Role</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Company Name</th>

                                <th scope="col">Phone</th>
                                <th scope="col">Country</th>
                                <th scope="col">Actions</th>
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
                            </tr>
                        </tbody>
                    </table><!-- table end -->
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="admin">
                <div class="table-responsive--md  table-responsive">
                    <table class="table table--light style--two" id="myTable">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th scope="col">Role</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Company Name</th>

                                <th scope="col">Phone</th>
                                <th scope="col">Country</th>
                                <th scope="col">Actions</th>
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
                            </tr>
                        </tbody>
                    </table><!-- table end -->
                </div>
            </div>
        </div>
    </div>
</div><!-- card end -->

</div>
</div>


<style type="text/css">
	.table th { padding: 12px 10px; max-width: 200px; }
    .table td { text-align: left!important; border: 1px solid #e5e5e5!important; padding: 10px 10px!important; }
    .toggle-group .btn {  padding-top: 0!important;  padding-bottom: 0!important;  top: -3px;  }
    .toggle.btn-sm {  min-width: 40px; min-height: 15px;  height: 15px; }
    .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
    .toggle.ios .toggle-handle { border-radius: 20px; }
    .toggle input[data-size="small"] ~ .toggle-group label {   text-indent: -999px;   }
    .toggle.btn .toggle-handle{ left: -9px;  top: -2px; }
    .toggle.btn.off .toggle-handle{ left: 9px; }
    .upload-btn-wrapper { position: relative; overflow: hidden; display: inline; }
    .btn { cursor: pointer; }
    .upload-btn-wrapper input[type=file] { font-size: 100px; position: absolute; width: 100%; height: 100%; left: 0; top: 0; opacity: 0; cursor: pointer; }
    .up-down-btn{ font-size: 28px; background: transparent; border: 0; padding: 0 }
    .text-light-red{ color: #ff7481!important}
    #myTable_length {width: 40%;float: left;}
    #myTable_info {margin: 10px 0;}
    #myTable_filter label input[type="search"] {height: 30px;border: 1px solid gray;margin-left:10px;}
</style>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $('#myTable').DataTable({"pageLength": 100,"sDom": 'Lfrtlip' });
</script>

@endsection
