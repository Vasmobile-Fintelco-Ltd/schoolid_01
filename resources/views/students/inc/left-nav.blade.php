 <!-- ========== Left Sidebar Start ========== -->
 <div class="leftside-menu" style="background: #16459e">

     <a href="" class="logo text-center logo-light" style="background: #16459e !important">
        <span class="logo-lg">
            <img src="{{ asset('back/public/images/illustration/student/128/skoolid-logo.png') }}" alt="" height="30" style="float: left; margin-top:15px;">
        </span>
         <span class="logo-sm">
            <img src="{{ asset('back/public/images/illustration/student/128/skoolid-logo.png') }}" alt="" height="30">
        </span>
     </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Student</li>

            <li class="side-nav-item">
                <a href="{{ route('student.dashboard')}}" class="side-nav-link">
                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left" style="font-size:17px !important">home</span>
                    <span> Home </span>
                </a>
            </li>



            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left" style="font-size:17px !important">style</span>
                    <span> Results </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left" style="font-size:17px !important">assignment_turned_in</span>
                    <span> Wallet </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left" style="font-size:17px !important">timeline</span>
                    <span> Referral </span>
                </a>
            </li>

          


        </ul>



        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
