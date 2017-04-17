
	<ul>
	@foreach((new App\Category)->getMenu() as $category)
	
	<li><a href="#">{{$category['name']}}</a></li>
	
	@endforeach
	</ul>

