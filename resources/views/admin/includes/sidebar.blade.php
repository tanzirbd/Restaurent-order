<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('/admin')}}/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview menu-open">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                    <li><a href="{{ url('/homeV2') }}"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Forms</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('forms/mainmenu') }}"><i class="fa fa-circle-o"></i> Main Menu</a></li>
                    <li><a href="{{ url('forms/category') }}"><i class="fa fa-circle-o"></i> Category</a></li>
                    <li><a href="{{ url('forms/sub-category') }}"><i class="fa fa-circle-o"></i> Sub Category</a></li>
                    <li><a href="{{ url('forms/brand') }}"><i class="fa fa-circle-o"></i> Brand</a></li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Product</span>
                            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('forms/product') }}"><i class="fa fa-circle-o text-red"></i> Product Add</a></li>
                            <li><a href="{{ url('forms/product/product-manage') }}"><i class="fa fa-circle-o text-red"></i> Product Manage</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="{{ url('/reservation-details') }}"><i class="fa fa-star"></i> <span>Reservation</span></a></li>
            <li><a href="{{ url('/order-details') }}"><i class="fa fa-star"></i> <span>Order Details</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>