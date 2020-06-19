<nav class="navbar navbar-right navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href=" {{ route('product.index') }}">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link" href="{{ route('product.shoppingcart')}}">  Shopping  Cart  <span class="badge badge-secondary">

 total : {{  Session::has('Cart') ? Session()->get('Cart')->totalQty : ''}}
         </span> <i class="fa fa-cart-plus" aria-hidden="true"></i> </a>


      </li>



      <li class="nav-item dropdown">

        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          User Management <i class="fa fa-user" aria-hidden="true"></i>

        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          @if(Auth::check())
  <a class="dropdown-item" href="{{ route('user.profile')}}"> {{ Auth()->user()->email }}</a>
                  <a class="dropdown-item" href="{{ route('user.profile')}}">Profile Account</a>
                  <a class="dropdown-item" href="{{ route('user.logout')}}">Log Out</a>

          @else
          <a class="dropdown-item" href="{{ route('user.signup')}}">sign Up</a>
                <a class="dropdown-item" href="{{ route('user.signin')}}">sign In</a>
          @endif





        </div>
      </li>
    </ul>

  </div>
</nav>
