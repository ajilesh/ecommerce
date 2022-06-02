
    @extends('layout.admin.app')
    @section('content')
<div class="container">
  
    <table class="table table-bordered data-table" >
        <thead>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   @endsection

   @push('producttable')
<script type="text/javascript">
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        order:[[ 2, "asc" ]],
        ajax: "{{ route('admin.products.index') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            {data:'image',name:'image',
                render:function(data){
                   var explode = data.split('|');
                  // return split[0];
                  return '<img src="http://localhost/ecommerce/public/primages/'+explode[0]+'" border="0" width="60" class="img-rounded" align="center" />';
                }
            },
            {data: 'name', name: 'name'},
            {data: 'description', name: 'description'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
 });
</script>
@endpush
{{-- </html> --}}