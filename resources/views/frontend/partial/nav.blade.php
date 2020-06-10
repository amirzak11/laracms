<!-- Navbar -->
<style>
    #search {
        width: 100%;
        background-color: #eee;
        border: none;
        border-right: none;
        padding:.2em 1em;
    }
    .table-responsive{
        display: none;
        position: absolute;
        z-index: 10;
        border:1px solid #eee;
        box-shadow: 0px 0px 5px #888;
        border-top: none;
    }
    .result{
        text-align: right;
        display: block;
        background-color: #fff;
        padding: 20px;
        margin-top: 20px;
        border-top: 1px solid #ddd;
    }
    .result > div {

        line-height: 3;
        background-color: #eee;
        border-radius: 5px;
        margin: 2px 5px;
        display: inline-block;
        text-align: center;
        padding: 0px 3px;
        color: #555;
    }
    .result > div:hover{
        box-shadow: 0px 0px 5px #555;
    }
    .result > div > a {
        font-size: 12px;
        text-decoration: none;
        display: block;
        padding: 0px;
        color: #555;
    }
    .panel-body{
        width: 300px;
    }
</style>
<div class="navbar-main">
    <div class="nav-menu-left">
        <div class="sub-nav-right">
            <img src="{{asset('image/information/'.$information->logo_name)}}">
            <i class="fa fa-search"></i>
            <div class="panel-body" id="panel-body" onclick="down_search()" >
                <div class="form-group">
                    <input type="text"  name="search" id="search" placeholder="جستجو سریع ...." />

                </div>
                <div class="table-responsive" id="table-responsive" >
                    <div class="result"></div>
                </div>
            </div>

        </div>
        <div class="shoppingCart">
            <a href="{{route('frontend.product.cart_container')}}">
                <i class="fa fa-shopping-cart"></i>
                @if(Session::has('cart'))
                    <span>{{Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                @endif
            </a>
        </div>
        <div class="login-user">
            @if(!\Illuminate\Support\Facades\Auth::check())
                <div class="login-user__one">
                    <a class="user_link" href="{{route('frontend.user.login')}}">
                        ورود به حساب کاربری
                        <i class="fa fa-user"></i>
                    </a>
                </div>
            @else
                <div onclick="down_up()" id="login-user__one" class="login-user__one">
                    <a onclick="down_up()" class="user_link">
                        <i class="fa fa-angle-down"></i><i class="fa fa-user"></i>
                    </a>
                    <div id="profile-dropdown" class="c-header__profile-dropdown">
                        <ul>
                            <li>

                                <div>
                                    <a href="{{route('frontend.profile.view')}}">
                                        <div class="name">{{Auth::user()->name}}</div>
                                        <div class="login_profile">مشاهده حساب کاربری</div>
                                    </a>
                                    <i class="fa fa-user"></i>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <a href="{{route('frontend.product.cart_container')}}">مشاهده سبد خرید</a>

                                </div>
                            </li>
                            <li>
                                <div>
                                    <a href="{{route('frontend.order.view')}}">سفارش های من</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <a href="{{route('frontend.user.logout')}}">خروج از حساب کاربری </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif

        </div>

    </div>
    <div class="nav-menu">
        <nav>
            <ul class="main_menu">
                <div class="menu_link">
                    <li>
                        <a class="main_cat" href="#"><i class="fa fa-bars"></i> دسته بندی کالا ها </a>
                        <ul class="menu">
                            @if(isset($categories))
                                <div>
                                </div>
                                @include('frontend.category.child_category',['items'=>$categories['root']])
                            @else
                                دسته بندی ثبت نشده است
                            @endif
                        </ul>
                    </li>
                </div>

                <div class="menu_link">
                    <li class="link-name">
                        <a href="{{route('frontend.home')}}"> صفحه اصلی </a>
                    </li>
                    <div class="border_b"></div>
                </div>

                <div class="menu_link">
                    <li class="link-name"><a href="{{route('frontend.page.about')}}"> درباره ما</a>
                    </li>
                    <div class="border_b"></div>
                </div>
                <div class="menu_link">

                    <li class="link-name"><a href="{{route('frontend.page.contact')}}"> تماس با ما</a></li>
                    <div class="border_b"></div>
                </div>

                <div class="menu_link">

                    <li class="link-name"><a href="{{route('frontend.page.my_site')}}"> سایت من</a></li>
                    <div class="border_b"></div>
                </div>

                <div class="menu_link">
                    <li class="link-name"><a href="{{route('frontend.page.seller-introduction')}}"> فروشنده شوید</a>
                    </li>
                    <div class="border_b"></div>
                </div>
                <div class="menu_link">
                    <li class="link-name"><a href="#"> تخفیف ها و پیشنهاد ها</a>
                    </li>
                    <div class="border_b"></div>
                </div>
            </ul>
        </nav>
    </div>
</div>

<script>
    $(document).ready(function(){

        fetch_customer_data();

        function fetch_customer_data(query = '')
        {
            $.ajax({
                url:"{{ route('live_search.action') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {

                    $('.result').html(data.table_data);
                    $('#total_records').text(data.total_data);
                }
            })
        }

        $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            fetch_customer_data(query);
        });
    });
</script>
<script  src="{{asset('js/script_liveSearch.js')}}"></script>







