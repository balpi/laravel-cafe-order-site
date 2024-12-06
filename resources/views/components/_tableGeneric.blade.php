<div class="row">



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
                    {{-- <th>Proccess</th>
                        <th>Name</th>
                        <th>Keywords</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Create Date</th>
                        <th>Last Update</th> --}}
                </tr>
            </thead>
            <tbody>
                @yield('table_tbody')
                {{-- @foreach ($data as $cat)
                        <tr class="@if ($loop->odd) odd gradeX  @else even gradeC @endif">
                            <td>
                                <button type="button" miss="Update" data-ID="{{ $cat->ID }}"
                                    class="btn btn-success">Update</button>
                                <button type="button" miss="Delete" data-ID={{ $cat->ID }}
                                    class="btn btn-danger">Remove</button>
                            </td>
                            <td>{{ $cat->Title }}</td>
                            <td>{{ $cat->Keywords }}</td>
                            <td>{{ $cat->Description }}</td>
                            <td>{{ $cat->Image }}</td>
                            <td>{{ $cat->Status }}</td>

                            <td class="center">{{ $cat->created_at }}</td>
                            <td class="center">{{ $cat->updated_at }}</td>
                        </tr>
                    @endforeach --}}

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets') }}/js/jquery-1.10.2.js"></script>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<script>
    document.getElementById('pagination').onchange = function() {
        window.location = "{{ $data->url(1) }}&items=" + this.value;


    };
    document.getElementById('searchBox').onchange = function() {
        window.location = "{{ $data->url(1) }}/&search=" + this.value;


    }

    const buttons = document.getElementsByTagName("button");
    const buttonsArray = [...buttons];
    buttonsArray.forEach((item) => {
        item.addEventListener("click", function() {
            if (item.hasAttribute('miss')) {
                if (event.target.getAttribute('miss') == "Update") {
                    window.location =
                        "{{ route('admin_category_find') }}/" +
                        event.target.getAttribute('data-ID')
                } else {
                    window.location =
                        "{{ route('admin_category_remove') }}/" +
                        event.target.getAttribute('data-ID')
                }


            }
        })
    });
    jQuery(document).ready(function() {
        var queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        if (urlParams.has('items')) {
            document.getElementById('pagination').value = urlParams.get('items');
        }
        if (urlParams.has('search')) {
            document.getElementById('searchBox').value = urlParams.get('search');
        }
    });
</script>

<!-- BOOTSTRAP SCRIPTS -->
<script src="{{ asset('assets') }}/js/bootstrap.min.js">
    < /scrip>   <
    script src = "{{ asset('assets') }}/js/jquery.metisMenu.js" >
</script>
<!-- CUSTOM SCRIPTS -->
<script src="{{ asset('assets') }}/js/custom.js">
    < />
