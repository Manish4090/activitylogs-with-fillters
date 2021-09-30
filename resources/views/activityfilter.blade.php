
			@forelse($getdata as $allActivitylogs)
			<?php
				$getActionAttr = json_decode($allActivitylogs->properties, true);
			?>
				
					<td>{{ @$getActionAttr['old']['name']  }} {{ @$getActionAttr['old']['email']  }}</td>
					<td>{{ @$getActionAttr['attributes']['name']  }} {{ @$getActionAttr['attributes']['email']  }}</td>
					<td>{{ @$allActivitylogs->description}}</td>
					<td>{{ Helpers::userDetails(@$allActivitylogs->subject_id)}}</td>
				
			@empty
			<td>No Records Found!!</td>
			@endforelse
	