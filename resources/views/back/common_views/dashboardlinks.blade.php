 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-light-primary elevation-4" style="background-color: lightgray !important">
     <!-- Brand Logo -->
     <a href="{{ url('/dashboard') }}" class="brand-link" style="background-color: lightgray">
         <img src="{{ asset('back/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-bold">@php echo  $u = auth()->user()->type @endphp</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <li class="nav-item">
                     <a class="nav-link  {{ request()->is('dashboard') ? 'active' : '' }}"
                         href="{{ url('/dashboard') }}">
                         <i class="fas fa-fw fa-tachometer-alt nav-icon"></i>
                         <span>Dashboard</span></a>
                 </li>
                 @if (auth()->user()->type != 'Admin' && auth()->user()->type != 'Admin' && auth()->user()->status == 'Active')
                     @php
                         $id = \App\Models\User::where('id', auth()->user()->id)->first()->id;
                         $pricing = \App\Models\User_role::where('user_id', $id)->first()->manage_pricing ?? null;
                         $files = \App\Models\User_role::where('user_id', $id)->first()->manage_files ?? null;
                         
                     @endphp
                     @if ($pricing == '1')
                         <li class="nav-item">
                             <a class="nav-link {{ request()->is('manage-pricing') ? 'active' : '' }}"
                                 href=" {{ url('/manage-pricing') }} ">
                                 <i class="fas fa-dollar-sign nav-icon"></i> <span>Manage Pricing</span>
                             </a>
                         </li>
                     @endif
                     @if ($files == '1')
                         <li class="nav-item">
                             <a class="nav-link {{ request()->is('manage-files') ? 'active' : '' }}"
                                 href=" {{ url('/manage-files') }} ">
                                 <i class="fas fa-file nav-icon"></i> <span>Manage Files</span>
                             </a>
                         </li>
                     @endif
                 @endif
                 @if (auth()->user()->type == 'Admin' || auth()->user()->type == 'admin')
                     <li class="nav-item">
                         <a class="nav-link {{ request()->is('manage-pricing') ? 'active' : '' }}"
                             href=" {{ url('/manage-pricing') }} ">

                             <i class="fas fa-dollar-sign nav-icon"></i> <span>Manage Pricing</span>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link {{ request()->is('manage-files') ? 'active' : '' }}"
                             href=" {{ url('/manage-files') }} ">
                             <i class="fas fa-file nav-icon"></i> <span>Manage Files</span>
                         </a>
                     </li>
                     {{-- Users --}}
                     <li class="nav-item ">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-users"></i>
                             <p>
                                 Mange Users
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a class="nav-link" href=" {{ url('/manage-users') }} ">
                                     <i class="far fa-circle nav-icon"></i> <span>Manage Users</span>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ url('/manage-role') }}" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Manage Role</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ url('/assign-role') }}" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Assign Role</p>
                                 </a>
                             </li>
                         </ul>
                     </li>
                 @endif
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
