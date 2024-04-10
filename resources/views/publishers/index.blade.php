@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Publishers</div>

                <div class="card-body">
                    <table class="table table-bordered table-striped" id="publishers">
                        <thead>
                            <th>No</th>
                            <th>Name</th>
                            <th>Created Date</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
    $(function () {
          var table = $('#publishers').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('publishers') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'name', name: 'name'},
                  {data: 'created_at', name: 'created_at'},
              ]
          });
        });
</script>
@endpush