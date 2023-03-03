<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <div class="left-side-logo d-block d-lg-none">
        <div class="text-center">
            <a href="javascript:void(0)" class="logo"><img src="{{ asset('admin/images/logo.png') }}" alt="logo"></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('home') }}" class="waves-effect">
                        <i class="mdi mdi-desktop-mac"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories.index') }}" class="waves-effect">
                        <i class="mdi mdi-cube-outline"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <!--<li>
                    <a href="{{ route('categories.create') }}" class="waves-effect">
                        <i class="dripicons-document-new"></i>
                        <span>Add New Category</span>
                    </a>
                </li>-->    

                <li>
                    <a href="{{ route('subcategories.index') }}" class="waves-effect">
                        <i class="mdi mdi-cube-send"></i>
                        <span>Sub Categories</span>
                    </a>
                </li>
                <!--<li>
                    <a href="{{ route('subcategories.create') }}" class="waves-effect">
                        <i class="dripicons-document-new"></i>
                        <span>Add New Sub Category</span>
                    </a>
                </li>--> 

                <li>
                    <a href="{{ route('products.index') }}" class="waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Products</span>
                    </a>
                </li>
                <!--<li>
                    <a href="{{ route('products.create') }}" class="waves-effect">
                        <i class="dripicons-document-new"></i>
                        <span>Add New Product</span>
                    </a>
                </li>-->

                <li>
                    <a href="{{ route('orders.index') }}" class="waves-effect">
                        <i class="mdi mdi-briefcase-check"></i>
                        <span>Orders</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('home.users') }}" class="waves-effect">
                        <i class="mdi mdi-account-box"></i>
                        <span>User</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('gallary.index') }}" class="waves-effect">
                        <i class="mdi mdi-image"></i>
                        <span>Gallery</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('slider.index') }}" class="waves-effect">
                        <i class="mdi mdi-box-shadow"></i>
                        <span>Home Slider</span>
                    </a>
                </li>
                <!--<li>
                    <a href="{{ route('slider.create') }}" class="waves-effect">
                        <i class="dripicons-document-new"></i>
                        <span>Add New Slide</span>
                    </a>
                </li>-->

                <li>
                    <a href="{{ route('inquiry.inquireylist') }}" class="waves-effect">
                        <i class="mdi mdi-email-variant"></i>
                        <span>Inquires</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('notification.list') }}" class="waves-effect">
                        <i class="mdi mdi-bell-outline noti-icon"></i>
                        <span>Notifications</span>
                    </a>
                </li>

                @can('role-list')
                <li>
                    <a href="{{ route('roles.index') }}" class="waves-effect">
                        <i class="dripicons-user-group"></i>
                        <span>Manage Roles</span>
                    </a>
                </li>
                @endcan
                @can('backend-user-list')
                <li>
                    <a href="{{ route('users.index') }}" class="waves-effect">
                        <i class="dripicons-user"></i>
                        <span>Manage Backend Users</span>
                    </a>
                </li>
                @endcan
                
                

                {{--<li>
                    <a href="{{ route('applied-user.index') }}" class="waves-effect">
                        <i class="dripicons-user"></i>
                        <span>Manage Applied User</span>
                    </a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cog"></i> <span> System settings </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>

                    <ul class="list-unstyled">
                        <li class="nav-item">
                            <a href="{{ route('admin.locale.index')}}" class="waves-effect {!! classActiveSegment(2,'locale') !!}">
                                <i class="fa fa-language"></i>
                                <span>Locales</span>
                            </a>
                        </li>
                    </ul>

                    <ul class="list-unstyled">
                        <li class="nav-item">
                            <a href="{{ route('admin.currency.index')}}" class="waves-effect {!! classActiveSegment(2,'currency') !!}">
                                <i class="fa fa-money"></i>
                                <span>Currencies</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-briefcase"></i> <span> General settings </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>

                    <ul class="list-unstyled">

                        <li class="nav-item">
                            <a href="{{ route('admin.language.index')}}" class="waves-effect {!! classActiveSegment(2,'language') !!}">
                                <i class="fa fa-language"></i>
                                <span>Languages</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.country.index') }}" class="waves-effect  {!! classActiveSegment(2,'country') !!}">
                                <i class="ion-ios7-world"></i>
                                <span>Countries</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.state.index')}}" class="waves-effect {!! classActiveSegment(2,'state') !!}">
                                <i class="fa fa-building"></i>
                                <span>Regions/States</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.city.index')}}" class="waves-effect {!! classActiveSegment(2,'city') !!}">
                                <i class="dripicons-location"></i>
                                <span>Cities</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.education.index')}}" class="waves-effect {!! classActiveSegment(2,'education') !!}">
                                <i class="fa fa-graduation-cap"></i>
                                <span>Education Levels</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.study.area.index')}}" class="waves-effect {!! classActiveSegment(2,'study.area') !!}">
                                <i class="fa fa-graduation-cap"></i>
                                <span>Study Areas</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.institution.type.index')}}" class="waves-effect {!! classActiveSegment(2,'institution.type') !!}">
                                <i class="fa fa-university"></i>
                                <span>Institution Types</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.study.type.index')}}" class="waves-effect {!! classActiveSegment(2,'study.type') !!}">
                                <i class="fa fa-graduation-cap"></i>
                                <span>Study Types</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.bonus.index')}}" class="waves-effect {!! classActiveSegment(2,'bonus') !!}">
                                <i class="fa fa-gift"></i>
                                <span>Bonuses</span>
                            </a>
                        </li>

                    </ul>
                </li>--}}


            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
