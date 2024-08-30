@extends('parents.master')



@section('content')
    <!-- Include Bootstrap and jQuery -->

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>        
      

    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page-content">


            <div class="page-section">
                <div class="container page__container">
                    <div class="row card-group-row" style="margin-top: 3rem !important;">

                        <div class="col-lg-4 col-md-6 card-group-row__col">
                            <div class="card card-group-row__card p-relative o-hidden">
                                <div class="card-body d-flex flex-row align-items-center" style="background-color:#00b568; color: #e9edf2;">
                                    <div class="flex">
                                        <p class="card-title d-flex align-items-center">
                                            <span class="h2 m-0" style="padding-right:30px;color:#e9edf2">Students</span>
                                        <a href="{{ route('get_students') }}" class="  "><span style="background-color: #e4ae0b; display: inline-block;
                                           font-weight: 400;
                                           white-space: nowrap;
                                           vertical-align: middle;
                                           -webkit-user-select: none;
                                           -moz-user-select: none;
                                           -ms-user-select: none;
                                           user-select: none;
                                           padding:6px;
                                           border-radius:15px;
                                           color:#fff;
                                           font-size: 0.8125rem;
                                          background-color:#e4ae0b !important;
                                           line-height: 1.5;"><i class="fa fa-solid fa-arrow-up"></i >  Add Student</span></a> 
                                        </p>
                                        <strong style="color:#034bf4;font-size: 16px;color:#e9edf2;font-size: 15px;">No. of students: {{ count($students) }}</strong>  
                                    </div>
                                </div>
                                <div class="progress"
                                     style="height:3px;">
                                    <div class="progress-bar bg-accent"
                                         role="progressbar"
                                         style="width: 50%;"
                                         aria-valuenow="25"
                                         aria-valuemin="90"
                                         aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>

                       

                        <div class="col-lg-4 col-md-6 card-group-row__col">
                            <div class="card card-group-row__card p-relative o-hidden">
                                    <div class="card-body d-flex flex-row align-items-center" style="background-color: #16459e; color: #e9edf2;">
                                        <div class="flex">
                                            <span class="h2 m-0" style="color:#fff;">Kes 3,000.00</span>
                                            <a href="wallet.html"><p class="card-title d-flex align-items-center">
                                                <strong style="color:#ffffff;font-size: 14px;">Centy Wallet Balance</strong>
                                            </p></a>
                                        </div>
                                        <img src="{{ asset('back/public/images/paths/wallet.png') }}" style="width: 30px;"/>
                                    </div>
                                <div class="progress"
                                     style="height: 3px;">
                                    <div class="progress-bar"
                                         role="progressbar"
                                         style="width: 50%;"
                                         aria-valuenow="50"
                                         aria-valuemin="40"
                                         aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 card-group-row__col">
                            <div class="card card-group-row__card p-relative o-hidden">
                                <div class="card-body d-flex flex-row align-items-center" style="background-color: #00b5b4; color: #e9edf2;">
                                    <div class="flex">
                                        <a href="{{ route('parentstudent_brain_game')}}"><span class="h2 m-0" style="color:#fff;">Brain Game</span></a>
                                    </div>
                                    <img src="{{ asset('back/public/images/paths/game.png') }}" style="width: 40px;"/>
                                </div>
                                <div class="progress"
                                     style="height: 3px;">
                                    <div class="progress-bar"
                                         role="progressbar"
                                         style="width: 50%;"
                                         aria-valuenow="50"
                                         aria-valuemin="40"
                                         aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div> 
        </div>
       

        <div class="container page__container page-section  hadow-lg" style="padding-top:0px; margin-top:-5px; ">





            <div class="card mb-lg-32pt shadow-lg">

                <div class="table-responsive" data-toggle="lists" data-lists-sort-by="js-lists-values-date"
                    data-lists-sort-desc="true"
                    data-lists-values='["js-lists-values-name", "js-lists-values-company", "js-lists-values-phone", "js-lists-values-date"]'>
                    <table class="table table-striped dt-responsive nowrap w-100" style="padding: 30px">
                        <thead style="height:40px;background:#e9edf2;">
                            <tr>
                                <th >No
                                </th> 
                                <th >Student Name</th>
                                <th>Grade</th>
                                <th >Wallet Balance</th>
                                <th>Escrow Balance</th>
                                <th>Manage Wallet</th>
                                <th >Action</th>

                            </tr>
                        </thead>


                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

            <div style="margin-top:13rem">
                <p class="text-70 brand mb-24pt">
                    <img class="brand-icon"
                        src="{{ asset('back/public/images/illustration/student/128/logo-skoolid.png') }}" width="120"
                        alt="Examind">
                </p>
                <p class="measure-lead-max text-50 small mr-8pt">Examind is a Module designed to help students prepare
                    effectively for their exams. It comes with KCSE
                    past papers and uses machine learning to analyze how examiners set questions. This helps Examind
                    predict potential questions that may appear in the national exam, giving students a strategic advantage
                    in Examination Preparations.</p>
            </div>
            {{-- <table class="table mb-0 thead-border-top-0 table-nowrap">
                   <thead style="height:40px;background:#e9edf2;">
                       <tr>
                           <th style="width: 22px;" class="pr-0">
                               <a href="javascript:void(0)"
                                  class="sort2">No</a>
                           </th>

                           <th>
                               <a href="javascript:void(0)"
                                  class="sort"
                                  data-sort="js-lists-values-name">Subject</a>
                           </th>

                           <th>
                               <a href="javascript:void(0)"
                                  class="sort"
                                  data-sort="js-lists-values-name">Valid Until</a>
                           </th>

                           <th style="width: 150px;">
                               <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-company">Reward</a>
                           </th>

                           <th style="width: 37px;">Target</th>
                           <th style="width: 48px;">
                               <a href="javascript:void(0)"
                                  class="sort"
                                  data-sort="js-lists-values-phone">Action</a>
                           </th>
                           <th style="width: 24px;"></th>
                       </tr>
                   </thead>

                   <tbody class="list" id="clients">

                       <tr>
                           <td class="pr-0">
                               <div class="custom-control custom-checkbox">
                                   <div class="d-flex flex-column">
                                       <small class="js-lists-values-company list-2"><strong>1</strong></small>
                                   </div>
                               </div>
                           </td>

                           <td>
                               <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                   <div class="avatar avatar-sm mr-8pt">
                                       <span class="avatar-title rounded bg-warning">En</span>
                                   </div>
                                   <div class="media-body">
                                       <div class="d-flex flex-column">
                                           <small class="js-lists-values-company"><strong>English</strong></small>
                                       </div>
                                   </div>
                               </div>
                           </td>

                           <td>
                               <small class="js-lists-values-phone text-50">2024-04-05</small>
                           </td>

                           <td>
                               <small class="js-lists-values-phone text-50">Kes 100.00</small>
                           </td>

                           <td>
                               <small class="js-lists-values-phone text-50">88%</small>
                           </td>

                           <td>
                               <a href="quizzes.html" class="chip">Take Quiz</a>
                           </td>
                       </tr>

                       <tr>
                           <td class="pr-0">
                               <div class="custom-control custom-checkbox">
                                   <div class="d-flex flex-column">
                                       <small class="js-lists-values-company list-2"><strong>2</strong></small>
                                   </div>
                               </div>
                           </td>

                           <td>
                               <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                   <div class="avatar avatar-sm mr-8pt">
                                       <span class="avatar-title rounded bg-primary">MT</span>
                                   </div>
                                   <div class="media-body">
                                       <div class="d-flex flex-column">
                                           <small class="js-lists-values-company"><strong>Mathematics</strong></small>
                                       </div>
                                   </div>
                               </div>
                           </td>

                           <td>
                               <small class="js-lists-values-phone text-50">2024-04-05</small>
                           </td>

                           <td>
                               <small class="js-lists-values-phone text-50">Kes 100.00</small>
                           </td>

                           <td>
                               <small class="js-lists-values-phone text-50">88%</small>
                           </td>

                           <td>
                               <a href="quizzes.html" class="chip">Take Quiz</a>
                           </td>
                       </tr>


                       <tr>
                           <td class="pr-0">
                               <div class="custom-control custom-checkbox">
                                   <div class="d-flex flex-column">
                                       <small class="js-lists-values-company list-2"><strong>3</strong></small>
                                   </div>
                               </div>
                           </td>

                           <td>
                               <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                   <div class="avatar avatar-sm mr-8pt">
                                       <span class="avatar-title rounded bg-danger">HI</span>
                                   </div>
                                   <div class="media-body">
                                       <div class="d-flex flex-column">
                                           <small class="js-lists-values-company"><strong>History</strong></small>
                                       </div>
                                   </div>
                               </div>
                           </td>

                           <td>
                               <small class="js-lists-values-phone text-50">2024-04-05</small>
                           </td>

                           <td>
                               <small class="js-lists-values-phone text-50">Kes 290.00</small>
                           </td>

                           <td>
                               <small class="js-lists-values-phone text-50">50%</small>
                           </td>

                           <td>
                               <a href="quizzes.html" class="chip">Take Quiz</a>
                           </td>
                       </tr>

                   </tbody>
               </table> --}}
        </div>

        {{-- <div class="card-footer p-8pt">
               <ul class="pagination justify-content-start pagination-xsm m-0" style="justify-content: end !important; padding-right: 30px;">
                   <li class="page-item disabled">
                       <a class="page-link"
                          href="#"
                          aria-label="Previous">
                           <span aria-hidden="true"
                                 class="material-icons">chevron_left</span>
                           <span>Prev</span>
                       </a>
                   </li>
                   <li class="page-item">
                       <a class="page-link"
                          href="#"
                          aria-label="Page 1">
                           <span>1</span>
                       </a>
                   </li>
                   <li class="page-item">
                       <a class="page-link"
                          href="#"
                          aria-label="Page 2">
                           <span>2</span>
                       </a>
                   </li>
                   <li class="page-item">
                       <a class="page-link"
                          href="#"
                          aria-label="Next">
                           <span>Next</span>
                           <span aria-hidden="true"
                                 class="material-icons">chevron_right</span>
                       </a>
                   </li>
               </ul>

           </div> --}}

    </div>

    </div>





    <!-- // END Footer -->

    </div>

    <!-- // END drawer-layout__content -->

    <!-- Drawer -->

    <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
        <div class="mdk-drawer__content">
            <div class="sidebar sidebar-dark-pickled-bluewood sidebar-left" data-perfect-scrollbar>

                <!-- Sidebar Content -->

                <a href="index.html" class="sidebar-brand ">
                    <span class="avatar avatar-xl sidebar-brand-icon h-auto">

                        <span class="avatar-title rounded bg-primary"><img
                                src="{{ asset('back/public/images/illustration/student/128/skoolid-logo.png') }}"
                                class="img-fluid" alt="logo" /></span>
                    </span>
                </a>

                <div class="sidebar-heading">Student</div>
                <ul class="sidebar-menu">

                    <li class="sidebar-menu-item active">
                        <a class="sidebar-menu-button" href="index.html">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">home</span>
                            <span class="sidebar-menu-text">Home</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="results.html">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">style</span>
                            <span class="sidebar-menu-text">Results</span>
                        </a>
                    </li>

                    </li>

                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="wallet.html">
                            <span
                                class="material-icons sidebar-menu-icon sidebar-menu-icon--left">assignment_turned_in</span>
                            <span class="sidebar-menu-text">Wallet</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="wallet.html">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">account_box</span>
                            <span class="sidebar-menu-text">Attendance</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="wallet.html">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">timeline</span>
                            <span class="sidebar-menu-text">Referral</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="wallet.html">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">poll</span>
                            <span class="sidebar-menu-text">Health</span>
                        </a>
                    </li>


                </ul>

                <!-- // END Sidebar Content -->

            </div>
        </div>
    </div>

    <!-- // END Drawer -->

    </div>

    <!-- // END Drawer Layout -->

    {{-- <div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>     <!-- end page title -->

    <div class="row">
        <div class="col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Centii Balance</h5>
                            <h3 class="my-2 py-1">ksh {{ $account_balance }}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>Withdraw</span>
                            </p>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <div id="campaign-sent-chart" data-colors="#727cf5"></div>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

        <div class="col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Centii Obtained</h5>
                            <h3 class="my-2 py-1">ksh {{ $centiisObtained }}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>Withdraw</span>
                            </p>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <div id="campaign-sent-chart" data-colors="#727cf5"></div>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

        <div class="col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="New Leads">Questions</h5>
                            <h3 class="my-2 py-1">{{ $questions_count }}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 5.38%</span>
                            </p>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <div id="new-leads-chart" data-colors="#0acf97"></div>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->



        <div class="col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Booked Revenue">Escrow Balance</h5>
                            <h3 class="my-2 py-1">ksh {{ $centy_balance }}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 3.27%</span>

                            </p>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <div id="booked-revenue-chart" data-colors="#0acf97"></div>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title">My Results</h4>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="buttons-table-preview">
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Exam</th>
                                        <th>Subject</th>
                                        <th>Questions</th>
                                        <th>Centiis </th>
                                        <th>Date</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($results as $result)
                                    <tr>
                                        <td>{{ $result->exam->name }}</td>
                                        <td>{{ $result->exam->subject->name }}</td>
                                        <td>{{ $result->exam->questions->count() }}</td>
                                        <td>{{ $result->yes_ans }}</td>
                                        <td>{{ $result->created_at }}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div> <!-- end preview-->

                    </div> <!-- end tab-content-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                   
                    <div class="tab-content">
                        <div class="tab-pane show active" id="buttons-table-preview">
                          
                                <h4 class="header-title">My Brain Game Results</h4>

                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>                                        
                                            <th>Questions</th>
                                            <th>Centiis Obtained </th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
    
    
                                    <tbody>
                                        @foreach ($brainGameresults as $brainGameresult) 
                                        <tr>                                       
                                            <td>{{ $loop->iteration }}</td> 
                                            <td>{{ ($brainGameresult->yes_ans) + $brainGameresult->no_ans }}</td>
                                            <td>{{ $brainGameresult->yes_ans }}</td>
                                            <td>{{ $brainGameresult->created_at }}</td>
                                        </tr>
                                        @endforeach
    
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end preview-->

                    </div> <!-- end tab-content-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

    <!-- end row-->
</div> --}}
   


{{-- <div class="content">


    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Students</h5>
                                <h3 class="my-2 py-1">{{ count($students) }}</h3>
                                <a href="{{ route('get_students') }}" target="_blank">Add a Student</a>

                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <div id="campaign-sent-chart" data-colors="#727cf5"></div>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="text-muted fw-normal mt-0 text-truncate" title="New Leads">Wallet Balance</h5>
                                <h3 class="my-2 py-1">Ksh 0.00</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success me-2"><a href="" target="_blank">Deposit Funds</a></span>
                                </p>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <div id="new-leads-chart" data-colors="#0acf97"></div>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->



            <div class="col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="text-muted fw-normal mt-0 text-truncate" title="Booked Revenue">Plan</h5>
                                <h3 class="my-2 py-1">Monthly</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success me-2"><a href="" target="_blank">Renew Plan</a></span>
                                </p>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <div id="booked-revenue-chart" data-colors="#0acf97"></div>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        <!-- end row-->


        <div class="row">
            <div class="col-xl-12 col-lg-">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>
                        <h4 class="header-title mb-3">My Students</h4>

                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-nowrap table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>Students</th>
                                        <th>Centiis</th>
                                        <th>Average Score</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>
                                            <h5 class="font-15 mb-1 fw-normal">{{ $student->user->name }}</h5>
                                            <span class="text-muted font-13">{{ $student->school_name }}</span>
                                        </td>
                                        <td>{{ $student->credit }}</td>
                                        <td> </td>
                                        <td class="table-action">
                                            <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach




                                </tbody>
                            </table>
                        </div> <!-- end table-responsive-->

                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>
            <!-- end col-->

        </div>
        <!-- end row-->
    </div>
    <!-- container -->
</div> --}}

@endsection
