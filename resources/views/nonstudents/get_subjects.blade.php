@extends('students.master')

@section('content')

<div class="container">
    <div class="row">
        @foreach ($subjects as $subject)
        @php
        $examId = App\Models\Exam::where('subject_id', $subject->id)->value('id'); 
       
        @endphp
            <div class="col-md-4">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

                <div class="card custom-card mainbtn">
                  <div class="card-body ">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="title">Subject</h5>
                        </div>
                        
                        <div class="col-md-6">
                            {{ $subject->name }}
                        </div>
                        <div class="col-md-6">
                          <h5 class="title">Education Level</h5>  
                        </div>
                        
                        <div class="col-md-6">
                            {{ $subject->educationLevel->name }}
                        </div>
                    </div>
                    
                    
                    <a href="{{ route('show_questions', $examId) }}" class="mainbtnn  mx-auto d-block w-50 mt-3  text-center">View Questions</a>
                  </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<style>.custom-card {
    border: 1px solid #ccc;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease-in-out;
  }
  
  .custom-card:hover {
    box-shadow: 0 8px 16px rgba(0, 0,   
   0, 0.2);
  }
  
  .mainbtn{
                background: #00c6ff;
                background: -webkit-linear-gradient(to right, #0072ff, #00c6ff);
                background: linear-gradient(to right, #0072ff, #00c6ff);
                border: none;
                color: white;
                padding: 10px 20px;
                border-radius: 15px;
                cursor: pointer;
                transition: all 0.3s ease;
                margin: 5px;
            }
            .mainbtnn{
                background: #00c6ff;
                background: -webkit-linear-gradient(to right, #0072ff, #00c6ff);
                background: linear-gradient(to right, #eceef1, #bdc2c4);
                border: none;
                color: rgb(17, 17, 17);
                padding: 10px 20px;
                border-radius: 50px;
                cursor: pointer;
                transition: all 0.3s ease;
                margin: 5px;
            }
            </style>


@endsection
