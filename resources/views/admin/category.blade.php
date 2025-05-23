@extends('admin.master_layout')
@section('title')
<title>{{__('admin.Property Type')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.Property Type')}}</h1>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{__('admin.Add New')}}</a>
            <div class="row mt-4">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive table-invoice">
                        <table class="table table-striped" id="dataTable">
                            <thead>
                                <tr>
                                    <th>{{__('admin.SN')}}</th>
                                    <th>{{__('admin.Name')}}</th>
                                    <th>{{__('admin.Icon')}}</th>
                                    <th>{{__('admin.Status')}}</th>
                                    <th>{{__('admin.Action')}}</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index => $category)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $category->name }}</td>

                                        <td>
                                            <img src="{{ asset($category->icon) }}" class="w_80" alt="">
                                        </td>
                                        <td>
                                            @if($category->status == 1)
                                            <a href="javascript:;" onclick="changeProductCategoryStatus({{ $category->id }})">
                                                <input id="status_toggle" type="checkbox" checked data-toggle="toggle" data-on="{{__('admin.Active')}}" data-off="{{__('admin.Inactive')}}" data-onstyle="success" data-offstyle="danger">
                                            </a>

                                            @else
                                            <a href="javascript:;" onclick="changeProductCategoryStatus({{ $category->id }})">
                                                <input id="status_toggle" type="checkbox" data-toggle="toggle" data-on="{{__('admin.Active')}}" data-off="{{__('admin.Inactive')}}" data-onstyle="success" data-offstyle="danger">
                                            </a>

                                            @endif
                                        </td>
                                        <td>
                                        <a href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>

                                        <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" onclick="deleteData({{ $category->id }})"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>

                                    </tr>
                                  @endforeach
                            </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>



<script>
    function deleteData(id){
        $("#deleteForm").attr("action",'{{ url("admin/category/") }}'+"/"+id)
    }
    function changeProductCategoryStatus(id){
        var isDemo = "{{ env('APP_MODE') }}"
        if(isDemo == 'DEMO'){
            toastr.error('This Is Demo Version. You Can Not Change Anything');
            return;
        }
        $.ajax({
            type:"put",
            data: { _token : '{{ csrf_token() }}' },
            url:"{{url('/admin/category-status/')}}"+"/"+id,
            success:function(response){
                toastr.success(response)
            },
            error:function(err){


            }
        })
    }
</script>
@endsection
