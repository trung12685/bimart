<div id="sidebarMain" class="d-none">
    <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
        <div class="navbar-vertical-container">
            <div class="navbar-brand-wrapper justify-content-between">
                <!-- Logo -->
                @php($store_logo = \App\Models\BusinessSetting::where(['key' => 'logo'])->first()->value)
                <a class="navbar-brand" href="{{ route('admin.dashboard')}}" aria-label="Front">
                    <img class="navbar-brand-logo initial--36" onerror="this.src='{{ asset('public/assets/admin/img/160x160/img2.jpg')}}'" src="{{ asset('storage/app/public/business/' . $store_logo) }}" alt="Logo">
                    <img class="navbar-brand-logo-mini initial--36" onerror="this.src='{{ asset('public/assets/admin/img/160x160/img2.jpg')}}'" src="{{ asset('storage/app/public/business/' . $store_logo) }}" alt="Logo">
                </a>
                <!-- End Logo -->

                <!-- Navbar Vertical Toggle -->
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                    <i class="tio-clear tio-lg"></i>
                </button>
                <!-- End Navbar Vertical Toggle -->

                <div class="navbar-nav-wrap-content-left">
                    <!-- Navbar Vertical Toggle -->
                    <button type="button" class="js-navbar-vertical-aside-toggle-invoker close">
                        <i class="tio-first-page navbar-vertical-aside-toggle-short-align" data-toggle="tooltip"
                        data-placement="right" title="Collapse"></i>
                        <i class="tio-last-page navbar-vertical-aside-toggle-full-align"
                        data-template='<div class="tooltip d-none d-sm-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'></i>
                    </button>
                    <!-- End Navbar Vertical Toggle -->
                </div>

            </div>

            <!-- Content -->
            <div class="navbar-vertical-content bg--005555" id="navbar-vertical-content">
                <form class="sidebar--search-form">
                    <div class="search--form-group">
                        <button type="button" class="btn"><i class="tio-search"></i></button>
                        <input type="text" class="form-control form--control" placeholder="{{translate('Search Menu...')}}" id="search-sidebar-menu">
                    </div>
                </form>
                <ul class="navbar-nav navbar-nav-lg nav-tabs">
                    <!-- Dashboards -->
                    <li class="navbar-vertical-aside-has-menu {{ Request::is('admin') ? 'show active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.dashboard')}}" title="{{translate('messages.dashboard')}}">
                            <i class="tio-home-vs-1-outlined nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                {{translate('messages.dashboard')}}
                            </span>
                        </a>
                    </li>
                    <!-- End Dashboards -->
                    <!-- Pos -->
                    @if(\App\CentralLogics\Helpers::module_permission_check('pos'))
                    <li class="navbar-vertical-aside-has-menu {{Request::is('admin/pos*')?'active':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link " href="{{route('admin.pos.index')}}" title="{{translate('messages.pos')}}">
                            <i class="tio-shopping-basket-outlined nav-icon"></i>
                            <span class="text-truncate">{{translate('messages.pos')}}</span>
                        </a>
                    </li>
                    @endif
                    <!-- Pos -->

                    <li class="nav-item">
                        <small class="nav-subtitle" title="{{translate('messages.section')}} {{translate('messages.module')}}">{{translate('messages.module_management')}}</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    @if (\App\CentralLogics\Helpers::module_permission_check('zone'))
                    <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/zone*') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.zone.home')}}" title="{{translate('messages.zone_setup')}}">
                            <i class="tio-city nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                {{translate('messages.zone_setup')}} </span>
                        </a>
                    </li>
                    @endif

                    @if (\App\CentralLogics\Helpers::module_permission_check('module'))
                    <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/module') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="{{translate('messages.system_module_setup')}}">
                            <i class="tio-globe nav-icon"></i>
                            <span class="text-truncate">{{translate('messages.system_module_setup')}}</span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display:{{ Request::is('admin/module*') ? 'block' : 'none' }}">
                            <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/module/create') ? 'active' : '' }}">
                                <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.module.create')}}" title="{{translate('messages.add')}} {{translate('messages.module')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        {{translate('messages.add')}} {{translate('messages.module')}}
                                    </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/module') ? 'active' : '' }}">
                                <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.module.index')}}" title="{{translate('messages.modules')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        {{translate('messages.modules')}}
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif

                <!-- Marketing section -->
                <li class="nav-item">
                    <small class="nav-subtitle" title="{{translate('messages.employee_handle')}}">{{translate('Promotions')}}</small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>
                <!-- Campaign -->
                @if (\App\CentralLogics\Helpers::module_permission_check('campaign'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/campaign') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="{{translate('messages.campaigns')}}">
                        <i class="tio-layers-outlined nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{translate('messages.campaigns')}}</span>
                    </a>
                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display:{{ Request::is('admin/campaign*') ? 'block' : 'none' }}">

                        <li class="nav-item {{ Request::is('admin/campaign/basic/*') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.campaign.list', 'basic')}}" title="{{translate('messages.basic_campaigns')}}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{translate('messages.basic_campaigns')}}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/campaign/item/*') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.campaign.list', 'item')}}" title="{{translate('messages.item')}} {{translate('messages.campaigns')}}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{translate('messages.item')}}
                                    {{translate('messages.campaigns')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <!-- End Campaign -->
                <!-- Banner -->
                @if (\App\CentralLogics\Helpers::module_permission_check('banner'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/banner*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.banner.add-new')}}" title="{{translate('messages.banners')}}">
                        <i class="tio-image nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{translate('messages.banners')}}</span>
                    </a>
                </li>
                @endif
                <!-- End Banner -->
                <!-- Coupon -->
                @if (\App\CentralLogics\Helpers::module_permission_check('coupon'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/coupon*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.coupon.add-new')}}" title="{{translate('messages.coupons')}}">
                        <i class="tio-gift nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{translate('messages.coupons')}}</span>
                    </a>
                </li>
                @endif
                <!-- End Coupon -->
                <!-- Notification -->
                @if (\App\CentralLogics\Helpers::module_permission_check('notification'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/notification*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.notification.add-new')}}" title="{{translate('messages.notification')}} {{translate('messages.push')}}">
                        <i class="tio-notifications nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            {{translate('messages.notification')}} {{translate('messages.push')}}
                        </span>
                    </a>
                </li>
                @endif
                <!-- End Notification -->

                <!-- End marketing section -->
                    <!-- Orders -->
                    @if (\App\CentralLogics\Helpers::module_permission_check('order'))
                    <li class="nav-item">
                        <small class="nav-subtitle">{{translate('messages.order')}} {{translate('messages.management')}}</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/order') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="{{translate('messages.orders')}}">
                            <i class="tio-shopping-cart nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                {{translate('messages.orders')}}
                            </span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display:{{ Request::is('admin/order*') ? 'block' : 'none' }}">
                            <li class="nav-item {{ Request::is('admin/order/list/all') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.order.list', ['all']) }}" title="{{translate('messages.all')}} {{translate('messages.orders')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate sidebar--badge-container">
                                        {{translate('messages.all')}}
                                        <span class="badge badge-soft-info badge-pill ml-1">
                                            {{ \App\Models\Order::StoreOrder()->count() }}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/order/list/scheduled') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.order.list', ['scheduled']) }}" title="{{translate('messages.scheduled_orders')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate sidebar--badge-container">
                                        {{translate('messages.scheduled')}}
                                        <span class="badge badge-soft-info badge-pill ml-1">
                                            {{ \App\Models\Order::Scheduled()->StoreOrder()->count() }}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/order/list/pending') ? 'active' : '' }}">
                                <a class="nav-link " href="{{ route('admin.order.list', ['pending']) }}" title="{{translate('messages.orders')}} {{translate('messages.pending')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate sidebar--badge-container">
                                        {{translate('messages.pending')}}
                                        <span class="badge badge-soft-info badge-pill ml-1">
                                            {{ \App\Models\Order::Pending()->OrderScheduledIn(30)->StoreOrder()->count() }}
                                        </span>
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item {{ Request::is('admin/order/list/accepted') ? 'active' : '' }}">
                                <a class="nav-link " href="{{ route('admin.order.list', ['accepted']) }}" title="{{translate('messages.accepted_orders')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate sidebar--badge-container">
                                        {{translate('messages.accepted')}}
                                        <span class="badge badge-soft-success badge-pill ml-1">
                                            {{ \App\Models\Order::AccepteByDeliveryman()->OrderScheduledIn(30)->StoreOrder()->count() }}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/order/list/processing') ? 'active' : '' }}">
                                <a class="nav-link " href="{{ route('admin.order.list', ['processing']) }}" title="{{translate('messages.processing_orders')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate sidebar--badge-container">
                                        {{translate('messages.processing')}}
                                        <span class="badge badge-soft-warning badge-pill ml-1">
                                            {{ \App\Models\Order::Preparing()->OrderScheduledIn(30)->StoreOrder()->count() }}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/order/list/item_on_the_way') ? 'active' : '' }}">
                                <a class="nav-link text-capitalize" href="{{ route('admin.order.list', ['item_on_the_way']) }}" title="{{translate('messages.order_on_the_way')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate sidebar--badge-container">
                                        {{translate('messages.order_on_the_way')}}
                                        <span class="badge badge-soft-warning badge-pill ml-1">
                                            {{ \App\Models\Order::ItemOnTheWay()->OrderScheduledIn(30)->StoreOrder()->count() }}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/order/list/delivered') ? 'active' : '' }}">
                                <a class="nav-link " href="{{ route('admin.order.list', ['delivered']) }}" title="{{translate('messages.delivered_orders')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate sidebar--badge-container">
                                        {{translate('messages.delivered')}}
                                        <span class="badge badge-soft-success badge-pill ml-1">
                                            {{ \App\Models\Order::Delivered()->StoreOrder()->count() }}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/order/list/canceled') ? 'active' : '' }}">
                                <a class="nav-link " href="{{ route('admin.order.list', ['canceled']) }}" title="{{translate('messages.canceled_orders')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate sidebar--badge-container">
                                        {{translate('messages.canceled')}}
                                        <span class="badge badge-soft-warning bg-light badge-pill ml-1">
                                            {{ \App\Models\Order::Canceled()->StoreOrder()->count() }}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/order/list/failed') ? 'active' : '' }}">
                                <a class="nav-link " href="{{ route('admin.order.list', ['failed']) }}" title="{{translate('messages.payment_failed_orders')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate sidebar--badge-container text-capitalize">
                                        {{translate('messages.payment_failed')}}
                                        <span class="badge badge-soft-danger bg-light badge-pill ml-1">
                                            {{ \App\Models\Order::failed()->StoreOrder()->count() }}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/order/list/refunded') ? 'active' : '' }}">
                                <a class="nav-link " href="{{ route('admin.order.list', ['refunded']) }}" title="{{translate('messages.refunded_orders')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate sidebar--badge-container">
                                        {{translate('messages.refunded')}}
                                        <span class="badge badge-soft-danger bg-light badge-pill ml-1">
                                            {{ \App\Models\Order::Refunded()->StoreOrder()->count() }}
                                        </span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Order dispachment -->
                    <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/dispatch/*') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="{{translate('messages.dispatch')}}">
                            <i class="tio-clock nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                {{translate('messages.dispatch')}}
                            </span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="{{ Request::is('admin/dispatch*') ? 'display-block' : 'display-none' }}">
                            <li class="nav-item {{ Request::is('admin/dispatch/list/searching_for_deliverymen') ? 'active' : '' }}">
                                <a class="nav-link " href="{{ route('admin.dispatch.list', ['searching_for_deliverymen']) }}" title="{{translate('messages.unassigned_orders')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate sidebar--badge-container">
                                        {{translate('messages.unassigned_orders')}}
                                        <span class="badge badge-soft-info badge-pill ml-1">
                                            {{ \App\Models\Order::SearchingForDeliveryman()->OrderScheduledIn(30)->StoreOrder()->count() }}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/dispatch/list/on_going') ? 'active' : '' }}">
                                <a class="nav-link " href="{{ route('admin.dispatch.list', ['on_going']) }}" title="{{translate('messages.ongoingOrders')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate sidebar--badge-container">
                                        {{translate('messages.ongoingOrders')}}
                                        <span class="badge badge-soft-light badge-pill ml-1">
                                            {{ \App\Models\Order::Ongoing()->OrderScheduledIn(30)->StoreOrder()->count() }}
                                        </span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Order dispachment End-->
                    @endif
                    <!-- End Orders -->



                    <!-- Parcel Section -->
                    <li class="nav-item">
                        <small class="nav-subtitle" title="{{translate('messages.section')}} {{translate('messages.parcel')}}">{{translate('messages.management')}} {{translate('messages.parcel')}}</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    @if (\App\CentralLogics\Helpers::module_permission_check('parcel'))
                    <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/parcel*') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="{{translate('messages.parcel')}}">
                            <i class="tio-bus nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{translate('messages.parcel')}}</span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display:{{ Request::is('admin/parcel*') ? 'block' : 'none' }}">
                            <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/parcel/category') ? 'active' : '' }}">
                                <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.parcel.category.index')}}" title="{{translate('messages.parcel_category')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        {{translate('messages.parcel_category')}}
                                    </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/parcel/orders*') ? 'active' : '' }}">
                                <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.parcel.orders')}}" title="{{translate('messages.orders')}} {{translate('messages.parcel')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        {{translate('messages.orders')}} {{translate('messages.parcel')}}
                                    </span>
                                </a>
                            </li>

                            <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/parcel/settings') ? 'active' : '' }}">
                                <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.parcel.settings')}}" title="{{translate('messages.settings')}} {{translate('messages.parcel')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        {{translate('messages.settings')}} {{translate('messages.parcel')}}
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <!--End Parcel Section -->

                    <li class="nav-item">
                        <small class="nav-subtitle" title="{{translate('messages.section')}} {{translate('messages.item')}}">{{translate('messages.management')}} {{translate('messages.item')}}</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    <!-- Category -->
                    @if (\App\CentralLogics\Helpers::module_permission_check('category'))
                    <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/category*') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="{{translate('messages.categories')}}">
                            <i class="tio-category nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{translate('messages.categories')}}</span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub"  style="display:{{ Request::is('admin/category*') ? 'block' : 'none' }}">
                            <li class="nav-item {{ Request::is('admin/category/add') ? 'active' : '' }}">
                                <a class="nav-link " href="{{ route('admin.category.add')}}" title="{{translate('messages.category')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{translate('messages.category')}}</span>
                                </a>
                            </li>

                            <li class="nav-item {{ Request::is('admin/category/add-sub-category') ? 'active' : '' }}">
                                <a class="nav-link " href="{{ route('admin.category.add-sub-category')}}" title="{{translate('messages.sub_category')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{translate('messages.sub_category')}}</span>
                                </a>
                            </li>

                            {{-- <li class="nav-item {{Request::is('admin/category/add-sub-sub-category')?'active':''}}">
                            <a class="nav-link " href="{{route('admin.category.add-sub-sub-category')}}" title="add new sub sub category">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">Sub-Sub-Category</span>
                            </a>
                        </li> --}}
                        <li class="nav-item {{ Request::is('admin/category/bulk-import') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.category.bulk-import')}}" title="{{translate('messages.bulk_import')}}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate text-capitalize">{{translate('messages.bulk_import')}}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/category/bulk-export') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.category.bulk-export-index')}}" title="{{translate('messages.bulk_export')}}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate text-capitalize">{{translate('messages.bulk_export')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <!-- End Category -->

                <!-- Attributes -->
                @if (\App\CentralLogics\Helpers::module_permission_check('attribute'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/attribute*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.attribute.add-new')}}" title="{{translate('messages.attributes')}}">
                        <i class="tio-apps nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            {{translate('messages.attributes')}}
                        </span>
                    </a>
                </li>
                @endif
                <!-- End Attributes -->

                <!-- Unit -->
                @if (\App\CentralLogics\Helpers::module_permission_check('unit'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/unit*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.unit.index')}}" title="{{translate('messages.units')}}">
                        <i class="tio-ruler nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate text-capitalize">
                            {{translate('messages.units')}}
                        </span>
                    </a>
                </li>
                @endif
                <!-- End Unit -->

                <!-- AddOn -->
                @if (\App\CentralLogics\Helpers::module_permission_check('addon'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/addon*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="{{translate('messages.addons')}}">
                        <i class="tio-add-circle-outlined nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{translate('messages.addons')}}</span>
                    </a>
                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display:{{ Request::is('admin/addon*') ? 'block' : 'none' }}">
                        <li class="nav-item {{ Request::is('admin/addon/add-new') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.addon.add-new')}}" title="{{translate('messages.addon')}} {{translate('messages.list')}} ">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{translate('messages.list')}}</span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin/addon/bulk-import') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.addon.bulk-import')}}" title="{{translate('messages.bulk_import')}}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate text-capitalize">{{translate('messages.bulk_import')}}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/addon/bulk-export') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.addon.bulk-export-index')}}" title="{{translate('messages.bulk_export')}}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate text-capitalize">{{translate('messages.bulk_export')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <!-- End AddOn -->
                <!-- Food -->
                @if (\App\CentralLogics\Helpers::module_permission_check('item'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/item*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="{{translate('messages.items')}}">
                        <i class="tio-premium-outlined nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate text-capitalize">{{translate('messages.items')}}</span>
                    </a>
                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display:{{ Request::is('admin/item*') ? 'block' : 'none' }}">
                        <li class="nav-item {{ Request::is('admin/item/add-new') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.item.add-new')}}" title="{{translate('messages.add')}} {{translate('messages.new')}}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{translate('messages.add')}}
                                    {{translate('messages.new')}}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/item/list') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.item.list')}}" title="{{translate('messages.list')}} {{translate('messages.item')}}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{translate('messages.list')}}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/item/reviews') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.item.reviews')}}" title="{{translate('messages.list')}} {{translate('messages.review')}}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{translate('messages.review')}}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/item/bulk-import') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.item.bulk-import')}}" title="{{translate('messages.bulk_import')}}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate text-capitalize">{{translate('messages.bulk_import')}}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/item/bulk-export') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.item.bulk-export-index')}}" title="{{translate('messages.bulk_export')}}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate text-capitalize">{{translate('messages.bulk_export')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <!-- End Food -->

                    <!-- Store Store -->
                    <li class="nav-item">
                        <small class="nav-subtitle" title="{{translate('messages.section')}} {{translate('messages.store')}}">{{translate('messages.management')}} {{translate('messages.store')}}</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    @if (\App\CentralLogics\Helpers::module_permission_check('store'))
                    <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/vendor*') && !Request::is('admin/vendor/withdraw_list') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="{{translate('messages.stores')}}">
                            <i class="tio-filter-list nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{translate('messages.stores')}}</span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub"  style="display:{{ Request::is('admin/vendor*') ? 'block' : 'none' }}">
                            <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/vendor/add') ? 'active' : '' }}">
                                <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.vendor.add')}}" title="{{translate('messages.add')}} {{translate('messages.store')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        {{translate('messages.add')}} {{translate('messages.store')}}
                                    </span>
                                </a>
                            </li>

                            <li class="navbar-item {{ Request::is('admin/vendor/list') ? 'active' : '' }}">
                                <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.vendor.list')}}" title="{{translate('messages.list')}} {{translate('messages.stores')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{translate('list')}} {{translate('messages.stores')}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/vendor/bulk-import') ? 'active' : '' }}">
                                <a class="nav-link " href="{{ route('admin.vendor.bulk-import')}}" title="{{translate('messages.bulk_import')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate text-capitalize">{{translate('messages.bulk_import')}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/vendor/bulk-export') ? 'active' : '' }}">
                                <a class="nav-link " href="{{ route('admin.vendor.bulk-export-index')}}" title="{{translate('messages.bulk_export')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate text-capitalize">{{translate('messages.bulk_export')}}</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    @endif
                    <!-- End Store -->
                <!-- DeliveryMan -->
                @if (\App\CentralLogics\Helpers::module_permission_check('deliveryman'))
                <li class="nav-item">
                    <small class="nav-subtitle" title="{{translate('messages.section')}} {{translate('messages.deliveryman')}}">{{translate('messages.deliveryman')}} {{translate('messages.management')}}</small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/delivery-man/add') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.delivery-man.add')}}" title="{{translate('messages.add_delivery_man')}}">
                        <i class="tio-running nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            {{translate('messages.add_delivery_man')}}
                        </span>
                    </a>
                </li>

                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/delivery-man/list') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.delivery-man.list')}}" title="{{translate('messages.list')}} {{translate('messages.deliveryman')}}">
                        <i class="tio-filter-list nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            {{translate('messages.deliveryman_list')}}
                        </span>
                    </a>
                </li>

                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/delivery-man/reviews/list') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.delivery-man.reviews.list')}}" title="{{translate('messages.reviews')}}">
                        <i class="tio-star-outlined nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            {{translate('messages.reviews')}}
                        </span>
                    </a>
                </li>
                @endif
                <!-- End DeliveryMan -->

                <!-- Customer Section -->
                @if (\App\CentralLogics\Helpers::module_permission_check('customerList'))
                <li class="nav-item">
                    <small class="nav-subtitle" title="{{translate('messages.section')}} {{translate('messages.customer')}}">{{translate('messages.customer')}} {{translate('messages.management')}}</small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>
                <!-- Custommer -->

                <li class="navbar-vertical-aside-has-menu {{ (Request::is('admin/customer/list') || Request::is('admin/customer/view*')) ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.customer.list')}}" title="{{translate('messages.customers')}}">
                        <i class="tio-poi-user nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            {{translate('messages.customers')}}
                        </span>
                    </a>
                </li>

                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/customer/wallet*') ? 'active' : '' }}">

                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="{{ __('messages.customer_wallet')}}">
                        <i class="tio-wallet nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate  text-capitalize">
                            {{ __('messages.customer_wallet')}}
                        </span>
                    </a>

                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display:{{ Request::is('admin/customer/wallet*') ? 'block' : 'none' }}">
                        <li class="nav-item {{ Request::is('admin/customer/wallet/add-fund') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.customer.wallet.add-fund')}}" title="{{ __('messages.add_fund')}}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate text-capitalize">{{ __('messages.add_fund')}}</span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin/customer/wallet/report*') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.customer.wallet.report')}}" title="{{ __('messages.report')}}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate text-capitalize">{{ __('messages.report')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/customer/loyalty-point*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link  nav-link-toggle" href="javascript:" title="{{ __('messages.customer_loyalty_point')}}">
                        <i class="tio-medal nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate  text-capitalize">
                            {{ __('messages.customer_loyalty_point')}}
                        </span>
                    </a>

                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display:{{ Request::is('admin/customer/loyalty-point*') ? 'block' : 'none' }}">
                        <li class="nav-item {{ Request::is('admin/customer/loyalty-point/report*') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.customer.loyalty-point.report')}}" title="{{ __('messages.report')}}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate text-capitalize">{{ __('messages.report')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- End Custommer -->
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/customer/subscribed') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.customer.subscribed')}}" title="{{translate('subscribed_emails')}}">
                        <i class="tio-email-outlined nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            {{translate('messages.subscribed_mail_list')}}
                        </span>
                    </a>
                </li>
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/customer/settings') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.customer.settings')}}" title="{{ __('messages.settings')}} {{ __('messages.Customer')}}">
                        <i class="tio-settings nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            {{ __('messages.settings')}} {{ __('messages.Customer')}}
                        </span>
                    </a>
                </li>
                <li
                class="navbar-vertical-aside-has-menu {{ Request::is('admin/message/list') ? 'active' : '' }}">
                <a class="js-navbar-vertical-aside-menu-link nav-link"
                    href="{{ route('admin.message.list')}}"
                    title="{{ __('messages.customer_chat')}}">
                    <i class="tio-chat nav-icon"></i>
                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                        {{ __('messages.Customer')}} {{translate('Chat')}}
                    </span>
                </a>
            </li>
                @endif
                <!-- End customer Section -->

                <!-- Business Section-->
                <li class="nav-item">
                    <small class="nav-subtitle" title="{{translate('messages.business')}} {{translate('messages.section')}}">{{translate('messages.business')}} {{translate('messages.management')}}</small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>

                <!-- withdraw -->
                @if (\App\CentralLogics\Helpers::module_permission_check('withdraw_list'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/vendor/withdraw*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.vendor.withdraw_list')}}" title="{{translate('messages.withdraws')}} {{translate('messages.store')}}">
                        <i class="tio-table nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{translate('messages.store')}} {{translate('messages.withdraws')}}</span>
                    </a>
                </li>
                @endif
                <!-- End withdraw -->
                <!-- account -->
                @if (\App\CentralLogics\Helpers::module_permission_check('account'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/account-transaction*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.account-transaction.index')}}" title="{{translate('messages.collect_cash')}}">
                        <i class="tio-money nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{translate('messages.collect_cash')}}</span>
                    </a>
                </li>
                @endif
                <!-- End account -->

                <!-- provide_dm_earning -->
                @if (\App\CentralLogics\Helpers::module_permission_check('provide_dm_earning'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/provide-deliveryman-earnings*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.provide-deliveryman-earnings.index')}}" title="{{translate('messages.deliverymen_earning_provide')}}">
                        <i class="tio-send nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{translate('messages.deliverymen_earning_provide')}}</span>
                    </a>
                </li>
                @endif
                <!-- End provide_dm_earning -->

                <!-- Business Settings -->
                @if (\App\CentralLogics\Helpers::module_permission_check('settings'))
                <li class="nav-item">
                    <small class="nav-subtitle" title="{{translate('messages.settings')}} {{translate('messages.business')}}">{{translate('messages.settings')}} {{translate('messages.business')}}</small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/business-setup') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.business-settings.business-setup')}}" title="{{translate('messages.setup')}} {{translate('messages.business')}}">
                        <span class="tio-settings nav-icon"></span>
                        <span class="text-truncate">{{translate('messages.setup')}} {{translate('messages.business')}}</span>
                    </a>
                </li>
                <li class="navbar-vertical-aside-has-menu {{Request::is('admin/business-settings/social-media')?'active':''}}">
                    <a class="nav-link " href="{{route('admin.business-settings.social-media.index')}}" title="{{translate('messages.Social Media')}}">
                        <span class="tio-facebook nav-icon"></span>
                        <span class="text-truncate">{{translate('messages.Social Media')}}</span>
                    </a>
                </li>
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/payment-method') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.business-settings.payment-method')}}" title="{{translate('messages.methods')}} {{translate('messages.payment')}}">
                        <span class="tio-atm nav-icon"></span>
                        <span class="text-truncate">{{translate('messages.methods')}} {{translate('messages.payment')}}</span>
                    </a>
                </li>
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/mail-config') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.business-settings.mail-config')}}" title="{{translate('messages.config')}} {{translate('messages.mail')}}">
                        <span class="tio-email nav-icon"></span>
                        <span class="text-truncate">{{translate('messages.config')}} {{translate('messages.mail')}}</span>
                    </a>
                </li>
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/sms-module') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.business-settings.sms-module')}}" title="{{translate('messages.sms_system_module')}}">
                        <span class="tio-message nav-icon"></span>
                        <span class="text-truncate">{{translate('messages.sms_system_module')}}</span>
                    </a>
                </li>

                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/fcm-index') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.business-settings.fcm-index')}}" title="{{translate('messages.notification_settings')}}">
                        <span class="tio-notifications nav-icon"></span>
                        <span class="text-truncate">{{translate('messages.notification_settings')}}</span>
                    </a>
                </li>
                @endif
                <!-- End Business Settings -->

                <!-- web & adpp Settings -->
                @if (\App\CentralLogics\Helpers::module_permission_check('settings'))
                <li class="nav-item">
                    <small class="nav-subtitle" title="{{translate('messages.settings')}} {{translate('messages.business')}}">{{translate('messages.settings')}} {{translate('messages.web_and_app')}}
                        </small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/app-settings*') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.business-settings.app-settings')}}" title="{{translate('messages.app_settings')}}">
                        <span class="tio-android nav-icon"></span>
                        <span class="text-truncate">{{translate('messages.app_settings')}}</span>
                    </a>
                </li>
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/landing-page-settings*') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.business-settings.landing-page-settings', 'index')}}" title="{{translate('messages.landing_page_settings')}}">
                        <span class="tio-website nav-icon"></span>
                        <span class="text-truncate">{{translate('messages.landing_page_settings')}}</span>
                    </a>
                </li>
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/config*') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.business-settings.config-setup')}}" title="{{translate('messages.third_party_apis')}}">
                        <span class="tio-key nav-icon"></span>
                        <span class="text-truncate">{{translate('messages.third_party_apis')}}</span>
                    </a>
                </li>

                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/pages*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="{{translate('messages.setup')}} {{translate('messages.pages')}}">
                        <i class="tio-pages nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{translate('messages.setup')}} {{translate('messages.pages')}}</span>
                    </a>
                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub"  style="display:{{ Request::is('admin/business-settings/pages*') ? 'block' : 'none' }}">

                        <li class="nav-item {{ Request::is('admin/business-settings/pages/terms-and-conditions') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.business-settings.terms-and-conditions')}}" title="{{translate('messages.terms_and_condition')}}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{translate('messages.terms_and_condition')}}</span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin/business-settings/pages/privacy-policy') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.business-settings.privacy-policy')}}" title="{{translate('messages.privacy_policy')}}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{translate('messages.privacy_policy')}}</span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin/business-settings/pages/about-us') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.business-settings.about-us')}}" title="{{translate('messages.about_us')}}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{translate('messages.about_us')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/file-manager*') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.file-manager.index')}}" title="{{translate('messages.gallery')}}">
                        <span class="tio-album nav-icon"></span>
                        <span class="text-truncate text-capitalize">{{translate('messages.gallery')}}</span>
                    </a>
                </li>

                {{-- <li class="navbar-vertical-aside-has-menu {{Request::is('admin/social-login/view')?'active':''}}">
                <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{route('admin.social-login.view')}}">
                    <i class="tio-twitter nav-icon"></i>
                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                        {{translate('messages.social_login')}}
                    </span>
                </a>
                </li> --}}

                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/recaptcha*') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.business-settings.recaptcha_index')}}" title="{{translate('messages.reCaptcha')}}">
                        <span class="tio-top-security-outlined nav-icon"></span>
                        <span class="text-truncate">{{translate('messages.reCaptcha')}}</span>
                    </a>
                </li>

                <li class="navbar-vertical-aside-has-menu {{Request::is('admin/business-settings/db-index')?'active':''}}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{route('admin.business-settings.db-index')}}" title="{{translate('messages.clean_database')}}">
                        <i class="tio-cloud nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            {{translate('messages.clean_database')}}
                        </span>
                    </a>
                </li>
                @endif
                <!-- End web & adpp Settings -->

                <!-- Report -->
                @if (\App\CentralLogics\Helpers::module_permission_check('report'))
                <li class="nav-item">
                    <small class="nav-subtitle" title="{{translate('messages.report_and_analytics')}}">{{translate('messages.report_and_analytics')}}</small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>

                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/report/day-wise-report') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.report.day-wise-report')}}" title="{{translate('messages.day_wise_report')}}">
                        <span class="tio-chart-pie-1 nav-icon"></span>
                        <span class="text-truncate">{{translate('messages.day_wise_report')}}</span>
                    </a>
                </li>

                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/report/item-wise-report') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.report.item-wise-report')}}" title="{{translate('messages.item_wise_report')}}">
                        <span class="tio-chart-bar-1 nav-icon"></span>
                        <span class="text-truncate">{{translate('messages.item_wise_report')}}</span>
                    </a>
                </li>

                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/report/stock-report') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.report.stock-report')}}" title="{{translate('messages.limited_stock_item')}}">
                        <span class="tio-chart-bar-4 nav-icon"></span>
                        <span class="text-truncate text-capitalize">{{translate('messages.limited_stock_item')}}</span>
                    </a>
                </li>
                @endif

                <!-- Employee-->

                <li class="nav-item">
                    <small class="nav-subtitle" title="{{translate('messages.employee_handle')}}">{{translate('messages.employee')}} {{translate('management')}}</small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>

                @if (\App\CentralLogics\Helpers::module_permission_check('custom_role'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/custom-role*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.custom-role.create')}}" title="{{translate('messages.Role')}} {{translate('messages.employee')}}">
                        <i class="tio-incognito nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{translate('messages.Role')}} {{translate('messages.employee')}}</span>
                    </a>
                </li>
                @endif

                @if (\App\CentralLogics\Helpers::module_permission_check('employee'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/employee*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="{{translate('messages.Employee')}}">
                        <i class="tio-user nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{translate('messages.employees')}}</span>
                    </a>
                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub"  style="display:{{ Request::is('admin/employee*') ? 'block' : 'none' }}">
                        <li class="nav-item {{ Request::is('admin/employee/add-new') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.employee.add-new')}}" title="{{translate('messages.add')}} {{translate('messages.Employee')}}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{translate('messages.add')}}
                                    {{translate('messages.new')}}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/employee/list') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.employee.list')}}" title="{{translate('messages.list')}} {{translate('messages.Employee')}}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{translate('messages.list')}}</span>
                            </a>
                        </li>

                    </ul>
                </li>
                @endif
                <!-- End Employee -->


                <li class="nav-item py-5">

                </li>
                </ul>
            </div>
            <!-- End Content -->
        </div>
    </aside>
</div>

<div id="sidebarCompact" class="d-none">

</div>


@push('script_2')
<script>
    $(window).on('load' , function() {
        if($(".navbar-vertical-content li.active").length) {
            $('.navbar-vertical-content').animate({
                scrollTop: $(".navbar-vertical-content li.active").offset().top - 150
            }, 10);
        }
    });

    var $rows = $('#navbar-vertical-content li');
    $('#search-sidebar-menu').keyup(function() {
        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $rows.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
</script>
@endpush
