@if (isset($namespace))
	@if (session()->has($namespace.'.message'))
	  <div class="alert alert-{{ session($namespace.'.level') }}">
	      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

	      {!! session($namespace.'.message') !!}
	  </div>
	@endif
@elseif (session()->has('flash_notification.message'))
  <div class="alert alert-{{ session('flash_notification.level') }}">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

      {!! session('flash_notification.message') !!}
  </div>
@endif