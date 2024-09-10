@extends('students.master')

@section('content')
<!-- Include Bootstrap and jQuery -->

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="mdk-drawer-layout js-mdk-drawer-layout"
data-push
data-responsive-width="992px">
<div class="mdk-drawer-layout__content page-content">

   
   <div class="page-section">
       <div class="container page__container" >
           <div class="row card-group-row" style="margin-top: 3rem !important;">

               <div class="col-md-6 col-lg-4 card-group-row__col">
                

                   <div class="card card--elevated posts-card-popular overlay card-group-row__card">
                       
                    <a                    href="{{ route('brain_game_play') }}">
                            <img src="{{ asset('back/public/images/paths/sketch_430x168.png') }}"
                            alt=""
                            class="card-img">
                       <div class="fullbleed "
                            style="opacity: .5"></div>
                       <div class="posts-card-popular__content ">
                           <div class="posts-card-popular__title card-body">
                           <span class="card-title"> Brain  Game</span> 
                           </div>
                       </div>
                    </a>

                   </div>

               </div>

               <div class="col-md-6 col-lg-4 card-group-row__col">

                <div class="card card--elevated posts-card-popular overlay card-group-row__card" >
                    <img src="{{ asset('back/public/images/paths/invision_430x168.png') }}" alt="" class="card-img">
                    <div class="fullbleed" style="opacity: .5"></div>
                    <div class="posts-card-popular__content mt-3">
                        <div class="posts-card-popular__title card-body">
                            <a class="card-title" href="#">Quizzes</a>
                        </div>
                    </div>
                </div>

               </div>

               <div class="col-md-6 col-lg-4 card-group-row__col  ">

                   <div class="card card--elevated posts-card-popular overlay card-group-row__card">
                       <img src="{{ asset('back/public/images/paths/photoshop_430x168.png') }}"
                            alt=""
                            class="card-img">
                       <div class="fullbleed"
                            style="opacity: .5"></div>
                       <div class="posts-card-popular__content mt-3">
                           <div class="posts-card-popular__title card-body">
                               <a class="card-title"
                                  href="#">Exams</a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <div class="container page__container page-section "  style="padding-top:0px; margin-top:-5px; ">
       
    <div class="page-separator">
        <div class="page-separator__text mt-2 mb-3"> RESULTS</div>
    </div>
   </div>

   <div class="container page__container page-section  hadow-lg"  style="padding-top:0px; margin-top:-5px; ">
       
      

       

       <div class="card mb-lg-32pt shadow-lg">

      
            <ul class="nav nav-tabs" id="resultTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="brain-game-tab" data-toggle="tab" href="#brain-game" role="tab" aria-controls="brain-game" aria-selected="true">Brain Game</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="quiz-tab" data-toggle="tab" href="#quiz" role="tab" aria-controls="quiz" aria-selected="false">Quiz</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="examind-tab" data-toggle="tab" href="#examind" role="tab" aria-controls="examind" aria-selected="false">Examind</a>
                </li>
            </ul>
        
            <div class="tab-content" id="resultTabContent">
                <!-- Brain Game Tab -->
                <div class="tab-pane fade show active" id="brain-game" role="tabpanel" aria-labelledby="brain-game-tab">
                    <div class="table-responsive" data-toggle="lists" data-lists-sort-by="js-lists-values-date" data-lists-sort-desc="true" data-lists-values='["js-lists-values-name", "js-lists-values-company", "js-lists-values-phone", "js-lists-values-date"]'>
                        <table class="table table-striped dt-responsive nowrap w-100" style="padding: 30px">
                            <thead style="height:40px;background:#e9edf2;">
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Centiis</th>
                                    <th>Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brainGameresults as $brainGameresult)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $brainGameresult->created_at->format('Y:m:d') }}</td>
                                    <td>{{ $brainGameresult->created_at->format('h:i A') }}</td>
                                    <td>{{ $brainGameresult->yes_ans }}</td>
                                    <td>{{ number_format(($brainGameresult->yes_ans) / (($brainGameresult->yes_ans) + $brainGameresult->no_ans) * 100, 2) }} %</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        
                <!-- Quiz Tab -->
                <div class="tab-pane fade" id="quiz" role="tabpanel" aria-labelledby="quiz-tab">
                    <div class="table-responsive" data-toggle="lists" data-lists-sort-by="js-lists-values-date" data-lists-sort-desc="true" data-lists-values='["js-lists-values-name", "js-lists-values-company", "js-lists-values-phone", "js-lists-values-date"]'>
                     
                        <!-- Add your quiz table or content here -->
                        <table class="table table-striped dt-responsive nowrap w-100" style="padding: 30px">
                            <thead style="height:40px;background:#e9edf2;">
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Centiis</th>
                                    <th>Score</th>
                                </tr>
                            </thead>
                            
                        </table>
                    </div>
                </div>
        
                <!-- Examind Tab -->
                <div class="tab-pane fade" id="examind" role="tabpanel" aria-labelledby="examind-tab">
                    <div class="table-responsive" data-toggle="lists" data-lists-sort-by="js-lists-values-date" data-lists-sort-desc="true" data-lists-values='["js-lists-values-name", "js-lists-values-company", "js-lists-values-phone", "js-lists-values-date"]'>
                        <table class="table table-striped dt-responsive nowrap w-100" style="padding: 30px">
                            <thead style="height:40px;background:#e9edf2;">
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Centiis</th>
                                    <th>Score</th>
                                </tr>
                            </thead>
                            
                        </table></div>
                </div>
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

<div class="mdk-drawer js-mdk-drawer"
    id="default-drawer">
   <div class="mdk-drawer__content">
       <div class="sidebar sidebar-dark-pickled-bluewood sidebar-left"
            data-perfect-scrollbar>

           <!-- Sidebar Content -->

           <a href="index.html"
              class="sidebar-brand ">
               <span class="avatar avatar-xl sidebar-brand-icon h-auto">

                   <span class="avatar-title rounded bg-primary"><img src="{{ asset('back/public/images/illustration/student/128/skoolid-logo.png') }}"
                            class="img-fluid"
                            alt="logo" /></span>
               </span>
           </a>

           <div class="sidebar-heading">Student</div>
           <ul class="sidebar-menu">

               <li class="sidebar-menu-item active">
                   <a class="sidebar-menu-button"
                      href="index.html">
                       <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">home</span>
                       <span class="sidebar-menu-text">Home</span>
                   </a>
               </li>
               
               <li class="sidebar-menu-item">
                   <a class="sidebar-menu-button"
                      href="results.html">
                       <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">style</span>
                       <span class="sidebar-menu-text">Results</span>
                   </a>
               </li>
               
               </li>
               
               <li class="sidebar-menu-item">
                   <a class="sidebar-menu-button"
                      href="wallet.html">
                       <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">assignment_turned_in</span>
                       <span class="sidebar-menu-text">Wallet</span>
                   </a>
               </li>
               <li class="sidebar-menu-item">
                   <a class="sidebar-menu-button"
                      href="wallet.html">
                      <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">account_box</span>
                       <span class="sidebar-menu-text">Attendance</span>
                   </a>
               </li>

               <li class="sidebar-menu-item">
                   <a class="sidebar-menu-button"
                      href="wallet.html">
                      <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">timeline</span>
                       <span class="sidebar-menu-text">Referral</span>
                   </a>
               </li>
               <li class="sidebar-menu-item">
                   <a class="sidebar-menu-button"
                      href="wallet.html">
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
<script>
   $('.card-group-row__card').on('click', function() {
    $('#comingSoonModal').modal('show');
});


</script>
@endsection
