@extends('admin.layout')
@section('title','banner List')
@section('container')
<div class="page-content upd_append">
    @if(Session::has('msg'))
    <div class="alert alert-success" role="alert">
        {{session('msg')}} </div>
    @endif
   
    <div class="page-head">       
        <div class="page-title">
            <h1>Manage Banners <small>Post List</small></h1>
        </div>
    </div>

    <div class="row ">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Manage Banner
                </div>
                <div class="tools">

                    <a href="javascript:;" class="collapse">
                    </a>
                   
                </div>
            </div>
            <div class="portlet-body">
                <a href="{{route('banner_create')}}" class="btn green">Add Banner  &nbsp<i class="fa fa-plus"></i> </a> 
                <button class="btn btn-danger" name="del_all" data-route="{{route('banner_del_all')}}" id="del_all">Delete</button>
                <button class="btn purple" name="status_all" data-route="{{route('banner_status_all')}}" id="status_all">StatusAll</button>
                <div class="table-scrollable">
                    <table class="table table-hover" id="users-table">
                        <thead>
                            <tr> 
                               
                                <th>
                                   <input type="checkbox" name="checkbox" id="checkAll" value="1">
                                </th>
                                <th>
                                  Name
                                </th>
                                <th>
                                  URL
                                </th>
                                
                                 <th>
                                 Image
                                </th>
                                 <th>
                                 Created By
                                </th>
                                <th>
                                   Status
                                </th>
                                 <th>
                                   Handle
                                </th>
                              
                            </tr>
                        </thead>
                       
                    </table>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->


    </div>


    <!-- END PAGE CONTENT-->
</div>

@endsection
@section('script')

 <script src="http://code.jquery.com/jquery.js"></script>
        <!-- DataTables -->
        <script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        
<script>
  
$(document).ready(function() {

    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('banner_datable') !!}',
        columns: [
            { data: 'id', name: 'id',orderable: false,searchable: false  },
            { data: 'name', name: 'name' },
            { data: 'url', name: 'url' },
            { data: 'image', name: 'image',orderable: false,searchable: false  },
            { data: 'created_by', name: 'created_by'  },
            { data: 'status', name: 'status'  },
            { data: 'handle', name: 'handle',orderable: false,searchable: false  },

              
        ]
           
    });
});

</script>

@endsection