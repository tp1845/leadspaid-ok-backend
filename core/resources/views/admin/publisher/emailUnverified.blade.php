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
                                <th scope="col">@lang('Name')</th>
                                <th scope="col">@lang('Email')</th>
                                <th scope="col">@lang('Username')</th>
                                <th scope="col">@lang('Phone')</th>
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($publishers as $publisher)
                            <tr>
                                <td data-label="@lang('Name')" class="text--primary">{{ $publisher->name }}</td>
                                <td data-label="@lang('Email')">{{ $publisher->email }}</td>
                                <td data-label="@lang('Username')">{{ $publisher->username }}</td>
                                <td data-label="@lang('Phone')">{{ $publisher->phone }}</td>
                                <td data-label="@lang('Status')"><span class="text--small badge font-weight-normal {{ $publisher->status==1?'badge--success':'badge--warning' }} ">{{ $publisher->status==1?'Active':'Banned' }}</span></td>
                                <td data-label="@lang('Actions')">
                                   
                                    <a href="{{ route('admin.publisher.details',['id'=>$publisher->id]) }}" class="icon-btn" data-toggle="tooltip" title="" data-original-title="Details">
                                        <i class="las la-desktop text--shadow"></i>                 
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
                <div class="card-footer py-4">
                    {{$publishers->links('admin.partials.paginate')}}
                </div>
            </div><!-- card end -->
        </div>


    </div>
@endsection

