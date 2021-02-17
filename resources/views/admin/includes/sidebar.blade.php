<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active treeview">
          <a href="/home">
            <i class="fa fa-dashboard"></i> <span>Home</span>
          </a>
        </li>
        @if(Auth::user()->role_id!=2)
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>User Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/users"><i class="fa fa-users"></i> Users </a></li>
            <li><a href="/roles"><i class="fa fa-suitcase"></i>Roles</a></li>
          </ul>
        </li>
        @endif
        <li class="treeview">
          <a href="#">
            <i class="fa fa-address-book"></i>
            <span>Contacts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/suppliers"><i class="fa fa-star"></i> Suppliers</a></li>
            <li><a href="/customers"><i class="fa fa-address-book"></i> Customers</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/products"><i class="fa fa-list"></i> List Productss</a></li>
            <li><a href="{{ route('products.create')}}"><i class="fa fa-plus-circle"></i> Add Product</a></li>
            <li><a href="/categories" ><i class="fa fa-star"></i> Categories</a></li>
            <li><a href="/subcategories" ><i class="fa fa-star"></i> SubCategories</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-arrow-circle-down"></i> <span>Purchases</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('purchases.index')}}"><i class="fa fa-list"></i> List Purchase</a></li>
            <li><a href="{{route('purchases.create')}}"><i class="fa fa-plus-circle"></i> Add Purchase</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-arrow-circle-up"></i> <span>Sell</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/sale"><i class="fa fa-list"></i>All Sales</a></li>
            <li><a href="/sales/create"><i class="fa fa-plus-circle"></i> Add Sales</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Inventory Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/stocks"><i class="fa fa-list"></i>View inventory</a></li>
          </ul>
        </li>
        @if(Auth::user()->role_id!=2)
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart-o"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/plreport"><i class="fa fa-list"></i>Profit/Loss Report</a></li>
            <li><a href="/salereport"><i class="fa fa-list"></i>Sales report</a></li>
            <li><a href="/purchasereport"><i class="fa fa-list"></i>Purchase report</a></li>
          </ul>
        </li>
        @endif
       
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Expenses</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i>List Expense</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i>Add Expense</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Expense Category</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i></a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i></a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i></a></li>
          </ul>
        </li> -->
        
    </section>
    <!-- /.sidebar -->
  </aside>