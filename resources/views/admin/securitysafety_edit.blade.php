@extends('admin.master_layout')
@section('title')
<title>{{__('admin.Edit Securitysafety')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.Edit Securitysafety')}}</h1>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.securitysafety.index') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('admin.Securitysafeties')}}</a>
            <div class="row mt-4">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.securitysafety.update', $securitysafety->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="">{{__('admin.Securitysafety')}} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="securitysafety" value="{{ $securitysafety->securitysafety }}">
                            </div>

                             <div class="form-group">
                                <label for="">{{__('admin.Item one icon')}}</label>

                                <div>
                                    <img src="{{ asset($securitysafety->item1_icon) }}" alt="" class="w_80">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">{{__('admin.New icon')}}</label>
                                <input type="file" class="form-control-file" name="item1_icon">
                            </div>

                            <button class="btn btn-primary">{{__('admin.Update')}}</button>

                        </form>
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>
@endsection
