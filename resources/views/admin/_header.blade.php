<div id="wrapper">
    <div class="sidebar-collapse">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">

                <a class="navbar-brand" href="index.html">
                    <h5>{{ Auth::user()->email }}</h5>

                </a>
            </div>

            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May

                <form id="logout-form" action="{{ route('logout') }}" method="post">
                    {{ csrf_field() }}
                    2014 &nbsp; <button type="submit" class="btn btn-danger square-btn-adjust">Logout</button>
                </form>

            </div>

        </nav>
    </div>
    <!-- /. NAV TOP  -->

</div>
