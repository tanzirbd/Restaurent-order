@extends('admin.master')

@section('body_content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Product Information<small>Preview</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">Category</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-9">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Product Add</h3>
                        </div>
                        <div class="box-body">
                            <form class="form-horizontal" action="{{ url('/forms/product/product-add') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="product_name" class="col-sm-4 control-label">Product Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="product_name" name="product_name" class="form-control" placeholder="Please Type Product Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_description" class="col-sm-4 control-label">Product Description</label>
                                    <div class="col-sm-8">
                                        <textarea name="product_description" id="product_description" class="form-control" placeholder="Please Type Product Description" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mainmenu_id" class="col-sm-4 control-label">Choose Product Mainmenu</label>
                                    <div class="col-sm-8">
                                        <select name="mainmenu_id" id="mainmenu_id" class="form-control">
                                            <option>Select Menu Name</option>
                                            @foreach( $publishMainmenus as $publishMainmenu)
                                                <option value="{{$publishMainmenu->id}}">{{$publishMainmenu->mainmenu_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category_id" class="col-sm-4 control-label">Choose Product Category</label>
                                    <div class="col-sm-8">
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option>Select Category Name</option>
                                            @foreach($publishCategories as $publishCategory)
                                                <option value="{{$publishCategory->id}}">{{$publishCategory->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sub_category_id" class="col-sm-4 control-label">Choose Product Sub Category</label>
                                    <div class="col-sm-8">
                                        <select name="sub_category_id" id="sub_category_id" class="form-control">
                                            <option>Select Category Name</option>
                                            @foreach($publishSubCategories as $publishSubCategory)
                                                <option value="{{$publishSubCategory->id}}">{{$publishSubCategory->sub_category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="brand_id" class="col-sm-4 control-label">Choose Product Brand</label>
                                    <div class="col-sm-8">
                                        <select name="brand_id" id="brand_id" class="form-control">
                                            <option>Select Brand Name</option>
                                            @foreach($publishBrands as $publishBrand)
                                                <option value="{{$publishBrand->id}}">{{$publishBrand->brand_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_price" class="col-sm-4 control-label">Product Price</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" onkeyup="myFunction()" id="product_price" name="product_price" placeholder="Please Type Product Price">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_price_off" class="col-sm-4 control-label">Product Price OFF (%)</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" onkeyup="myFunction()" id="product_price_off" name="product_price_off" placeholder="Please Type Product Price">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_new_price" class="col-sm-4 control-label">Product New Price</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" readonly id="product_new_price" name="product_new_price" placeholder="Please Type Product Price">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_quantity" class="col-sm-4 control-label">Product Quantity</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" value="100" id="product_quantity" min="1" name="product_quantity" placeholder="Please Type Product Quantity">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_label" class="col-sm-4 control-label">Product Label</label>
                                    <div class="col-sm-8">
                                        <select name="product_label" id="product_label" class="form-control">
                                            <option value="new">NEW</option>
                                            <option value="hot">HOT</option>
                                            <option value="sale">SALE</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_image" class="col-sm-4 control-label">Product Main Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" id="product_image" class="form-control" name="product_image" accept="images/*">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_sub_image" class="col-sm-4 control-label">Product Sub Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" id="product_sub_image" class="form-control" name="product_sub_image[]" accept="images/*" multiple>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_publish_status" class="col-sm-4 control-label">Product Publish Status</label>
                                    <div class="col-sm-8">
                                        <select name="product_publish_status" id="product_publish_status" class="form-control">
                                            <option value="1">Publish</option>
                                            <option value="2">Unpublish</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="reset" class="btn btn-default">Reset</button>
                                    <button type="submit" name="btn_add_product" class="btn btn-primary pull-right">Add Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Notification</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            @if($messege = Session::get('messege'))
                                <h4 class="text-center text-green">{{ $messege }}</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <script>
        function myFunction() {
            var product_price = document.getElementById("product_price").value;
            var product_price_off = document.getElementById("product_price_off").value;
            var result = (product_price / 100) * product_price_off;
            var product_new_price = product_price - result;
            var product_new_price = Math.round(Number(product_new_price))
            document.getElementById("product_new_price").value = product_new_price;
        }
    </script>

@endsection