						@if(isset($category))
							<ul>
								@foreach($category as $key => $value)
	                            	<li><a href="{{ url('category/'.strtolower($value['name'])) }}">{{ strtoupper($value['name']) }}</a></li>
	                            @endForeach
	                        </ul>
						@endIf
						