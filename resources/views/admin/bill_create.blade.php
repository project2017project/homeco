@extends('admin.master_layout')
@section('title')
<title>{{__('admin.Create Bill')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.Create Bill')}}</h1>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.bill.index') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('admin.Bills')}}</a>
            <div class="row mt-4">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.bill.store') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="">{{__('admin.Bill')}} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="bill">
                            </div>

                            <button class="btn btn-primary">{{__('admin.Save')}}</button>

                        </form>
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>
@endsection
