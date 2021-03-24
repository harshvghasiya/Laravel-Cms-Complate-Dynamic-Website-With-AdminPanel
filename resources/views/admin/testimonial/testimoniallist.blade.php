@extends('admin.layout')
@section('title','Testimonial List')
@section('container')
<div class="page-content upd_append">
    @if(Session::has('msg'))
    <div class="alert alert-success" role="alert">
        {{session('msg')}} </div>
    @endif
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Manage Testimonials <small>Post List</small></h1>
        </div>
        <!-- END PAGE TITLE -->

    </div>

    <!-- BEGIN PAGE CONTENT-->
    <div class="row ">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Manage Testimonial
                </div>
                <div class="tools">

                    <a href="javascript:;" class="collapse">
                    </a>
                    <a href="#portlet-config" data-toggle="modal" class="config">
                    </a>
                    <a href="javascript:;" class="reload">
                    </a>
                    <a href="javascript:;" class="remove">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <a href="{{route('Testimonial_create')}}" class="btn green">Add Testimonial  &nbsp<i class="fa fa-plus"></i> </a> 
                <button class="btn btn-danger" name="del_all" data-route="{{route('Testimonial_del_all')}}" id="del_all">Delete</button>
                <button class="btn purple" name="status_all" data-route="{{route('Testimonial_status_all')}}" id="status_all">StatusAll</button>
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
                                  Role
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
        <!-- Bootstrap JavaScript -->
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
  
$(document).ready(function() {

    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('Testimonial_datable') !!}',
        columns: [
            { data: 'id', name: 'id',orderable: false,searchable: false  },
            { data: 'name', name: 'name' },
            { data: 'role', name: 'role' },
            { data: 'image', name: 'image',orderable: false,searchable: false  },
            { data: 'created_by', name: 'created_by' },
            { data: 'status', name: 'status'  },
            { data: 'handle', name: 'handle',orderable: false,searchable: false  },

              
        ]
           
    });
});

</script>


@endsection