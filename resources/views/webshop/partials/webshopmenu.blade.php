
	<div class="list-group">
	@foreach(App\Category::orderBy('name','ASC')->get() as $category)
	
	<a class="list-group-item @if(Request::url()==route('getproducts',['category_slug'=>$category['slug']])) active @endif " href="{{route('getproducts',['category_slug'=>$category['slug']])}}">{{$category['name']}}</a>
	
	@endforeach
	</div>

