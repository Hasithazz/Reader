<script>
    $(document).ready(function () {
        $('#add').click(function () {//element to be click to load the page in the div
            $('#admin_panel').load('loadAddView');
        });        
    });
    $(document).ready(function () {
        $('#search').click(function () {//element to be click to load the page in the div
            $('#admin_panel').load('loadSearchView');
        });        
    });
</script>
<div class="row col-md-12">
    <div class="col-md-2 admin_navbar">
        <ul class="col-md-12 nav flex-column">
            <li class="nav-item admin nav_item">                
                <a class="nav-link admin_link" id="add" href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add</a>
            </li>
            <li class="nav-item admin nav_item">
                <a class="nav-link admin_link" id="search" href="#"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Search</a>
            </li>
            <li class="nav-item admin nav_item">
                <a class="nav-link admin_link" href="#"><i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp; View Statistics</a>
            </li>        
        </ul>

        <button type="button" class="btn btn-danger admin logout_btn"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Log Out</button>
    </div>
    <div id="admin_panel" class="col-md-10 admin_panel">
        <?php if (isset($subView)) {
            echo $subView;
        }?>
    </div>
</div>