
	<ul>
	@foreach((new App\Category)->getMenu() as $category)
	
	<li><a href="{{route('getproducts',['category_slug'=>$category['slug']])}}">{{$category['name']}}</a></li>
	
	@endforeach
	</ul>

