<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav">
        <ul id="sidebarnav">
          <li class="nav-devider"></li>
          <li class="nav-label">Home</li>
          <li> <a class=""   href="/home" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span></a></li>
          <hr/>
          <li class="nav-label">LOGISTICS</li>
          <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-truck"></i><span class="hide-menu">Logistics Management</span></a>
            <ul aria-expanded="false" class="collapse">
              <li><a href="/consignee">Manage Consignee</a></li>
              <li><a href="/courier">Manage Courier</a></li>
          </ul>
      </li>
      <hr/>
      <li class="nav-label">CRM</li>
      <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cogs"></i><span class="hide-menu">Customer Management</span></a>
        <ul aria-expanded="false" class="collapse">
          <li> <a class="has-arrow" href="#" aria-expanded="false">Manage Account</a>
               <ul aria-expanded="false" class="collapse">
                   <li><a href="{{ route('accounts.index')}}">Account Information</a></li>
                   <li><a href="{{ route('accounts.list')}}">Account List</a></li>
               </ul>
           </li>
          <li><a href="{{ route('sales' )}}">Manage Sales</a></li>
          <li><a href="{{ route('products.index' )}}">Manage Products</a></li>
      </ul>
  </li>
  <hr/>
  <li class="nav-label">USERS</li>
  <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">User Management</span></a>
    <ul aria-expanded="false" class="collapse">
      <li><a href="{{ route('permissions.index') }}">Manage Permissions</a></li>
      <li><a href="{{ route('roles.index') }}">Manage Roles</a></li>
      <li><a href="{{ route('users.index') }}">Manage Users</a></li>
  </ul>
</li>
            <hr>
            <li class="nav-label">Global Configuration</li>
            <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cog"></i><span class="hide-menu">Settings</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{ route('permissions.index') }}">Manage SMS</a></li>
                    <li><a href="{{ route('roles.index') }}">Manage Roles</a></li>
                    <li><a href="{{ route('users.index') }}">Manage Users</a></li>
                </ul>
            </li>
</ul>
</nav>
<!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->
</div>
