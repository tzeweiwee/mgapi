<nav class="navbar navbar-inverse">
<div class="container-fluid">
  <div class="navbar-header">
    <a class="navbar-brand" href="#">MGAPI</a>
  </div>
  <ul class="nav navbar-nav">
    <li class="active"><a href="{{ URL::route('adminHome') }}">Home</a></li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">User<span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="{{ URL::route('registerNewUserForm') }}">Register New User</a></li>
        <li><a href="{{ URL::route('removeUserForm') }}">Remove User</a></li>
        <li><a href="{{ URL::route('viewAllUsers') }}">View All User</a></li>
      </ul>
    </li>
    <li><a href="{{ URL::route('showAllWallet') }}">Wallet</a></li>
    <li><a href="{{ URL::route('showCycles') }}">Cycle</a></li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Transaction History<span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="{{ URL::route('showAllTransactionHistory') }}">Show All Transactions</a></li>
        <li><a href="#">Show Transaction</a></li>
      </ul>
    </li>
    <ul class="nav navbar-nav navbar-right">
    <!-- Authentication Links -->
    @if (Auth::guest())
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
    @endif
  </ul>
</div>
</nav>