<style>
    table {
        table-layout: fixed;
        word-wrap: break-word;
    }
</style>
<div class="row">


    @yield('new_button')

    <div class="col-sm-6">

        <div class="dataTables_length" id="dataTables-example_length">
            <label>
                <select name="dataTables-example_length" id="pagination" content="{{ csrf_token() }}"
                    aria-controls="dataTables-example" class="form-control input-sm">
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
        <div id="dataTables-example_filter" class="dataTables_filter"><label>Search:
                <input type="search" id="searchBox" class="form-control input-sm"
                    aria-controls="dataTables-example"></label></div>
    </div>
</div>
<div class="panel-body">

    <div class="table-responsive">

        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>

                    @yield('table_th')

                </tr>
            </thead>
            <tbody>


                @yield('table_tbody')


            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-6">

            <h4 id="record_length"></h4>

        </div>
        <div class="col-md-6">{{ $data->links() }}</div>
    </div>

</div>

<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
@yield('script')

<!-- BOOTSTRAP SCRIPTS -->
<script src="{{ asset('assets') }}/js/bootstrap.min.js">
    < /scrip>   <
    script src = "{{ asset('assets') }}/js/jquery.metisMenu.js" >
</script>
<!-- CUSTOM SCRIPTS -->
<script src="{{ asset('assets') }}/js/custom.js">
    < /script>
