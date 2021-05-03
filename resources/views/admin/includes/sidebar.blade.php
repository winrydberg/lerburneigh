<aside class="main-sidebar"> 
    <!-- sidebar: style can be found in sidebar.less -->
    <div class="sidebar"> 
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image text-center">
        <img src="{{asset('assets/images/user.png')}}" class="img-circle" alt="User Image"> </div>
        <div class="info">
        <p>{{Auth::user()->name}}</p>
        <a href="{{url('/admin/logout')}}"><i class="fa fa-power-off"></i></a> </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">LERBURNEIIGH FARMS</li>
        <li class="active"> 
        <a href="{{url('/admin/dashboard')}}"> <i class="fa fa-dashboard"></i> 
                <span>Dashboard</span> <span class="pull-right-container"></span> </a>
        </li>
        <li class=""> 
        <a href="{{url('/admin/banners')}}"> <i class="fa fa-image"></i> 
                <span>Banner</span> <span class="pull-right-container"></span> </a>
        </li>
    <li class=""> <a href="{{url('/admin/customers')}}"> <i class="fa fa-bullseye"></i> 
            <span>Customers</span> <span class="pull-right-container"> </span> </a>
        </li>
         <li class="treeview"> <a href="#"> <i class="fa fa-briefcase"></i> <span>Category</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
          <li><a href="{{url('/admin/new-category')}}" class="active">New Category</a></li>
          <li><a href="{{url('/admin/categories')}}">Categories</a></li>
          </ul>
        </li>
        <li class=""> <a href="{{url('/admin/orders')}}"> <i class="fa fa-envelope-o "></i> 
        <span>Orders</span> <span class="pull-right-container">  </span> <span class="badge badge-danger">{{\App\Models\Order::where('status', 0)->count()}}</span> </a>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-briefcase"></i> <span>Products</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
          <li><a href="{{url('admin/new-product')}}" class="active">New Product</a></li>
          <li><a href="{{url('admin/products')}}">View Products</a></li>
          </ul>
        </li>
 
 
       







        
        <li class="header">EXTRA COMPONENTS</li>
        <li class="treeview"> <a href="#"> <i class="fa fa-briefcase"></i> <span>Regions/City</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
          <li><a href="{{url('admin/regions')}}" class="active">Regions</a></li>
          <li><a href="{{url('admin/new-city')}}">New City</a></li>
          <li><a href="{{url('admin/cities')}}">All Cities</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-briefcase"></i> <span>Gallery</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
          <li><a href="{{url('admin/new-gallery')}}" class="active">New Photo</a></li>
          <li><a href="{{url('admin/galleries')}}">View Photos</a></li>
          </ul>
        </li>
        <li class=""> <a href="{{url('/admin/inbox')}}"> <i class="fa fa-envelope-o "></i> 
            <span>Inbox</span> <span class="pull-right-container">  </span> </a>
        </li>
    
      </ul>
    </div>
    <!-- /.sidebar --> 
  </aside>
  