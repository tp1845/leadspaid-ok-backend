@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    LGen Spend Upload Page
                </div>
            </div><!-- card end -->
            <div class="card-footer py-4"> </div>
        </div>
    </div>

@endsection
@push('breadcrumb-plugins')
<form >
    <div class="form-row">
      <input type="file" class="form-control-file" name="file" required style="width: 150px; display:inline-block" required>
      <button type="button" class="btn btn-success">Upload</button>
    </div>
</form>
@endpush
@push('style')

@endpush
@push('script')

@endpush
