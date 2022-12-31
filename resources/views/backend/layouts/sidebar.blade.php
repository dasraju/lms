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
        <li class="dropdown {{ areActiveRoutes(['menu-head.index','menu-head.create','menu-head.edit'])}} ">
            <a href="{{route('menu-head.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Menu Head</span></a>
        </li>
        <li class="dropdown {{ areActiveRoutes(['cats.index','cats.create','cats.edit'])}} ">
            <a href="{{route('cats.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Category</span></a>
        </li>
        <li class="dropdown {{ areActiveRoutes(['subject.index','subject.create','subject.edit'])}} ">
            <a href="{{route('subject.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Subject</span></a>
        </li>
        {{-- <li class="dropdown {{ areActiveRoutes(['sub-cats.index','sub-cats.create','sub-cats.edit'])}} ">
            <a href="{{route('sub-cats.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Sub Category</span></a>
        </li> --}}
        <li class="dropdown {{ areActiveRoutes(['sub-sub-cats.index','sub-sub-cats.create','sub-sub-cats.edit'])}} ">
            <a href="{{route('sub-sub-cats.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Sub Category</span></a>
        </li>


        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="briefcase"></i><span>Revision Notes</span></a>
          <ul class="dropdown-menu">
            <li class="dropdown {{ areActiveRoutes(['chapter.indexs','chapter.creates','chapter.edit'])}} ">
                <a href="{{route('chapter.indexs','Revision')}}" class="nav-link"><i data-feather="monitor"></i><span>Chapter</span></a>
            </li>
            <li class="dropdown {{ areActiveRoutes(['topic.index','topic.create','topic.edit'])}} ">
                <a href="{{route('topic.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Topic</span></a>
            </li>
          </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                data-feather="briefcase"></i><span>Topical Question</span></a>
            <ul class="dropdown-menu">
              <li class="dropdown {{ areActiveRoutes(['chapter.index','chapter.creates','chapter.edit'])}} ">
                  <a href="{{route('topical-chapter.index').'?category=topical'}}" class="nav-link"><i data-feather="monitor"></i><span>Chapter</span></a>
              </li>
              <li class="dropdown {{ areActiveRoutes(['topic.index','topic.create','topic.edit'])}} ">
                <a href="{{route('parts.index').'?indexcat=topical'}}" class="nav-link"><i data-feather="monitor"></i><span>Parts</span></a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                data-feather="briefcase"></i><span>Past Paper Solution</span></a>
            <ul class="dropdown-menu">
              <li class="dropdown {{ areActiveRoutes(['chapter.index','chapter.creates','chapter.edit'])}} ">
                  <a href="{{route('topical-chapter.index').'?category=pastpaper'}}" class="nav-link"><i data-feather="monitor"></i><span>Chapter</span></a>
              </li>
              <li class="dropdown {{ areActiveRoutes(['topic.index','topic.create','topic.edit'])}} ">
                  <a href="{{route('parts.index').'?indexcat=pastpaper'}}" class="nav-link"><i data-feather="monitor"></i><span>Parts</span></a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                data-feather="briefcase"></i><span>Resources</span></a>
            <ul class="dropdown-menu">
              <li class="dropdown {{ areActiveRoutes(['chapter.indexs','chapter.creates','chapter.edit'])}} ">
                  <a href="{{route('folder.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Folder</span></a>
              </li>
              <li class="dropdown {{ areActiveRoutes(['topic.index','topic.create','topic.edit'])}} ">
                  <a href="{{route('folder-pdf.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Folder Pdf</span></a>
              </li>
              <li class="dropdown {{ areActiveRoutes(['topic.index','topic.create','topic.edit'])}} ">
                  <a href="{{route('resource-pdf.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Book & Syllebus</span></a>
              </li>
            </ul>
          </li>

        <li class="menu-header">Course Menu</li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>
              Course Details</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('course.index')}}">Course</a></li>
            <li><a class="nav-link" href="badge.html">Lesson</a></li>
            <li><a class="nav-link" href="breadcrumb.html"></a></li>
            <li><a class="nav-link" href="buttons.html">Buttons</a></li>

          </ul>
        </li>
        <li class="dropdown {{ areActiveRoutes(['subject.index','subject.create','subject.edit'])}} ">
          <a href="{{route('course.pending')}}" class="nav-link"><i data-feather="monitor"></i><span>pending Course</span></a>
        </li>
        <li class="menu-header">User Menu</li>
       
        <li class="dropdown {{ areActiveRoutes(['admin.user.list'])}} ">
          <a href="{{route('admin.user.list')}}" class="nav-link"><i data-feather="monitor"></i><span>User List</span></a>
        </li>

        <li class="dropdown {{ areActiveRoutes(['user.give.permission'])}} ">
          <a href="{{route('user.give.permission')}}" class="nav-link"><i data-feather="monitor"></i><span>User Permission</span></a>
        </li>

      </ul>
    </aside>
  </div>
