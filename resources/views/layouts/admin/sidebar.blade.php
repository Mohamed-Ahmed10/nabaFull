<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <!-- <li class="sidebar-search"> -->
                <!-- <div class="input-group custom-search-form"> -->
                    <!-- <input type="text" class="form-control" placeholder="Search..."> -->
                    <!-- <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span> -->
                <!-- </div> -->
                <!-- /input-group -->
            <!-- </li> -->
            <li>
                <a href="{{route('admin/index')}}" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Admins<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admins/index')}}">Admins</a>
                    </li>
                    <li>
                        <a href="{{route('admins/create')}}">Add Admin</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Sliders<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin/sliders/index')}}">Sliders</a>
                    </li>
                    <li>
                        <a href="{{route('admin/sliders/create')}}">Add Slider</a>
                    </li>
                </ul>
            </li>
            <!-- <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Categories<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin/categories/index')}}">Categories</a>
                    </li>
                    <li>
                        <a href="{{route('admin/categories/create')}}">Add Category</a>
                    </li>
                </ul>
            </li> -->
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Products<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin/products/index')}}">Products</a>
                    </li>
                    <li>
                        <a href="{{route('admin/products/create')}}">Add Product</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Articles<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin/articles/index')}}">Articles</a>
                    </li>
                    <li>
                        <a href="{{route('admin/articles/create')}}">Add Article</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Webinars<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin/webinars/index')}}">Webinars</a>
                    </li>
                    <li>
                        <a href="{{route('admin/webinars/create')}}">Add Webinar</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Services<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin/services/index')}}">Services</a>
                    </li>
                    <li>
                        <a href="{{route('admin/services/create')}}">Add Service</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Trainings<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin/trainings/index')}}">Trainings</a>
                    </li>
                    <li>
                        <a href="{{route('admin/trainings/create')}}">Add Training</a>
                    </li>
                </ul>
            </li>
            <!-- <li>
                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Second Level Item</a>
                    </li>
                    <li>
                        <a href="#">Second Level Item</a>
                    </li>
                    <li>
                        <a href="#">Third Level <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li> -->
        </ul>
    </div>
</div>