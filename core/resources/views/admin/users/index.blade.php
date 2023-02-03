@extends('admin.layouts.app')

@section('panel')
<link href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<div class="row" id="ulser_list">
    <div class="col-lg-12">
        <div class="card b-radius--10 ">
            <div class="card-body pt-0">
                <ul class="nav nav-tabs border-0" role="tablist" id="myTab">
                    <li class="nav-item mx-1">
                        <a class="nav-link btn-primary active" href="#profile" role="tab" data-toggle="tab">Publisher Admin ({{$publisher_admin->count()}})</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link btn-primary" href="#buzz" role="tab" data-toggle="tab">Campaign Manager ({{$campaign_manager->count()}})</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link btn-primary" href="#references" role="tab" data-toggle="tab">Campaign Exective ({{$Campaign_executive->count()}})</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link btn-primary" href="#admin" role="tab" data-toggle="tab">Admin ({{$admin->count()}})</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link btn-primary" href="#AllActive" role="tab" data-toggle="tab">All Active ({{$userapprove->count()}})</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link btn-primary" href="#PendingLogin" role="tab" data-toggle="tab">Pending Login ({{$user_pending->count()}})</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link btn-primary" href="#trash" role="tab" data-toggle="tab"><i class="fa-solid fa-trash-can"></i></a>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content mt-3">
                    <div role="tabpanel" class="tab-pane active" id="profile">
                        <div class="table-responsive--md  table-responsive">
                            <table class="table table--light style--two" id="publisher_admin">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Assigned Advertisers</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Company Name</th>

                                        <th scope="col">Phone</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if(!empty($publisher_admin))

                                    @foreach($publisher_admin as $pub)
                                    <tr>
                                        <td data-label="Name" class="text--primary">
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                        <td data-label="Name" class="text--primary">
                                            @if($pub->role == 0) normal @elseif($pub->role == 1) publisher_admin @elseif($pub->role == 2) campaign_manager @elseif($pub->role == 3) campaign_executive @endif</td>
                              
                                        <td data-label="Assigned Advertiser">
                                            <?php $assigned =  get_assigned_advertisers($pub->id) ?>
                                            {{Count($assigned)}}
                                            <br/>
                                            <?php
                                            if (!empty($assigned )) {
                                                echo "<ul>";
                                                foreach ($assigned as $adv) {
                                                    if (!empty($adv)) {
                                                        echo "<li>" . $adv['name'] . '</li>';
                                                    }
                                                }
                                                echo "</ul>";
                                            }
                                            ?>
                                        </td>
                                        <td data-label="Email">{{ str_replace('@leadspaid.com',"",$pub->email) }}</td>
                                        <td data-label="Username">{{ $pub->name }}</td>
                                        <td data-label="Email">{{ $pub->company_name }}</td>
                                        <td data-label="Phone">{{ $pub->phone }}</td>
                                        <td>{{ $pub->country }}</td>

                                        <td data-label="Actions " class="delete_icon">

                                            <a style="font-size: 21px;" href="{{ route('admin.users/status',['id'=>$pub->id,'status'=>0])}}" class="" data-toggle="tooltip" title="" data-original-title="Disable">
                                                <i style="font-size: 21px;" class="fa-regular fa-circle-xmark"></i>
                                                <!-- <img src="{{ url('/')}}/assets/images/icon/delete.png" style="width:20px;margin:0 auto;"> -->
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
                            <table class="table table--light style--two" id="campaign_manager_table">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Assigned Advertisers</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Company Name</th>

                                        <th scope="col">Phone</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($campaign_manager))

                                    @foreach($campaign_manager as $pub)
                                    <tr>
                                        <td data-label="Name" class="text--primary">
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                        <td data-label="Name" class="text--primary">
                                            @if($pub->role == 0) normal @elseif($pub->role == 1) publisher_admin @elseif($pub->role == 2) campaign_manager @elseif($pub->role == 3) campaign_executive @endif</td>
                                 
                                        <td data-label="Assigned Advertiser">
                                            <?php $assigned =  get_assigned_advertisers($pub->id) ?>
                                            {{Count($assigned)}}
                                            <br/>
                                            <?php
                                            if (!empty($assigned )) {
                                                echo "<ul>";
                                                foreach ($assigned as $adv) {
                                                    if (!empty($adv)) {
                                                        echo "<li>" . $adv['name'] . '</li>';
                                                    }
                                                }
                                                echo "</ul>";
                                            }
                                            ?>
                                        </td>
                                     
                                        <td data-label="Email">{{ str_replace('@leadspaid.com',"",$pub->email) }}</td>
                                        <td data-label="Username">{{ $pub->name }}</td>
                                        <td data-label="Email">{{ $pub->company_name }}</td>
                                        <td data-label="Phone">{{ $pub->phone }}</td>
                                        <td>{{ $pub->country }}</td>

                                        <td data-label="Actions " class="delete_icon">


                                            <a style="font-size: 21px;" href="{{ route('admin.users/status',['id'=>$pub->id,'status'=>0])}}" class="" data-toggle="tooltip" title="" data-original-title="Disable">
                                                <i style="font-size: 21px;" class="fa-regular fa-circle-xmark"></i>
                                                <!-- <img src="{{ url('/')}}/assets/images/icon/delete.png" style="width:20px;margin:0 auto;"> -->
                                            </a>



                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table><!-- table end -->
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="references">
                        <div class="table-responsive--md  table-responsive">
                            <table class="table table--light style--two" id="Campaign_executive_table">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Assigned Advertisers</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Company Name</th>

                                        <th scope="col">Phone</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($Campaign_executive))

                                    @foreach($Campaign_executive as $pub)
                                    <tr>
                                        <td data-label="Name" class="text--primary">
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                        <td data-label="Name" class="text--primary">
                                            @if($pub->role == 0) normal @elseif($pub->role == 1) publisher_admin @elseif($pub->role == 2) campaign_manager @elseif($pub->role == 3) campaign_executive @endif</td>
                                        <td data-label="Assigned Advertiser">
                                            <?php $assigned =  get_assigned_advertisers($pub->id) ?>
                                            {{Count($assigned)}}
                                            <br/>
                                            <?php
                                            if (!empty($assigned )) {
                                                echo "<ul>";
                                                foreach ($assigned as $adv) {
                                                    if (!empty($adv)) {
                                                        echo "<li>" . $adv['name'] . '</li>';
                                                    }
                                                }
                                                echo "</ul>";
                                            }
                                            ?>
                                        </td>                     
                                        <td data-label="Email">{{ str_replace('@leadspaid.com',"",$pub->email) }}</td>
                                        <td data-label="Username">{{ $pub->name }}</td>   
                                        <td data-label="Company Name">{{ $pub->company_name }}</td>
                                        <td data-label="Phone">{{ $pub->phone }}</td>
                                        <td>{{ $pub->country }}</td>

                                        <td data-label="Actions " class="delete_icon">


                                            <a style="font-size: 21px;" href="{{ route('admin.users/status',['id'=>$pub->id,'status'=>0])}}" class="" data-toggle="tooltip" title="" data-original-title="Disable">
                                                <i style="font-size: 21px;" class="fa-regular fa-circle-xmark"></i>
                                                <!-- <img src="{{ url('/')}}/assets/images/icon/delete.png" style="width:20px;margin:0 auto;"> -->
                                            </a>


                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table><!-- table end -->
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="admin">
                        <div class="table-responsive--md  table-responsive">
                            <table class="table table--light style--two" id="admin_userss">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Company Name</th>

                                        <th scope="col">Phone</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($admin))

                                    @foreach($admin as $pub)
                                    <tr>
                                        <td data-label="Name" class="text--primary">
                                            <span class="badge badge-success">Active</span>

                                        </td>
                                        <td data-label="Name" class="text--primary">
                                            admin
                                        </td>
                                        <td data-label="Email">{{ str_replace('@leadspaid.com',"",$pub->email) }}</td>
                                        <td data-label="Username">{{ $pub->name }}</td>
                                        <td data-label="Company Name">{{ $pub->company_name }}</td>
                                        <td data-label="Phone">{{ $pub->phone }}</td>
                                        <td>{{ $pub->country }}</td>

                                        <td data-label="Actions " class="delete_icon" style="text-align: center;">

                                            @if(auth()->guard('admin')->user()->id != $pub->id)
                                            <a style="font-size: 21px;" href="{{ route('admin.admin/status',['id'=>$pub->id,'status'=>0])}}" class="" data-toggle="tooltip" title="" data-original-title="Disable">
                                                <i style="font-size: 21px;" class="fa-regular fa-circle-xmark"></i>
                                                <!-- <img src="{{ url('/')}}/assets/images/icon/delete.png" style="width:20px;margin:0 auto;"> -->
                                            </a>
                                            @endif
                                        </td>

                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table><!-- table end -->
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="PendingLogin">
                        <div class="table-responsive--md  table-responsive">
                            <table class="table table--light style--two" id="Pending_Login">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Company Name</th>

                                        <th scope="col">Phone</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($user_pending))
                                    @foreach($user_pending as $pub)
                                    <tr>
                                        <td data-label="Name" class="text--primary">
                                            <span class="badge badge-warning">Pending</span>

                                        </td>
                                        <td data-label="Name" class="text--primary">
                                            @if($pub->role == 0) normal @elseif($pub->role == 1) publisher_admin @elseif($pub->role == 2) campaign_manager @elseif($pub->role == 3) campaign_executive @endif</td>
                      
                                        <td data-label="Email">{{ str_replace('@leadspaid.com',"",$pub->email) }}</td>
                                        <td data-label="Username">{{ $pub->name }}</td>
                                        <td data-label="Company Name">{{ $pub->company_name }}</td>
                                        <td data-label="Phone">{{ $pub->phone }}</td>
                                        <td>{{ $pub->country }}</td>

                                        <td data-label="Actions " class="delete_icon">
                                            <a style="font-size: 21px;" href="{{ route('admin.users/status',['id'=>$pub->id,'status'=>0])}}" class="" data-toggle="tooltip" title="" data-original-title="Disable">
                                                <i style="font-size: 21px;" class="fa-regular fa-circle-xmark"></i>
                                                <!-- <img src="{{ url('/')}}/assets/images/icon/delete.png" style="width:20px;margin:0 auto;"> -->
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach


                                    @endif


                                    @if(!empty($adminpending))
                                    @foreach($adminpending as $pub)
                                    <tr>
                                        <td data-label="Name" class="text--primary">
                                            <span class="badge badge-warning">Pending</span>

                                        </td>
                                        <td data-label="Name" class="text--primary">
                                            Admin</td>
                                        <td data-label="Email">{{ str_replace('@leadspaid.com',"",$pub->email) }}</td>
                                        <td data-label="Username">{{ $pub->name }}</td>
                                        <td data-label="Company Name">{{ $pub->company_name }}</td>
                                        <td data-label="Phone">{{ $pub->phone }}</td>
                                        <td>{{ $pub->country }}</td>

                                        <td data-label="Actions " class="delete_icon">
                                            @if(auth()->guard('admin')->user()->id != $pub->id)
                                            <a style="font-size: 21px;" href="{{ route('admin.users/status',['id'=>$pub->id,'status'=>0])}}" class="" data-toggle="tooltip" title="" data-original-title="Disable">
                                                <i style="font-size: 21px;" class="fa-regular fa-circle-xmark"></i>
                                                <!-- <img src="{{ url('/')}}/assets/images/icon/delete.png" style="width:20px;margin:0 auto;"> -->
                                            </a>
                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach


                                    @endif
                                </tbody>
                            </table><!-- table end -->
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="AllActive">
                        <div class="table-responsive--md  table-responsive">
                            <table class="table table--light style--two" id="All_Active">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Assigned Advertisers</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Company Name</th>

                                        <th scope="col">Phone</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($userapprove))
                                    @foreach($userapprove as $pub)
                                    <tr>
                                        <td data-label="Name" class="text--primary">
                                            <span class="badge badge-success">Active</span>

                                        </td>
                                        <td data-label="Name" class="text--primary">
                                            @if($pub->role == 0) normal @elseif($pub->role == 1) publisher_admin @elseif($pub->role == 2) campaign_manager @elseif($pub->role == 3) campaign_executive @endif</td>
                                        <td data-label="Assigned Advertiser">
                                            <?php $assigned =  get_assigned_advertisers($pub->id) ?>
                                            {{Count($assigned)}}
                                            <br/>
                                            <?php
                                            if (!empty($assigned )) {
                                                echo "<ul>";
                                                foreach ($assigned as $adv) {
                                                    if (!empty($adv)) {
                                                        echo "<li>" . $adv['name'] . '</li>';
                                                    }
                                                }
                                                echo "</ul>";
                                            }
                                            ?>
                                        </td>
                                        <td data-label="Email">{{ str_replace('@leadspaid.com',"",$pub->email) }}</td>
                                        <td data-label="Username">{{ $pub->name }}</td>
                                        <td data-label="Company Name">{{ $pub->company_name }}</td>
                                        <td data-label="Phone">{{ $pub->phone }}</td>
                                        <td>{{ $pub->country }}</td>

                                        <td data-label="Actions " class="delete_icon">


                                            <a style="font-size: 21px;" href="{{ route('admin.users/status',['id'=>$pub->id,'status'=>0])}}" class="" data-toggle="tooltip" title="" data-original-title="Disable">
                                                <i style="font-size: 21px;" class="fa-regular fa-circle-xmark" data-toggle="tooltip" title="" data-original-title="Disable"></i>
                                                <!-- <img src="{{ url('/')}}/assets/images/icon/delete.png" style="width:20px;margin:0 auto;"> -->
                                            </a>

                                        </td>
                                    </tr>
                                    @endforeach


                                    @endif


                                    @if(!empty($adminapprove))
                                    @foreach($adminapprove as $pub)
                                    <tr>
                                        <td data-label="Name" class="text--primary">
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                        <td data-label="Name" class="text--primary">
                                            Admin</td>
                                        <td data-label="Assigned Advertiser">
                                          
                                        </td>
                                        <td data-label="Email">{{ str_replace('@leadspaid.com',"",$pub->email) }}</td>
                                        <td data-label="Username">{{ $pub->name }}</td>
                                        <td data-label="Company Name">{{ $pub->company_name }}</td>
                                        <td data-label="Phone">{{ $pub->phone }}</td>
                                        <td>{{ $pub->country }}</td>

                                        <td data-label="Actions " class="delete_icon">

                                            @if(auth()->guard('admin')->user()->id != $pub->id)
                                            <a style="font-size: 21px;" href="{{ route('admin.users/status',['id'=>$pub->id,'status'=>0])}}" class="" data-toggle="tooltip" title="" data-original-title="Disable">
                                                <i style="font-size: 21px;" class="fa-regular fa-circle-xmark" data-toggle="tooltip" title="" data-original-title="Disable"></i>
                                                <!-- <img src="{{ url('/')}}/assets/images/icon/delete.png" style="width:20px;margin:0 auto;"> -->
                                            </a>

                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach


                                    @endif


                                </tbody>
                            </table><!-- table end -->
                        </div>
                    </div>





                    <div role="tabpanel" class="tab-pane fade" id="trash">
                        <div class="table-responsive--md  table-responsive">
                            <table class="table table--light style--two" id="trash_table">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($user_trash))

                                    @foreach($user_trash as $pub)
                                    <tr>
                                        <td data-label="Name" class="text--primary">
                                            <span class="badge badge-danger">Deleted</span>
                                        </td>
                                        <td data-label="Name" class="text--primary">
                                            @if($pub->role == 0) normal @elseif($pub->role == 1) publisher_admin @elseif($pub->role == 2) campaign_manager @elseif($pub->role == 3) campaign_executive @endif</td>
                          
                                        <td data-label="Email">{{ str_replace('@leadspaid.com',"",$pub->email) }}</td>
                                        <td data-label="Username">{{ $pub->name }}</td>
                                        <td data-label="Company Name">{{ $pub->company_name }}</td>
                                        <td data-label="Phone">{{ $pub->phone }}</td>
                                        <td>{{ $pub->country }}</td>

                                        <td data-label="Actions " class="delete_icon">
                                            @if(auth()->guard('admin')->user()->id != $pub->id)
                                            <a href="{{ route('admin.users/status',['id'=>$pub->id,'status'=>1])}}" class="" data-toggle="tooltip" title="" data-original-title="Re-enable">
                                                <img src="{{ url('/')}}/assets/images/icon/add-button.png" style="width:22px;margin:0 auto;">
                                            </a>
                                            <a href="{{ route('admin.users/status',['id'=>$pub->id,'status'=>5])}}" onclick="return confirm('Do you want to permanently delete the User?')" class="delte_item" data-type="delete" data-toggle="tooltip" title="" data-original-title="delete"><i class="fa-regular fa-circle-xmark"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif


                                    @if(!empty($admin_trash))

                                    @foreach($admin_trash as $pub)
                                    <tr>
                                        <td data-label="Name" class="text--primary">
                                            <span class="badge badge-danger">Deleted</span>

                                        </td>
                                        <td data-label="Name" class="text--primary">
                                            Admin</td>
                                        <td data-label="Email">{{ str_replace('@leadspaid.com',"",$pub->email) }}</td>
                                        <td data-label="Username">{{ $pub->name }}</td>
                                        <td data-label="Company Name">{{ $pub->company_name }}</td>
                                        <td data-label="Phone">{{ $pub->phone }}</td>
                                        <td>{{ $pub->country }}</td>

                                        <td data-label="Actions " class="delete_icon">
                                            @if(auth()->guard('admin')->user()->id != $pub->id)
                                            <a href="{{ route('admin.admin/status',['id'=>$pub->id,'status'=>1])}}" class="_icon" data-toggle="tooltip" title="" data-original-title="Re-enable">
                                                <img src="{{ url('/')}}/assets/images/icon/add-button.png" style="width:22px;margin:0 auto;">
                                            </a>
                                            <a href="{{ route('admin.admin/status',['id'=>$pub->id,'status'=>5])}}" onclick="return confirm('Do you want to permanently delete the User?')" class="delte_item" data-toggle="tooltip" title="" data-original-title="delete"><i class="fa-regular fa-circle-xmark"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif



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
    .breadcrumb-plugins {
        display: none;
    }

    .table th {
        padding: 12px 10px;
        max-width: 200px;
    }

    .table td {
        text-align: left !important;
        border: 1px solid #e5e5e5 !important;
        padding: 10px 10px !important;
    }

    .table td:last-child {
        text-align: center !important;
    }

    .toggle-group .btn {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
        top: -3px;
    }

    .toggle.btn-sm {
        min-width: 40px;
        min-height: 22px;
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

    .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline;
    }

    .btn {
        cursor: pointer;
    }

    .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        opacity: 0;
        cursor: pointer;
    }

    .up-down-btn {
        font-size: 28px;
        background: transparent;
        border: 0;
        padding: 0
    }

    .text-light-red {
        color: #ff7481 !important
    }

    #myTable_length {
        width: 40%;
        float: left;
    }

    #myTable_info {
        margin: 10px 0;
    }

    #myTable_filter label input[type="search"] {
        height: 30px;
        border: 1px solid gray;
        margin-left: 10px;
    }

    .toggle {
        pointer-events: none;
    }

    #ulser_list ul.nav-tabs li a {
        padding: 5px 10px;
    }

    #ulser_list ul.nav-tabs li {
        margin: 0 2px !important;
    }

    #ulser_list .card-body ul.nav.nav-tabs {
        top: 35px;
        z-index: 1;
        left: 19px;
    }

    div.dataTables_wrapper div.dataTables_filter input {
        border: 1px solid #ced4da;
        border-radius: 0;
        height: 33px;
        color: #495057;
    }

    .delete_icon i {
        color: #fff;
        color: red;
    }

    .delete-icon-tol {
        background-color: #cc0000 !important;
        color: #fff;
        border-radius: 100%;
    }

    .sorting:after {
        bottom: 50% !important;
        content: "▲" !important;
        position: absolute;
        right: 10px;
        top: 7px;
        opacity: .125;
    }

    .sorting:before {
        content: "▼" !important;
        position: absolute;
        right: 10px;
        bottom: 7px;
        opacity: .125;
    }

    table.dataTable thead tr th {
        position: relative;
    }

    table.table--light thead th {
        border: 1px solid #0000009e !important;
        background-color: #1A273A;
    }

    .delete_icon .fa-regular.fa-circle-xmark {
        color: gray;
    }

    #ulser_list .tab-pane.active .dataTables_wrapper {

        flex-wrap: wrap;
        justify-content: space-between;
    }

    #ulser_list .tab-pane.active .dataTables_paginate {
        margin: 0;
        white-space: nowrap;
        text-align: right;
        padding-left: 24px;
        margin-right: 7px;
    }

    #ulser_list .tab-pane.active .dataTables_info {
        flex: auto;
        text-align: right;
    }

    #ulser_list .tab-pane.active .dataTables_length {
        flex: 0 0 auto;
    }

    table thead tr th:after {
        top: 11px !important;
    }

    table thead tr th:before {
        bottom: 11px !important;
    }

    #trash_table>tbody>tr>td.delete_icon>a.delte_item>i {
        font-size: 21px;
        vertical-align: middle;
        margin-left: 4px;
        color: red;
        border-radius: 100%;
    }
    

    table ul li {
        list-style: disc;
        font-size: 16px;
    }
   table ul {
    padding-left: 20px;
    }

</style>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $('#publisher_admin').DataTable({
        "pageLength": 100,
        "sDom": 'Lfrtlip',
        language: {
            search: "",
            searchPlaceholder: "Search",
            "lengthMenu": "Show rows  _MENU_"
        }
    });
    $('#campaign_manager_table').DataTable({
        "pageLength": 100,
        "sDom": 'Lfrtlip',
        language: {
            search: "",
            searchPlaceholder: "Search",
            "lengthMenu": "Show rows  _MENU_"
        }
    });
    $('#Campaign_executive_table').DataTable({
        "pageLength": 100,
        "sDom": 'Lfrtlip',
        language: {
            search: "",
            searchPlaceholder: "Search",
            "lengthMenu": "Show rows  _MENU_"
        }
    });
    $('#admin_userss').DataTable({
        "pageLength": 100,
        "sDom": 'Lfrtlip',
        language: {
            search: "",
            searchPlaceholder: "Search",
            "lengthMenu": "Show rows  _MENU_"
        }
    });
    $('#trash_table').DataTable({
        "pageLength": 100,
        "sDom": 'Lfrtlip',
        language: {
            search: "",
            searchPlaceholder: "Search",
            "lengthMenu": "Show rows  _MENU_"
        }
    });
    $('#Pending_Login').DataTable({
        "pageLength": 100,
        "sDom": 'Lfrtlip',
        language: {
            search: "",
            searchPlaceholder: "Search",
            "lengthMenu": "Show rows  _MENU_"
        }
    });
    $('#All_Active').DataTable({
        "pageLength": 100,
        "sDom": 'Lfrtlip',
        language: {
            search: "",
            searchPlaceholder: "Search",
            "lengthMenu": "Show rows  _MENU_"
        }
    });

    $(".delete_icon").find('a:first-child').click(function(e) {
        e.preventDefault();
        var actionUrl = $(this).attr('href');
        $.ajax({
            type: "GET",
            url: actionUrl,
            dataType: 'json',
            success: function(data) {

                if (data.success) {
                    location.reload(true);
                }
            }
        });
    })

    //   $(".delte_item").click(function(e){
    //     e.preventDefault();
    //     var actionUrl=$(this).attr('href');
    //     if(confirm('Are you sure?')){
    //     $.ajax({
    //     type: "GET",
    //     url: actionUrl,
    //     dataType:'json',
    //     success: function(data)
    //     {

    //       if(data.success){
    //         location.reload(true);
    //       }
    //     }
    //         });
    //     }
    //   })
    $(document).ready(function() {

        $('#ulser_list .card-body ul.nav.nav-tabs').addClass("position-absolute")
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        console.log(activeTab);
        if (activeTab) {
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
    });
</script>

@endsection