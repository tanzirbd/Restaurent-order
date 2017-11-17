@extends('admin.master')

@section('body_content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Category Information<small>Preview</small></h1>
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
                            <h3 class="box-title">Category Add</h3>
                        </div>
                        <div class="box-body">
                            <form class="form-horizontal" action="{{ url('/forms/category/category-add') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="category_name" class="col-sm-4 control-label">Category Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Please Type Category Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category_description" class="col-sm-4 control-label">Category Description</label>
                                    <div class="col-sm-8">
                                        <textarea name="category_description" id="category_description" class="form-control" placeholder="Please Type Category Description" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mainmenu_id" class="col-sm-4 control-label">Choose Mainmenu</label>
                                    <div class="col-sm-8">
                                        <select name="mainmenu_id" id="mainmenu_id" class="form-control">
                                            <option>Select Mainmenu</option>
                                            @foreach($publishMainmenus as $publishMainmenu)
                                            <option value="{{ $publishMainmenu->id }}">{{ $publishMainmenu->mainmenu_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category_publish_status" class="col-sm-4 control-label">Category Publish Status</label>
                                    <div class="col-sm-8">
                                        <select name="category_publish_status" id="category_publish_status" class="form-control">
                                            <option value="1">Publish</option>
                                            <option value="2">Unpublish</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="reset" class="btn btn-default">Reset</button>
                                    <button type="submit" name="btn_add_category" class="btn btn-primary pull-right">Add Category</button>
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
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Category Preview</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th>SL</th>
                                        <th>Category Name</th>
                                        <th>Category Description</th>
                                        <th>Mainmenu Name</th>
                                        <th>Publish Status</th>
                                        <th>Create Date</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php $i=1; ?>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->category_description }}</td>
                                        <td>{{ $category->mainmenu_name }}</td>
                                        <td>{{ $category->category_publish_status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>{{ date('j M Y', strtotime($category->created_at)) }}</td>
                                        <td>
                                            @if( $category->category_publish_status == 1 )
                                                <span><a href="{{ url('forms/category/category-unpublish/'.$category->id) }}" class="btn btn-success btn-xs" title="Published"><span class="glyphicon glyphicon-arrow-up"></span></a></span>
                                            @else
                                                <span><a href="{{ url('forms/category/category-publish/'.$category->id) }}" class="btn btn-warning btn-xs" title="Unpublished"><span class="glyphicon glyphicon-arrow-down"></span></a></span>
                                            @endif
                                            <span><a href="{{ url('forms/category/category-edit/'.$category->id) }}" class="btn btn-info btn-xs" title="Edit"><span class="glyphicon glyphicon-edit"></span></a></span>
                                            <span><a href="{{ url('forms/category/category-delete/'.$category->id) }}" class="btn btn-danger btn-xs" title="Delete" onclick="return confirm('Are You Sure to Delete This ID')"><span class="glyphicon glyphicon-trash"></span></a></span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
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


@endsection