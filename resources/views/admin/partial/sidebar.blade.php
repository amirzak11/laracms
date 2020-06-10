<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light"><i class="fa fa-user-circle-o"></i> پنل مدیریت </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-header">کاربران</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-user-circle"></i>
                            <p>
                                مدریت کاربران
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.user.list')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست کاربران</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.user.create')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ثبت کاربر جدید</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-header">سفارشات</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-user-circle"></i>
                            <p>
                                مدریت سفارشات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.order.list')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست سفارشات</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">محصولات</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-arrow-circle-left"></i>
                            <p>
                                مدریت دسته بندی
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.categories.list')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست دسته بندی</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.categories.create')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ثبت دسته بندی جدید</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-braille"></i>
                            <p>
                                مدریت برندها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.brands.list')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست برندها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.brands.create')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ثبت برند جدید</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-shopping-basket"></i>
                            <p>
                                مدریت محصولات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.product.list')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست محصولات</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.product.create_product')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ثبت محصول جدید</p>
                                </a>
                            </li>
                        </ul>
                    </li>



                    <li class="nav-header">مقاله</li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-sliders"></i>
                            <p>
                                مدریت مقالات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.article.list')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست مقالات</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.article.create')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ثبت مقاله جدید</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{----}}


                    <li class="nav-header">نمایش</li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-sliders"></i>
                            <p>
                                مدریت اسلاید شو
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.slideshow.list')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست اسلایدها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.slideshow.create')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ثبت اسلاید جدید</p>
                                </a>
                            </li>
                        </ul>
                    </li>













                    {{----}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-sliders"></i>
                            <p>
                                مدریت اسلایدشو فروشگاه
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.slideshop.list')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست اسلایدها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.slideshop.create')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ثبت اسلاید جدید</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">پرداخت</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-cc-paypal"></i>
                            <p>
                                مدریت پرداخت ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.payment.list')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست پرداخت ها</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">سایت</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-image"></i>
                            <p>
                                بنر ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.banner.create')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد بنر</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-meanpath"></i>
                            <p>
                                مدریت سایت
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.info.edit')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ثبت اطلاعات سایت</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-map-signs"></i>
                            <p>
                                آدرس ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.provinces.list')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست آدرس ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.provinces.create')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ثبت آدرس جدید</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
