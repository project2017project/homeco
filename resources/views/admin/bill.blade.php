@extends('admin.master_layout')
@section('title')
<title>{{__('admin.Bills')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.Bills')}}</h1>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.bill.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{__('admin.Add New')}}</a>
            <div class="row mt-4">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive table-invoice">
                        <table class="table table-striped" id="dataTable">
                            <thead>
                                <tr>
                                    <th >{{__('admin.SN')}}</th>
                                    <th >{{__('admin.Aminity')}}</th>
                                    <th >{{__('admin.Icon')}}</th>
                                    <th >{{__('admin.Action')}}</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @foreach ($bills as $index => $bill)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $bill->bill }}</td>
                                        <td><img src="{{ asset($bill->item1_icon) }}" style="height:32px;width:32px;"/></td>
                                        <td>

                                        <a href="{{ route('admin.bill.edit',$bill->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>

                                        <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" onclick="deleteData({{ $bill->id }})"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
        $("#deleteForm").attr("action",'{{ url("admin/bill/") }}'+"/"+id)
    }
</script>
@endsection
