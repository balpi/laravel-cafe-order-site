<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h2>{{ Auth::user()->name }}</h2>
            <h5>Welcome {{ Auth::user()->name }} , Love to see you back. </h5>
        </div>
    </div>
    <!-- /. ROW  -->
    <hr />
    <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-6">
            <a class="nav-link" href="{{ route('admin_messages', ['data' => $messages]) }}">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-red set-icon">
                        <i class="fa fa-envelope-o"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">{{ $messages->count() }} New</p>
                        <p class="text-muted">Messages</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <a class="nav-link" href="{{ route('admin_orders') }}">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-green set-icon">
                        <i class="fa fa-bars"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">30 Tasks</p>
                        <p class="text-muted">Remaining</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <a class="nav-link" href="{{ route('admin_comments') }}">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-blue set-icon">
                        <i class="fa fa-bell-o"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">{{ $comments->count() }} New</p>
                        <p class="text-muted">Comments</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <a class="nav-link" href="{{ route('admin_orders') }}">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-brown set-icon">
                        <i class="fa fa-rocket"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">{{ $orders->count() }} Orders</p>
                        <p class="text-muted">Pending</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- /. ROW  -->
    <!-- /. ROW  -->
    <hr />

    <!-- /. ROW  -->
    <div class="row">


        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Bar Chart Example
                </div>
                <div class="panel-body">
                    <div id="morris-bar-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-green">
                <div class="panel-body">
                    <i class="fa fa-bar-chart-o fa-5x"></i>
                    @php
                        $disktotal = disk_total_space('/'); //DISK usage
                        $disktotalsize = $disktotal / 1073741824;

                        $diskfree = disk_free_space('/');
                        $used = $disktotal - $diskfree;

                        $diskusedize = $used / 1073741824;
                        $diskuse1 = round(100 - ($diskusedize / $disktotalsize) * 100);
                        $diskuse = round(100 - $diskuse1) . '%';
                    @endphp
                    <h3>
                        {{ $diskuse }}
                    </h3>
                </div>
                <div class="panel-footer back-footer-green">
                    Disk Space Available

                </div>
            </div>

        </div>

    </div>
    <!-- /. ROW  -->
    <div class="row">

        <div class="col-md-9 col-sm-12 col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Users
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Email</th>

                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($users as $user)
                                    @php
                                        $i += 1;
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->roles[0]->name }}</td>

                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /. ROW  -->
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">

            <div class="chat-panel panel panel-default chat-boder chat-panel-head">
                <div class="panel-heading">
                    <i class="fa fa-comments fa-fw"></i>
                    Chat Box
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu slidedown">
                            <li>
                                <a href="#">
                                    <i class="fa fa-refresh fa-fw"></i>Refresh
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-check-circle fa-fw"></i>Available
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-times fa-fw"></i>Busy
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-clock-o fa-fw"></i>Away
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-sign-out fa-fw"></i>Sign Out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <ul class="chat-box">
                        <li class="left clearfix">
                            <span class="chat-img pull-left">
                                <img src="assets/img/1.png" alt="User" class="img-circle" />
                            </span>
                            <div class="chat-body">
                                <strong>Jack Sparrow</strong>
                                <small class="pull-right text-muted">
                                    <i class="fa fa-clock-o fa-fw"></i>12 mins ago
                                </small>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                    ornare dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix">
                            <span class="chat-img pull-right">

                                <img src="assets/img/2.png" alt="User" class="img-circle" />
                            </span>
                            <div class="chat-body clearfix">

                                <small class=" text-muted">
                                    <i class="fa fa-clock-o fa-fw"></i>13 mins ago</small>
                                <strong class="pull-right">Jhonson Deed</strong>

                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                    ornare dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="left clearfix">
                            <span class="chat-img pull-left">
                                <img src="assets/img/3.png" alt="User" class="img-circle" />
                            </span>
                            <div class="chat-body clearfix">

                                <strong>Jack Sparrow</strong>
                                <small class="pull-right text-muted">
                                    <i class="fa fa-clock-o fa-fw"></i>14 mins ago</small>

                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                    ornare dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix">
                            <span class="chat-img pull-right">
                                <img src="assets/img/4.png" alt="User" class="img-circle" />
                            </span>
                            <div class="chat-body clearfix">

                                <small class=" text-muted">
                                    <i class="fa fa-clock-o fa-fw"></i>15 mins ago</small>
                                <strong class="pull-right">Jhonson Deed</strong>

                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                    ornare dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="left clearfix">
                            <span class="chat-img pull-left">
                                <img src="assets/img/1.png" alt="User" class="img-circle" />
                            </span>
                            <div class="chat-body">
                                <strong>Jack Sparrow</strong>
                                <small class="pull-right text-muted">
                                    <i class="fa fa-clock-o fa-fw"></i>12 mins ago
                                </small>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                    ornare dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix">
                            <span class="chat-img pull-right">
                                <img src="assets/img/2.png" alt="User" class="img-circle" />
                            </span>
                            <div class="chat-body clearfix">

                                <small class=" text-muted">
                                    <i class="fa fa-clock-o fa-fw"></i>13 mins ago</small>
                                <strong class="pull-right">Jhonson Deed</strong>

                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                    ornare dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm"
                            placeholder="Type your message to send..." />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                Send
                            </button>
                        </span>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Label Examples
                </div>
                <div class="panel-body">
                    <span class="label label-default">Default</span>
                    <span class="label label-primary">Primary</span>
                    <span class="label label-success">Success</span>
                    <span class="label label-info">Info</span>
                    <span class="label label-warning">Warning</span>
                    <span class="label label-danger">Danger</span>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Donut Chart Example
                </div>
                <div class="panel-body">
                    <div id="morris-donut-chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
