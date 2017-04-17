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
          <a class="navbar-brand" href="{{route('home')}}">Webshop</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            @foreach((new App\Content)->getMenu() as $menu)
              <li><a href="#">{{$menu['menu']}}</a></li>              
            @endforeach
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          @if(Auth::guest())
            <ul class="nav navbar-nav navbar-right">            
              <li><a href="{{route('getsignin')}}">Sign In</a></li>
              <li class="active"><a href="{{route('getsignup')}}">Sign Up <span class="sr-only">(current)</span></a></li>
            </ul>
          @else
            <ul class="nav navbar-nav navbar-right">            
              <li><a href="#">Account</a></li>
              <li><a href="{{route('getsignout')}}">Sign Out</a></li>
            </ul>
          @endif
        </div><!--/.nav-collapse -->
      </div>
    </nav>