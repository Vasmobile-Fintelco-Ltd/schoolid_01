@extends('teachers.master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Centy Plus</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Brain Game Questions</a></li>
                    </ol>
                </div>
             
                   <a href="{{ route('post_game') }}" class="text-white btn btn-primary">Add Brain game Questions</a>
             

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Manage Brain Game</h4>

                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#buttons-table-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                Preview
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="buttons-table-preview">
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Created Date</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Action</th>
                                   
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($questions as $question)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $question->created_at }}</td>
                                        <td>{{ $question->question }}</td>  
                                        @if ($question->question_type === 'multiple_choice')
                                        <td>{{ $question->answer }}</td>  
                                        @else
                                        <td>AI Answer</td>  
                                        @endif  
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#editModal_{{ $question->id }}" title="Edit"><i class="mdi mdi-book-edit-outline"></i></a>

                                            <a href="#"  title="Delete" onclick="event.preventDefault(); deleteStudent('{{ route('delete_game', $question->id) }}');">
                                                <i class="mdi mdi-trash-can-outline"></i>
                                            </a>

                                            <form id="delete-form" method="POST" action="{{ route('delete_game', $question->id) }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td> 
                                         <!-- Edit Modal -->
                                         <div class="modal fade" id="editModal_{{ $question->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Question</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form id="editForm_{{ $question->id }}" method="POST" action="{{ route('update_game', $question->id) }}" enctype="multipart/form-data">
                                                            @csrf
                                                  
                                                        
                                                          
                                                        
                                                            <div class="row mb-3">
                                                                <label for="question_type_{{ $question->id }}" class="col-md-4 col-form-label text-md-end">{{ __('Question Type') }}</label>
                                                                <div class="col-md-6">
                                                                    <select id="question_type_{{ $question->id }}" name="question_type[]" class="form-control question-type-select" onchange="toggleOptions({{ $question->id }})">
                                                                        <option value="multiple_choice" {{ $question->question_type == 'multiple_choice' ? 'selected' : '' }}>Multiple Choice</option>
                                                                        <option value="no_option" {{ $question->question_type == 'no_option' ? 'selected' : '' }}>No Option</option>
                                                                    </select>
                                                                    @error('question_type')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        
                                                            <!-- Other fields like curriculum, levelquestion, year, education_level, topic, subtopic -->
                                                            

                                                      

                                                         

                                                        
                                                        
                                                        
                                                            <div class="row mb-3">
                                                                <label for="question_{{ $question->id }}" class="col-md-4 col-form-label text-md-end">Question</label>
                                                                <div class="col-md-6">
                                                                    <input id="question_{{ $question->id }}" type="text" value="{{ $question->question }}" class="form-control @error('questions') is-invalid @enderror" name="questions[]" required>
                                                                    @error('questions')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        
                                                            <!-- Options and correct answer fields, initially hidden if question type is "no_option" -->
                                                            <div id="options_container_{{ $question->id }}" style="{{ $question->question_type == 'no_option' ? 'display:none;' : '' }}">
                                                                <div class="row mb-3">
                                                                    <label for="option1_{{ $question->id }}" class="col-md-4 col-form-label text-md-end">{{ __('Option 1') }}</label>
                                                                    <div class="col-md-6">
                                                                        <input id="option1_{{ $question->id }}" type="text" value="{{ $question->option1 }}" class="form-control @error('option1') is-invalid @enderror" name="option1[]" {{ $question->question_type == 'no_option' ? 'disabled' : '' }}>
                                                                        @error('option1')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="option2_{{ $question->id }}" class="col-md-4 col-form-label text-md-end">{{ __('Option 2') }}</label>
                                                                    <div class="col-md-6">
                                                                        <input id="option2_{{ $question->id }}" type="text" value="{{ $question->option2 }}" class="form-control @error('option2') is-invalid @enderror" name="option2[]" {{ $question->question_type == 'no_option' ? 'disabled' : '' }}>
                                                                        @error('option2')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="option3_{{ $question->id }}" class="col-md-4 col-form-label text-md-end">{{ __('Option 3') }}</label>
                                                                    <div class="col-md-6">
                                                                        <input id="option3_{{ $question->id }}" type="text" value="{{ $question->option3 }}" class="form-control @error('option3') is-invalid @enderror" name="option3[]" {{ $question->question_type == 'no_option' ? 'disabled' : '' }}>
                                                                        @error('option3')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="option4_{{ $question->id }}" class="col-md-4 col-form-label text-md-end">{{ __('Option 4') }}</label>
                                                                    <div class="col-md-6">
                                                                        <input id="option4_{{ $question->id }}" type="text" value="{{ $question->option4 }}" class="form-control @error('option4') is-invalid @enderror" name="option4[]" {{ $question->question_type == 'no_option' ? 'disabled' : '' }}>
                                                                        @error('option4')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="answer_{{ $question->id }}" class="col-md-4 col-form-label text-md-end">{{ __('Correct Answer') }}</label>
                                                                    <div class="col-md-6">
                                                                        <select id="answer_{{ $question->id }}" name="answers[]" class="form-control @error('answers') is-invalid @enderror" {{ $question->question_type == 'no_option' ? 'disabled' : '' }}>
                                                                            <option value="option1" {{ $question->correct_answer == 'option1' ? 'selected' : '' }}>Option 1</option>
                                                                            <option value="option2" {{ $question->correct_answer == 'option2' ? 'selected' : '' }}>Option 2</option>
                                                                            <option value="option3" {{ $question->correct_answer == 'option3' ? 'selected' : '' }}>Option 3</option>
                                                                            <option value="option4" {{ $question->correct_answer == 'option4' ? 'selected' : '' }}>Option 4</option>
                                                                        </select>
                                                                        @error('answers')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        
                                                            <!-- Additional fields like hint, timer, question image, answer description -->
                                                        
                                                            {{-- <div class="row mb-3">
                                                                <label for="hint_{{ $question->id }}" class="col-md-4 col-form-label text-md-end">{{ __('Hint (Optional)') }}</label>
                                                                <div class="col-md-6">
                                                                    <input id="hint_{{ $question->id }}" type="text" class="form-control @error('hint') is-invalid @enderror" name="hint[]" value="{{ $question->hint }}">
                                                                    @error('hint')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div> --}}
                                                        
                                                            {{-- <div class="row mb-3">
                                                                <label for="timer_{{ $question->id }}" class="col-md-4 col-form-label text-md-end">{{ __('Timer (in seconds)') }}</label>
                                                                <div class="col-md-6">
                                                                    <input id="timer_{{ $question->id }}" type="number" min="0" class="form-control @error('timer') is-invalid @enderror" name="timer[]" value="{{ $question->timer }}">
                                                                    @error('timer')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div> --}}
                                                        
                                                            <div class="row mb-3">
                                                                <label for="question_image_{{ $question->id }}" class="col-md-4 col-form-label text-md-end">{{ __('Upload Question Image (Optional)') }}</label>
                                                                <div class="col-md-6">
                                                                    <input id="question_image_{{ $question->id }}" type="file" class="form-control @error('question_image') is-invalid @enderror" name="question_image[]">
                                                                    @error('question_image')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        
                                                            {{-- <div class="row mb-3">
                                                                <label for="answer_description_{{ $question->id }}" class="col-md-4 col-form-label text-md-end">{{ __('Answer Description') }}</label>
                                                                <div class="col-md-6">
                                                                    <textarea id="answer_description_{{ $question->id }}" name="answer_description[]" class="form-control @error('answer_description') is-invalid @enderror">{{ $question->answer_description }}</textarea>
                                                                    @error('answer_description')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                         --}}
                                                            <div class="row mb-0">
                                                                <div class="col-md-6 offset-md-4">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        {{ __('Update Question') }}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        
                                                        <script>
                                                            function toggleOptions(questionId) {
                                                                var questionType = document.getElementById('question_type_' + questionId).value;
                                                                var optionsContainer = document.getElementById('options_container_' + questionId);
                                                        
                                                                if (questionType === 'no_option') {
                                                                    optionsContainer.style.display = 'none';
                                                                    document.querySelectorAll('#options_container_' + questionId + ' input, #options_container_' + questionId + ' select').forEach(function(el) {
                                                                        el.disabled = true;
                                                                    });
                                                                } else {
                                                                    optionsContainer.style.display = 'block';
                                                                    document.querySelectorAll('#options_container_' + questionId + ' input, #options_container_' + questionId + ' select').forEach(function(el) {
                                                                        el.disabled = false;
                                                                    });
                                                                }
                                                            }
                                                        
                                                            document.addEventListener("DOMContentLoaded", function() {
                                                                toggleOptions({{ $question->id }});
                                                            });
                                                        </script>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                 

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- third party js -->
    <script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.select.min.js') }}"></script>

    <script>
        function deleteStudent(deleteUrl) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the deletion by submitting the form
                    document.getElementById('delete-form').action = deleteUrl;
                    document.getElementById('delete-form').submit();
                }
            });
        }
        
</script>

@endsection
