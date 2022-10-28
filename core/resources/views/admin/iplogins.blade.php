@extends('admin.layouts.app')

@section('panel')
    <div class="row">

        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">

                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Date')</th>
                                <th scope="col">@lang('Username')</th>
                                <th scope="col">@lang('IP')</th>
                                <th scope="col">@lang('Location')</th>
                                <th scope="col">@lang('Browser')</th>
                                <th scope="col">@lang('OS')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($login_logs as $log)
    
                                <tr>
                                    <td data-label="@lang('Date')">{{ \Carbon\Carbon::parse($log->created_at)->diffForHumans() }}</td>
                                  @if($log->publisher_id==null)
                                  <td data-label="@lang('Username')"><a href="{{ route('admin.advertiser.details', $log->advertiser_id)}}"> {{ ($log->Advertiser) ? $log->Advertiser->username : '' }}</a></td>
                                  @else 
                                  <td data-label="@lang('Username')"><a href="{{ route('admin.publisher.details', $log->publisher_id)}}"> {{ ($log->publisher) ? $log->publisher->username : '' }}</a></td>
                                  @endif

                                    <td data-label="@lang('IP')">
                                        <a href="{{route('admin.users.login.ipHistory',[$log->user_ip])}}">
                                            {{ $log->user_ip }}
                                        </a>
                                    </td>
                                    <td data-label="@lang('Location')">{{ $log->location }}</td>
                                    <td data-label="@lang('Browser')">{{ $log->browser }}</td>
                                    <td data-label="@lang('OS')">{{ $log->os }}</td>
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
                    {{ $login_logs->links('admin.partials.paginate') }}
                </div>
            </div><!-- card end -->
        </div>


    </div>
@endsection
