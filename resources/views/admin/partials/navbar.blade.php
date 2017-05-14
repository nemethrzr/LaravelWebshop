navbar.blade.php<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ route('home') }}">@lang('menu.webshop')</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          <li><a href="{{route('getall_admincontent')}}">Oldalak</a></li>
          <li><a href="{{route('getall_adminproduct')}}">Termékek</a></li>          
          <li><a href="">Megrendelések</a></li>
          
            <li class="dropdown">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('menu.webshop') <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">Termékek</li>
                <li><a href="">Link1</a></li>
                <li><a href="">Link2</a></li>
                <li role="separator" class="divider"></li>                
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
            <ul class="nav navbar-nav navbar-right">            
              


          @if(Auth::guest())
          
              <li class="@if(Request::url()==route('getsignin')) active @endif"><a href="{{route('getsignin')}}">@lang('menu.signin')</a></li>
              <li class="@if(Request::url()==route('getsignup')) active @endif"><a href="{{route('getsignup')}}">@lang('menu.signup')<span class="sr-only">(current)</span></a></li>
            </ul>
          @else
            

              <li><a href="{{route('getaccount')}}">@lang('menu.account')</a></li>
              <li><a href="{{route('getsignout')}}">@lang('menu.signout')</a></li>
            
          @endif
          </ul>
        </div><!--/.nav-collapse -->
        
      </div>
    </nav>