<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
            class="logo-name">LMS</span>
        </a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown active">
          <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown {{ areActiveRoutes(['cats.index','cats.create','cats.edit'])}} ">
            <a href="{{route('cats.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Category</span></a>
        </li>
        <li class="dropdown {{ areActiveRoutes(['sub-cats.index','sub-cats.create','sub-cats.edit'])}} ">
            <a href="{{route('sub-cats.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Sub Category</span></a>
        </li>
        <li class="dropdown {{ areActiveRoutes(['sub-sub-cats.index','sub-sub-cats.create','sub-sub-cats.edit'])}} ">
            <a href="{{route('sub-sub-cats.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Sub Sub Category</span></a>
        </li>
        <li class="dropdown {{ areActiveRoutes(['chapter.index','chapter.create','chapter.edit'])}} ">
            <a href="{{route('chapter.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Chapter</span></a>
        </li>
        <li class="dropdown {{ areActiveRoutes(['topic.index','topic.create','topic.edit'])}} ">
            <a href="{{route('topic.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Topic</span></a>
        </li>

        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="briefcase"></i><span>Widgets</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li>
            <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li>
          </ul>
        </li>

        <li class="menu-header">Course Menu</li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Basic
              Components</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="alert.html">Course</a></li>
            <li><a class="nav-link" href="badge.html">Lesson</a></li>
            <li><a class="nav-link" href="breadcrumb.html"></a></li>
            <li><a class="nav-link" href="buttons.html">Buttons</a></li>

          </ul>
        </li>



      </ul>
    </aside>
  </div>
