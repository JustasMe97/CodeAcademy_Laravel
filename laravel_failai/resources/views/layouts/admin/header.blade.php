<header>
    <nav class="blue lighten-1">
        <div class="nav-wrapper">
{{--            <a href="/" class="brand-logo">--}}
{{--                <img src="/img/logo.png" alt="logo" class="logo">--}}
{{--            </a>--}}
{{--            <a href="/login">--}}
{{--                <sl-avatar--}}
{{--                    initials="{{$user??''}}"--}}
{{--                    class="right hide-on-med-and-down"--}}
{{--                    label="User avatar">--}}
{{--                </sl-avatar>--}}
{{--            </a>--}}


            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/">Home</a></li>
                <li><a href="{{route('persons.index')}}">Persons</a></li>
                <li><a href="{{route('users.index')}}">Users</a></li>
                <li><a href="{{route('addresses.index')}}">Addresses</a></li>
                <li><a href="{{route('statuses.index')}}">Statuses</a></li>
                <li><a href="{{route('categories.index')}}">Categories</a></li>
                <li><a href="{{route('products.index')}}">Products</a></li>
                <li><a href="{{route('orders.index')}}">Orders</a></li>
                <li><a href="{{route('paymentTypes.index')}}">Payment types</a></li>
                <li><a href="{{route('profile.edit')}}">{{ __('Profile') }}</a></li>
                <li><form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="btn blue darken-4 mr-1">Logout</button>
                </form></li>
            </ul>

        </div>
    </nav>
</header>
