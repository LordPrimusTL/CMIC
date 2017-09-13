<nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{asset('images/profile/' . Auth::user()->image )}}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h4">{{Auth::user()->firstname . ' ' .Auth::user()->lastname}}</h1>
            <p>CMIC Admin</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="{{Request::is('admin/dashboard')? "active" : " "}}"> <a href="{{route('admin_dash')}}"><i class="fa fa-user"></i>&nbsp;Users</a></li>
        <li class="{{Request::is('admin/mail') || Request::is('admin/email') ? "active" : " "}}"> <a href="{{route('mail')}}"><i class="fa fa-mail-forward"></i>&nbsp;Send Mail</a></li>
        <li class="{{Request::is('admin/administrators')? "active" : " "}}"> <a href="{{route('admin_admin')}}"><i class="fa fa-user-secret"></i>&nbsp;Administrators</a></li>
        <li class="{{Request::is('admin/news') ? "active" : ""}}"><a href="{{route('admin_news')}}"><i class="fa fa-info"></i>&nbsp;News</a></li>
        <li class="{{Request::is('admin/investments') ||Request::is('admin/investment/add') ? "active" : ""}}"><a href="{{route('admin_inv')}}"><i class="fa fa-money"></i>&nbsp;Investments</a></li>
        <li class="{{Request::is('admin/investors') ? "active" : ""}}"><a href="{{route('admin_invs')}}"><i class="fa fa-support"></i>&nbsp;Investors</a></li>
        <li class="{{Request::is('admin/awards') ? "active" : ""}}"><a href="{{route('admin_awards')}}"><i class="fa fa-user-secret"></i>&nbsp;Awards</a></li>
        <li class="{{Request::is('admin/deals')  ? "active" : ""}}"><a href="{{route('admin_deals')}}"><i class="fa fa-hand-lizard-o"></i>&nbsp;Deals</a></li>
        <li class="{{Request::is('admin/deals/applicant')  ? "active" : ""}}"><a href="{{route('admin_deals_app')}}"><i class="fa fa-user-plus"></i>&nbsp;Deals Applicant</a></li>
        <li class="{{Request::is('admin/transactions')  ? "active" : ""}}"><a href="{{route('admin_trans')}}"><i class="fa fa-credit-card"></i>&nbsp;Transactions</a></li>
        <li class="{{Request::is('admin/earnings') ? "active" : ""}}"><a href="{{route('admin_earn')}}"><i class="fa fa-credit-card-alt"></i>&nbsp;Earnings</a></li>
        <li class="{{Request::is('admin/market') ? "active" : ""}}"><a href="{{route('admin_market')}}"><i class="fa fa-product-hunt"></i>&nbsp;Market</a></li>
        <li class="{{Request::is('admin/categories') ? "active" : ""}}"><a href="{{route('admin_cat')}}"><i class="fa fa-file"></i>&nbsp;Category</a></li>
        <li class="{{Request::is('admin/errors') ||Request::is('admin/errors/add') ? "active" :" "}}" @if(count(\App\ErrorLog::where(['solved' => false])->get()) > 0) style="background-color: red; color: white;"@endif><a href="{{route('admin_errors')}}"><i class="fa fa-bitcoin"></i>&nbsp;Errors</a></li>
    </ul>
</nav>