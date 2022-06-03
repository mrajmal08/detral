

<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
  <div class="logo"><a href="#" class="simple-text logo-normal">
      MS solution
    </a></div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      {{-- <li class="nav-item {{Request::is('dashboard') ? 'active':''}}  ">
        <a class="nav-link" href="./dashboard.html">
          <i class="material-icons">dashboard</i>
          <p>dashboard</p>
        </a>
      </li> --}}
      <li class="nav-item  {{Request::is('admin/blogs') ? 'active':''}} ">
        <a class="nav-link" href="{{url('/admin/blogs')}}">
          <i class="material-icons">Blog</i>
          <p>Blogs</p>
        </a>
      </li>
      <li class="nav-item  {{Request::is('admin/add-blog') ? 'active':''}} ">
        <a class="nav-link" href="{{url('/admin/add-blog')}}">
          <i class="material-icons">addblog</i>
          <p>Add Blogs</p>
        </a>
      </li>
      <li class="nav-item  {{Request::is('admin/leads') ? 'active':''}} ">
        <a class="nav-link" href="{{url('/admin/leads')}}">
          <i class="material-icons">Leads</i>
          <p>Leads</p>
        </a>
      </li>
      <li class="nav-item  {{Request::is('admin/contact') ? 'active':''}} ">
        <a class="nav-link" href="{{url('/admin/contact')}}">
          <i class="material-icons">Contact</i>
          <p>contacts</p>
        </a>
      </li>
      {{-- <li class="nav-item  {{Request::is('products') ? 'active':''}} ">
        <a class="nav-link" href="{{url('products')}}">
          <i class="material-icons">person</i>
          <p>products</p>
        </a>
      </li>
      <li class="nav-item  {{Request::is('add-products') ? 'active':''}} ">
        <a class="nav-link" href="{{url('add-products')}}">
          <i class="material-icons">person</i>
          <p>Add products</p>
        </a>
      </li>
      <li class="nav-item  {{Request::is('orders') ? 'active':''}} ">
        <a class="nav-link" href="{{url('orders')}}">
          <i class="material-icons">content_paste</i>
          <p>Orders</p>
        </a>
      </li>
      <li class="nav-item  {{Request::is('users') ? 'active':''}} ">
        <a class="nav-link" href="{{url('users')}}">
          <i class="material-icons">person</i>
          <p>Users</p>
        </a>
      </li> --}}
      
    </ul>
  </div>
</div>