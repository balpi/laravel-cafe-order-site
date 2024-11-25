<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('assets') }}/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{ asset('assets') }}/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="{{ asset('assets') }}/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        @include('admin._header');

        @include('admin._sidebar');
        <div id="page-wrapper">
            <div id="page-inner">

                Advanced Tables
                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_length" id="dataTables-example_length">
                            <label>
                                <select name="pagination" id="pagination" aria-controls="dataTables-example"
                                    class="form-control input-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>

                                records per page
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div id="dataTables-example_filter" class="dataTables_filter"><label>Search:<input
                                    type="search" class="form-control input-sm"
                                    aria-controls="dataTables-example"></label></div>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>

                                    <th>Category Name</th>
                                    <th>Keywords</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Create Date</th>
                                    <th>Last Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{ $count = 1 }}
                                @foreach ($categorylist as $data)
                                    <tr class="@if ($loop->odd) odd gradeX  @else even gradeC @endif">
                                        <td>{{ $data->Title }}</td>
                                        <td>{{ $data->Keywords }}</td>
                                        <td>{{ $data->Description }}</td>
                                        <td>{{ $data->Image }}</td>
                                        <td>{{ $data->Status }}</td>

                                        <td class="center">{{ $data->created_at }}</td>
                                        <td class="center">{{ $data->updated_at }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-6">

                            <h4 id="record_length"></h4>

                        </div>
                        <div class="col-md-6">{{ $categorylist->links() }}</div>
                    </div>

                </div>
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
    </div>

    </div>
    <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <script>
        document.getElementById('pagination').onchange = function() {
            window.location = "{{ $categorylist->url(1) }}&items =" + this.value;
            document.getElementById('pagination').innerText = items;
        };
    </script>

    <!-- JQUERY SCRIPTS -->
    <script src="{{ asset('assets') }}/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{ asset('assets') }}/js/bootstrap.min.js">
        < /scrip> <!--METISMENU SCRIPTS-- > <
        script src = "{{ asset('assets') }}/js/jquery.metisMenu.js" >
    </script>
    <!-- CUSTOM SCRIPTS -->
    <script src="{{ asset('assets') }}/js/custom.js"></script>


</body>

</html>
