@extends('students.master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/quiz.css') }}" type="text/css">
    <link
        href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"
        rel="stylesheet"  type='text/css'>
@endsection

@section('content')
    @if ($questions->isEmpty())
        <p>No questions available for this exam.</p>
    @else
    @if ($student->brain_game_status == 0)
    <div class="start_btn"><button>Start Quiz</button></div> 
    
   
       
        <!-- Info Box -->
        <div class="info_box">
            <div class="info-title"><span>Some Rules of this Brain Game</span></div>
            <div class="info-list">
                <div class="info">1. You will have only <span>15 seconds</span> per each question.</div>
                <div class="info">2. Once you select your answer, it can't be undone.</div>
                <div class="info">3. You can't select any option once time goes off.</div>
                <div class="info">4. You can't exit from the Quiz while you're playing.</div>
                <div class="info">5. You'll get points on the basis of your correct answers.</div>
            </div>
            <div class="buttons">
                <button class="quit" >Exit </button>
                <button class="restart">Continue</button>
            </div>
        </div>

        <!-- Quiz Box -->


        <div class="quiz_box">
            <header>
                <div class="title">Centy Plus Brain Game</div>
                <div class="timer">
                    <div class="time_left_txt">Time Left</div>
                    <div class="timer_sec">15</div>
                </div>
                <div class="time_line"></div>
            </header>
           

            <section>

                <div class="que_curriculum">
                    <!-- Here I've inserted question from JavaScript -->
                </div>

                <div class="que_text">
                    <!-- Here I've inserted question from JavaScript -->

                </div>
                <div class="que_image">
                    <!-- The image will be displayed here -->
                </div>
                <div class="option_list">
                    <!-- Here I've inserted options from JavaScript -->
                </div>

            </section>
            <!-- footer of Quiz Box -->
            <footer>
                <div class="total_que" style="color: #fff">
                    <!-- Here I've inserted Question Count Number from JavaScript -->
                </div>
                <button class="next_btn">Next Que</button>
            </footer>
        </div>
        @elseif($student->brain_game_status == 0) 
        <a href="" class="mainbtn start_btn" title="Activate Account" data-student-id="{{ $student->id }}" id="activate-account-link" data-bs-toggle="modal" data-bs-target="#planmodal">
            <i class="mdi mdi-book-edit-outline"></i>Activate Brain Game
        </a>
        <div class="modal fade" id="planmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Choose Brain Game as Plan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" action="">
                            @csrf
                        
                            <div class="row mb-4">
                                <label for="subscription_plan" class="col-md-4 col-form-label text-md-end fw-bold">
                                    <i class="uil uil-layer-group me-1"></i> {{ __('Select a Plan') }}
                                </label>
                        
                                <div class="col-md-6">
                                    <select id="subscription_plan" name="subscription_plan" class="form-select form-control @error('subscription_plan') is-invalid @enderror">
                                        <option value="" disabled selected>Select a Plan</option>
                                        @foreach($subscription_plans as $subscription_plan)
                                            <option value="{{ $subscription_plan->name }}" style="font-size: 17px">Brain Game</option>
                                        @endforeach
                                    </select>
                        
                                    @error('subscription_plan')
                                    <span class="invalid-feedback d-block mt-2">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-4">
                                <label for="subscription_plan_price" class="col-md-4 col-form-label text-md-end fw-bold">
                                    <i class="uil uil-usd-circle me-1"></i> {{ __('Price') }}
                                </label>
                        
                                <div class="col-md-6">
                                    <input id="subscription_plan_price" type="text" class="form-control form-control @error('subscription_plan_price') is-invalid @enderror" name="subscription_plan_price" placeholder="Price will auto-fill" required autofocus disabled>
                        
                                    @error('subscription_plan_price')
                                    <span class="invalid-feedback d-block mt-2">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="button" class="mainbtn btn w-100" id="purchase_plan">
                                        {{ __('Purchase Plan') }} <i class="uil uil-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    @endif
    @endif
    <!-- Result Box -->
    <div class="result_box">
        <div class="icon">
            <i class="fas fa-crown"></i>
        </div>
        <div class="complete_text">Congratulations You've completed the Brain Game!</div>
        <div class="score_text">
            <!-- Here I've inserted Score Result from JavaScript -->
        </div>
        <div class="buttons">
            <button class="quit">Finish Brain</button>
        </div>
    </div>
    <style>
         .mainbtn{
                background: #00c6ff;
                background: -webkit-linear-gradient(to right, #0072ff, #00c6ff);
                background: linear-gradient(to right, #0072ff, #00c6ff);
                border: none;
                color: white;
                padding: 10px 20px;
                border-radius: 50px;
                cursor: pointer;
                transition: all 0.3s ease;
                margin: 5px;
            }
  .correct {
        color: white;
      width: 100%;            
      border-radius:5px;
      background-color: green;
      padding: 5px;
  }
  
  .incorrect {
      color: white;
      width: 100%;            
      border-radius:5px;
      background-color: red;
      padding: 5px;

  }
  
  .result-message {
      font-weight: bold;
      margin-bottom: 10px;
  }
  </style>
  <style>
      body {
          font-family: 'Poppins', sans-serif;
          background: linear-gradient(135deg, #1e3c72, #2a5298);
          color: #0f0f0f;
          margin: 0;
          padding: 0;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
      }
      
      .quiz_box {
          background: rgba(255, 255, 255, 0.1);
          padding: 20px;
          border-radius: 10px;
          box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
         
      }
      
     
    
      
      .start_btn button:hover, .buttons button:hover, .next_btn:hover {
          background: #005cbb;
      }
      
      .timer {
          display: flex;
          justify-content: space-between;
          align-items: center;
          background: #0072ff;
          padding: 10px;
          border-radius: 50px;
          color: white;
          margin-bottom: 20px;
          
      }
      
      
      @keyframes fadeIn {
          from { opacity: 0; transform: translateY(20px); }
          to { opacity: 1; transform: translateY(0); }
      }

      .correct-answer {
            margin-top: 10px; /* Adds space above the correct answer */
            padding: 5px; /* Adds some padding inside the correct answer box */

            color: white; /* Text color inside the green background */
            background-color: green; /* Green background for the correct answer */
            border-radius: 5px; /* Adds rounded corners to the background */
            display: inline-block; /* Ensures the background only covers the text */

            }
  </style>

@endsection

@section('scripts')
<script>
     const subscription_plans = @json($subscription_plans);

// When the subscription plan dropdown value changes
$('#subscription_plan').change(function() {
    var planId = $(this).val();
    var selectedPlan = subscription_plans.find(function(plan) {
        return plan.name === planId;
    });

    // Display the price of the selected plan
    $('#subscription_plan_price').val(selectedPlan.price);
});

$(document).on('click', '#activate-account-link', function(e) {
    e.preventDefault();
    studentId = $(this).data('student-id');
    console.log('Student ID:', studentId);
});
//send form request to activate student account
            $('#purchase_plan').on('click', function(e) {
                e.preventDefault();

                // Make an AJAX request to fetch the education levels for the selected education system
                $.ajax({
                    url: '{{ route('stk_push.brain_game') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        student_id: studentId,
                        subscription_plan_price: $('#subscription_plan_price').val(),
                        subscription_plan_name: $('#subscription_plan').val(),
                    },
                    success: function(response) {
                        console.log(response);
                        $('#planmodal').modal('toggle');
                        alert(response.message);
                        if (response.success === "0") {
                            console.log(response);
                            window.location.href = "{{ route('student.dashboard') }}";
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
                // Show the "topicsBackdrop" modal when the "Add a Topic" button is clicked
                $('#datatable-buttons').on('click', '.btn-primary[data-target="#topicsBackdrop"]', function() {
                    $('#topicsBackdrop').modal('show');
                });
            });

</script>
    <script>
        //selecting all required elements
        const start_btn = document.querySelector(".start_btn button");
        const info_box = document.querySelector(".info_box");
        const exit_btn = info_box.querySelector(".buttons .quit");
        const continue_btn = info_box.querySelector(".buttons .restart");
        const quiz_box = document.querySelector(".quiz_box");
        const result_box = document.querySelector(".result_box");
        const option_list = document.querySelector(".option_list");
        const time_line = document.querySelector("header .time_line");
        const timeText = document.querySelector(".timer .time_left_txt");
        const timeCount = document.querySelector(".timer .timer_sec");

        // Variable to store the user's score
        let answers = [];


        // if startQuiz button clicked
        start_btn.onclick = ()=>{
            info_box.classList.add("activeInfo"); //show info box
        }

        // if exitQuiz button clicked
        exit_btn.onclick = ()=>{
            info_box.classList.remove("activeInfo"); //hide info box
        }

        // if continueQuiz button clicked
        continue_btn.onclick = ()=>{
            info_box.classList.remove("activeInfo"); //hide info box
            quiz_box.classList.add("activeQuiz"); //show quiz box
            showQuetions(0); //calling showQestions function
            queCounter(1); //passing 1 parameter to queCounter
            startTimer(15); //calling startTimer function
            startTimerLine(0); //calling startTimerLine function
        }

        let timeValue =  15;
        let que_count = 0;
        let que_numb = 1;
        let userScore = 0;
        let counter;
        let counterLine;
        let widthValue = 0;

        const quit_quiz = result_box.querySelector(".buttons .quit");


        // if quitQuiz button clicked
        quit_quiz.onclick = ()=>{
            window.location.reload(); //reload the current window
        }

        const next_btn = document.querySelector("footer .next_btn");
        const bottom_ques_counter = document.querySelector("footer .total_que");

        let test_questions = {!! json_encode($formatedQuestions) !!};

        // if Next Que button clicked
        next_btn.onclick = ()=>{
            if(que_count < test_questions.length - 1){ //if question count is less than total question length
                que_count++; //increment the que_count value
                que_numb++; //increment the que_numb value
                showQuetions(que_count); //calling showQestions function
                queCounter(que_numb); //passing que_numb value to queCounter
                clearInterval(counter); //clear counter
                clearInterval(counterLine); //clear counterLine
                startTimer(timeValue); //calling startTimer function
                startTimerLine(widthValue); //calling startTimerLine function
                timeText.textContent = "Time Left"; //change the timeText to Time Left
                next_btn.classList.remove("show"); //hide the next button
            }else{
                clearInterval(counter); //clear counter
                clearInterval(counterLine); //clear counterLine
                showResult(); //calling showResult function
            }
        }


        // getting testq and options from array
        function showQuetions(index) {
                const que_text = document.querySelector(".que_text");
                const que_image = document.querySelector(".que_image");
                const option_list = document.querySelector(".option_list"); // Make sure this element exists in your HTML
                const que_curriculum = document.querySelector(".que_curriculum");

                //creating a new span and div tag for question and passing the value using array index
                let que_tag = '<span>' + test_questions[index].numb + ". " + test_questions[index].question + '</span>';
                que_text.innerHTML = que_tag; //adding new span tag inside que_tag

                // Check if the question has an image
                if (test_questions[index].image) {
                    // If the question has an image, display it in the que_image element
                    que_image.innerHTML = '<img src="/storage/assets/images/exam_images/' + test_questions[index].image +
                        '" alt="Question Image">';
                } else {
                    // If the question doesn't have an image, remove the image from the que_image element
                    que_image.innerHTML = '';
                }

                if (test_questions[index].year && test_questions[index].curriculum) {
                    // If the question has both year and curriculum, display them
                    let input_tag = `
                        <div class="row">
                        <div class="col-md-6">
                        <div class="mainbtn"><strong>Question Year: ${test_questions[index].year} </strong></div>
                        </div>
                        <div class="col-md-6">
                     <div class="mainbtn"><strong>Curriculum:  ${test_questions[index].curriculum} </strong></div>
                    </div>
                        `;
                    que_curriculum.innerHTML = input_tag;
                } else {
                    // If the question doesn't have year or curriculum, clear the que_curriculum element
                    que_curriculum.innerHTML = '';
                }
                // Clear previous options or input
                option_list.innerHTML = '';

                if (test_questions[index].question_type === 'multiple_choice') {
                    // Display options for multiple choice questions
                    let option_tag = '';
                    test_questions[index].options.forEach(option => {
                        option_tag += '<div class="option"><span>' + option + '</span></div>';
                    });
                    option_list.innerHTML = option_tag; // adding new div tag inside option_list

                    const options = option_list.querySelectorAll(".option");
                    // set onclick attribute to all available options
                    for (let i = 0; i < options.length; i++) {
                        options[i].setAttribute("onclick", "optionSelected(this)");
                    }
                } else if (test_questions[index].question_type === 'no_option') {
                   
                    let input_tag = `
                <div id="no_option_container">
                <div id="result" class="result-message"></div>
                <div class="input-field"><textarea  class="form-control"  type="text" id="user_answer" placeholder="Type your answer here"></textarea></div>
                <button onclick="submitNoOptionAnswer()" class="mainbtn  mt-3 text-white">Submit Answer</button>
                </div>`;
                    option_list.innerHTML = input_tag;
                 
                }
            }
        // creating the new div tags which for icons
        let tickIconTag = '<div class="icon tick"><i class="fa fa-check"></i></div>';
        let crossIconTag = '<div class="icon cross"><i class="fa fa-times"></i></div>';

        //

        //if user clicked on option
        function optionSelected(answer){
            clearInterval(counter); //clear counter
            clearInterval(counterLine); //clear counterLine
            let userAns = answer.textContent; //getting user selected option
            let correcAns = test_questions[que_count].answer; //getting correct answer from array
            const allOptions = option_list.children.length; //getting all option items

            if(userAns === correcAns){ //if user selected option is equal to array's correct answer
                userScore += 1; //upgrading score value with 1
                answer.classList.add("correct"); //adding green color to correct selected option
                answer.insertAdjacentHTML("beforeend", tickIconTag); //adding tick icon to correct selected option
                console.log("Correct Answer");
                console.log("Your correct answers = " + userScore);
            }else{
                answer.classList.add("incorrect"); //adding red color to correct selected option
                answer.insertAdjacentHTML("beforeend", crossIconTag); //adding cross icon to correct selected option
                console.log("Wrong Answer");
                console.log("Correct Answer from Array: " + userAns);

                for(i=0; i < allOptions; i++){
                    if(option_list.children[i].textContent === correcAns){ //if there is an option which is matched to an array answer
                        option_list.children[i].setAttribute("class", "option correct"); //adding green color to matched option
                        option_list.children[i].insertAdjacentHTML("beforeend", tickIconTag); //adding tick icon to matched option
                        console.log("Auto selected correct answer.");
                    }
                }
            }
            answers.push({
                question: test_questions[que_count].question,
                answer: userAns,
            });

            for(i=0; i < allOptions; i++){
                option_list.children[i].classList.add("disabled"); //once user select an option then disabled all options
            }
            next_btn.classList.add("show"); //show the next button if user selected any option
        }

        async function submitNoOptionAnswer() {
                clearInterval(counter); // clear counter
                clearInterval(counterLine); // clear counterLine
                const userAns = document.getElementById('user_answer').value; // getting user input
                const question = test_questions[que_count].question;

                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // Call your server-side endpoint to evaluate the answer using ChatGPT
                const response = await fetch('/student/evaluate-answer', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        question: question,
                        answer: userAns
                    })
                });

                const result = await response.json();
                const resultMessage = document.getElementById('result'); // Get the result element
                //const correctAnswer = result.correct_answer ;

                if (result.result === 'correct') {
                    userScore += 1; // upgrading score value with 1
                    resultMessage.textContent = "Congrats! 🎉 Correct Answer !";
                    resultMessage.classList.add("correct"); // adding green color to correct answer
                    resultMessage.classList.remove("incorrect");
                    console.log("Correct Answer");
                    console.log("Your correct answers = " + userScore);
                   
                } else {
                    let correctAnswerDiv = document.createElement("div");
                    correctAnswerDiv.textContent = "The correct answer is: "  + result.correct_answer;
                    correctAnswerDiv.classList.add("correct-answer");

                    // Clear previous message and append the new content
                    resultMessage.textContent = "Sorry 😐 Incorrect Answer."; 
                    resultMessage.classList.add("incorrect"); // adding red color to incorrect answer
                    resultMessage.classList.remove("correct");

                    // Append the correct answer div to the result message
                    resultMessage.appendChild(correctAnswerDiv);

                    console.log("Wrong Answer");
                }

                answers.push({
                    question: question,
                    answer: userAns,
                });

                document.getElementById('user_answer').disabled = true; // disable the input field after submission
                next_btn.classList.add("show"); // show the next button after answer submission
            }


        function showResult(){
            info_box.classList.remove("activeInfo"); //hide info box
            quiz_box.classList.remove("activeQuiz"); //hide quiz box
            result_box.classList.add("activeResult"); //show result box
            const scoreText = result_box.querySelector(".score_text");
            // Retrieve the CSRF token from a meta tag in your HTML layout or from a JavaScript variable
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const studentId = {!! json_encode($student->id) !!};
            const name = {!! json_encode($user->name ." 's Brain Game on ". date('m-d-Y')) !!};
            const yesAns = userScore;
            const noAns = test_questions.length - userScore;
            const resultJson = {
                student_id: studentId,
                name: name,
                yes_ans: yesAns,
                no_ans: noAns,
                answers: answers,
            };
            const marksObtained = yesAns;

            const resultData = {
                student_id: studentId,
                name: name,
                yes_ans: yesAns,
                no_ans: noAns,
                result_json: resultJson,

                marks_obtained: marksObtained,
            };

            // Make an AJAX request to the Laravel endpoint
            fetch('{{ route('brain_game.submit') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken, // Include the CSRF token in the request header
                },
                body: JSON.stringify(resultData),
            })
                .then(response => response.json())
                .then(data => {
                    // Handle the response from the server
                    console.log(data);
                    // You can perform further actions based on the response
                })
                .catch(error => {
                    // Handle any errors that occurred during the request
                    console.error(error);
                });


            if (userScore > 3){ // if user scored more than 3
                //creating a new span tag and passing the user score number and total question number
                let scoreTag = '<span>and congrats! 🎉, You got <p>'+ userScore +'</p> out of <p>'+ test_questions.length +'</p></span>';
                scoreText.innerHTML = scoreTag;  //adding new span tag inside score_Text
            }
            else if(userScore > 1){ // if user scored more than 1
                let scoreTag = '<span>and nice 😎, You got <p>'+ userScore +'</p> out of <p>'+ test_questions.length +'</p></span>';
                scoreText.innerHTML = scoreTag;
            }
            else{ // if user scored less than 1
                let scoreTag = '<span>and sorry 😐, You got only <p>'+ userScore +'</p> out of <p>'+ test_questions.length +'</p></span>';
                scoreText.innerHTML = scoreTag;
            }

        }

        function startTimer(time){
            counter = setInterval(timer, 1000);
            function timer(){
                timeCount.textContent = time; //changing the value of timeCount with time value
                time--; //decrement the time value
                if(time < 9){ //if timer is less than 9
                    let addZero = timeCount.textContent;
                    timeCount.textContent = "0" + addZero; //add a 0 before time value
                }
                if(time < 0){ //if timer is less than 0
                    clearInterval(counter); //clear counter
                    timeText.textContent = "Time Off"; //change the time text to time off
                    const allOptions = option_list.children.length; //getting all option items
                    let correcAns = test_questions[que_count].answer; //getting correct answer from array
                    for(i=0; i < allOptions; i++){
                        if(option_list.children[i].textContent === correcAns){ //if there is an option which is matched to an array answer
                            option_list.children[i].setAttribute("class", "option correct"); //adding green color to matched option
                            option_list.children[i].insertAdjacentHTML("beforeend", tickIconTag); //adding tick icon to matched option
                            console.log("Time Off: Auto selected correct answer.");
                        }
                    }
                    for(i=0; i < allOptions; i++){
                        option_list.children[i].classList.add("disabled"); //once user select an option then disabled all options
                    }
                    next_btn.classList.add("show"); //show the next button if user selected any option
                }
            }
        }

        function startTimerLine(time){
            counterLine = setInterval(timer, 29);
            function timer(){
                time += 1; //upgrading time value with 1
                time_line.style.width = time + "px"; //increasing width of time_line with px by time value
                if(time > 549){ //if time value is greater than 549
                    clearInterval(counterLine); //clear counterLine
                }
            }
        }

        function queCounter(index){
            //creating a new span tag and passing the question number and total question
            let totalQueCounTag = '<span><p>'+ index +'</p> of <p>'+ test_questions.length +'</p> Questions</span>';
            bottom_ques_counter.innerHTML = totalQueCounTag;  //adding new span tag inside bottom_ques_counter
        }

    </script>
@endsection

