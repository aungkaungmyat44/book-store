@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Books</div>

                <div class="card-body">
                    <a href="{{ route('books.create') }}" class="btn btn-primary mb-2">Create</a>
                    <table class="table table-bordered table-striped" id="books">
                        <thead>
                            <th>No</th>
                            <th>Name</th>
                            <th>Content Owner</th>
                            <th>Publisher</th>
                            <th>Created Date</th>
                            <th width="30%">Action</th>
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
    $(document).ready(function() {
        
        $(function () {
            var table = $('#books').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('books.index') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'name', name: 'name'},
                        {data: 'content_owner', name: 'content_owner'},
                        {data: 'publisher', name: 'publisher'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
        });
        @if(Session::has('success'))
            Swal.fire({
                title: "Nice!",
                text: "{{ Session::get('success') }}",
                icon: "success"
            });
        @endif

        @if(Session::has('error'))
            Swal.fire({
                title: "Oops!",
                text: "{{ Session::get('error') }}",
                icon: "error"
            });
        @endif
    });
</script>
@endpush

