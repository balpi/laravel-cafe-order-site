<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Binary admin</a>
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

    <!-- /. NAV TOP  -->

</div>
