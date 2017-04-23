<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ route('home') }}">Webshop</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            @foreach((new App\Content)->getMenu() as $menu)
              <li @if(Request::url()==route('getcontent',['content_slug'=>$menu['slug']])) class="active" @endif ><a href="{{ route('getcontent',['content_slug'=>$menu['slug']]) }}">{{$menu['menu']}}</a></li>              
            @endforeach
            <li class="dropdown">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Webshop <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">Termékek</li>
                @foreach(App\Category::orderBy('name','ASC')->get() as $category)
                  <li @if(Request::url()==route('getproducts',['category_slug'=>$category['slug']])) class="active" @endif><a href="{{route('getproducts',['category_slug'=>$category['slug']])}}">{{$category['name']}}</a></li>                  
                @endforeach
                <li role="separator" class="divider"></li>                
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
            <ul class="nav navbar-nav navbar-right">            
              <li class="@if(Request::url()==route('getcart')) active @endif ">
              <a href="{{route('getcart')}}">Cart(<span id="cartbadge">{{Session::has('cart') ? Session::get('cart')->totalQty : 0}}</span>)</a>
              </li>  


          @if(Auth::guest())
          
              <li class="@if(Request::url()==route('getsignin')) active @endif"><a href="{{route('getsignin')}}">Sign In</a></li>
              <li class="@if(Request::url()==route('getsignup')) active @endif"><a href="{{route('getsignup')}}">Sign Up <span class="sr-only">(current)</span></a></li>
            </ul>
          @else
            

              <li><a href="{{route('getaccount')}}">Account</a></li>
              <li><a href="{{route('getsignout')}}">Sign Out</a></li>
            
          @endif
          </ul>
        </div><!--/.nav-collapse -->
        
      </div>
    </nav>