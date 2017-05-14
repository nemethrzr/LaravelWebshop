<footer class="container">
	<hr>
	<div class="row">

		<div class="col-md-3 col-sm-6">
			<h4>@lang('menu.information')</h4>
			<ul>
				<li><a href="two-column.html">@lang('menu.about')</a></li>
				<li><a href="typography.html">@lang('menu.delivery')</a></li>
				<li><a href="typography.html">@lang('menu.privacy')</a></li>
				<li><a href="typography.html">Terms &amp; Conditions</a></li>
			</ul>
		</div>
		<div class="col-md-3 col-sm-6">
			<h4>@lang('menu.service')</h4>
			<ul>
				<li><a href="{{route('getcontact')}}">@lang('menu.contact')</a></li>
				<li><a href="typography.html">@lang('menu.returns')</a></li>
				<li><a href="typography.html">@lang('menu.sitemap')</a></li>
			</ul>
		</div>
		<div class="col-md-3 col-sm-6">
			<h4>@lang('menu.extras')</h4>
			<ul>
				<li><a href="typography.html">@lang('menu.brands')</a></li>
				<li><a href="typography.html">Gift Vouchers</a></li>
				<li><a href="typography.html">Affiliates</a></li>
				<li><a href="typography.html">Specials</a></li>
			</ul>
		</div>
		<div class="col-md-3 col-sm-6">
			<h4>@lang('menu.account')</h4>
			<ul>
				<li><a href="{{route('getaccount')}}">@lang('menu.account')</a></li>
				<li><a href="{{route('getorderall')}}">@lang('menu.order')</a></li>
				<li><a href="typography.html">@lang('menu.wish')</a></li>
				<li><a href="typography.html">Newsletter</a></li>
			</ul>
		</div>

	</div>
</footer>