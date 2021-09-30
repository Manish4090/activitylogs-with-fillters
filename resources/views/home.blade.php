@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
				
            </div>
        </div>
    </div>
	<div class="filters">
	<div class="col-md-4">
			<select name="filter_role" id="filter_role" class="form-control">
				<option value="">Select Role</option>
				@forelse($allActivitysDatas as $allActivitylogs)
				<option value="{{ @$allActivitylogs->description}}">{{ @$allActivitylogs->description}}</option>
				@empty
				<option value="">No Records</option>
				@endforelse
			</select>
	</div>
	<div class="col-md-4">
			<select name="filter_name" id="filter_name" class="form-control" required>
				<option value="">Select Name</option>
				@forelse($allActivitys as $allActivitylogs)
				<option value="{{ @$allActivitylogs->subject_id}}">{{ Helpers::userDetails(@$allActivitylogs->subject_id) }}</option>
				@empty
				<option value="">No Records</option>
				@endforelse
			</select>
	</div>
	<div class="col-md-4">
		<button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>
	</div>
	</div>
	<div class="activitysfilters">
		<table class="table table-borderless" id="table1">
			<thead>
				<tr>
					<th>{{ trans('Previously Exist') }}</th>                    
					<th>{{ trans('New Update') }}</th>
					<th>{{ trans('Role Type') }}</th>
					<th>{{ trans('Name') }}</th>
				</tr>
			</thead>
			<tbody id="aaaaaaa">
			@forelse($allActivitys as $allActivitylogs)
			<?php
				$getActionAttr = json_decode($allActivitylogs->properties, true);
			?>
				<tr>
					<td>{{ @$getActionAttr['old']['name']  }} {{ @$getActionAttr['old']['email']  }}</td>
					<td>{{ @$getActionAttr['attributes']['name']  }} {{ @$getActionAttr['attributes']['email']  }}</td>
					<td>{{ @$allActivitylogs->description}}</td>
					<td>{{ Helpers::userDetails(@$allActivitylogs->subject_id)}}</td>
				</tr>
			@empty
			<td>No Records Found!!</td>
			@endforelse
				</tbody>
		</table>
		
	
</div>
</div>
	<script src="//code.jquery.com/jquery-1.12.3.js"></script>
	<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script	src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<script	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#table1').DataTable();
} );
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#filter').click(function(){
        var filter_role = $('#filter_role').val();
        var filter_name = $('#filter_name').val();
		console.log(filter_role,filter_name);

        if(filter_role != '' &&  filter_name != '')
        {
             $.ajax({
                    url: "{{route('getactivitylogs')}}",                    
                    type: 'post',
                    data:{filter_role:filter_role, filter_name:filter_name},
                    success: function(response){   
						console.log(response);
						$('#aaaaaaa').html(response);
                       
                    },
                });
        }
        else
        {
            alert('Select Both filter option');
        }
    });

  </script>
@endsection
