@extends('students.master')

@section('styles')
    <link
        href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"
        rel="stylesheet"  type='text/css'>
        <style>

            ::selection{
                color: #fff;
                background: #007bff;
            }
            
            .start_btn,
            .info_box,
            .quiz_box,
            .result_box{
                position: absolute;
                top: 50%;
                left: 50%;
            }
            
            .info_box.activeInfo,
            .quiz_box.activeQuiz,
             .start_btn,
            .result_box.activeResult{
                opacity: 1;
                z-index: 5;
                pointer-events: auto;
                transform: translate(-50%, -50%) scale(1);
            }
            
            .start_btn button{
                font-size: 25px;
                font-weight: 500;
                color: #007bff;
                padding: 15px 30px;
                outline: none;
                border: none;
                border-radius: 5px;
                background: #fff;
                cursor: pointer;
            }
            
            .info_box{
                width: 540px;
                background: #fff;
                border-radius: 5px;
                transform: translate(-50%, -50%) scale(0.9);
                opacity: 0;
                pointer-events: none;
                transition: all 0.3s ease;
            }
            
            .info_box .info-title{
                height: 60px;
                width: 100%;
                border-bottom: 1px solid lightgrey;
                display: flex;
                align-items: center;
                padding: 0 30px;
                border-radius: 5px 5px 0 0;
                font-size: 20px;
                font-weight: 600;
            }
            
            .info_box .info-list{
                padding: 15px 30px;
            }
            
            .info_box .info-list .info{
                margin: 5px 0;
                font-size: 17px;
            }
            
            .info_box .info-list .info span{
                font-weight: 600;
                color: #007bff;
            }
            .info_box .buttons{
                height: 60px;
                display: flex;
                align-items: center;
                justify-content: flex-end;
                padding: 0 30px;
                border-top: 1px solid lightgrey;
            }
            
            .info_box .buttons button{
                margin: 0 5px;
                height: 40px;
                width: 100px;
                font-size: 16px;
                font-weight: 500;
                cursor: pointer;
                border: none;
                outline: none;
                border-radius: 5px;
                border: 1px solid #007bff;
                transition: all 0.3s ease;
            }
            
            .quiz_box{
               width: 100% !important; 
                background: #fff;
                border-radius: 5px;
                transform: translate(-50%, -50%) scale(0.9);
                opacity: 0;
                pointer-events: none;
                transition: all 0.3s ease;
            }
            
            .quiz_box header{
                position: relative;
                z-index: 2;
                height: 70px;
                padding: 0 30px;
                background: #fff;
           
                display: flex;
                align-items: center;
                justify-content: space-between;
                box-shadow: 0px 3px 5px 1px rgba(0,0,0,0.1);
            }
            
            .quiz_box header .title{
                font-size: 20px;
                font-weight: 600;
            }
            
            .quiz_box header .timer{
                color: #004085;
                background: #cce5ff;
                border: 1px solid #b8daff;
                height: 45px;
                padding: 0 8px;
                border-radius: 5px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: 145px;
            }
            
            .quiz_box header .timer .time_left_txt{
                font-weight: 400;
                font-size: 17px;
                user-select: none;
            }
            
            .quiz_box header .timer .timer_sec{
                font-size: 18px;
                font-weight: 500;
                height: 30px;
                width: 45px;
                color: #fff;
                border-radius: 5px;
                line-height: 30px;
                text-align: center;
                background: #343a40;
                border: 1px solid #343a40;
                user-select: none;
            }
            
            .quiz_box header .time_line{
                position: absolute;
                bottom: 0px;
                left: 0px;
                height: 3px;
                background: #007bff;
            }
            
            section{
                padding: 25px 30px 20px 30px;
                background: #fff;
            }
            
            section .que_text{
                font-size: 30px !important;
                font-weight: 600;
            }
            
            section .option_list{
                
                display: block;
            }
            
            section .option_list .option{
                background: aliceblue;
                border: 1px solid #84c5fe;
                border-radius: 5px;
                padding: 8px 15px;
                font-size: 17px;
                margin-bottom: 15px;
                cursor: pointer;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            
            section .option_list .option:last-child{
                margin-bottom: 0px;
            }
            
            section .option_list .option:hover{
                color: #004085;
                background: #cce5ff;
                border: 1px solid #b8daff;
            }
            
            section .option_list .option.correct{
                color: #155724;
                background: #d4edda;
                border: 1px solid #c3e6cb;
            }
            
            section .option_list .option.incorrect{
                color: #721c24;
                background: #f8d7da;
                border: 1px solid #f5c6cb;
            }
            
            section .option_list .option.disabled{
                pointer-events: none;
            }
            
            section .option_list .option .icon{
                height: 26px;
                width: 26px;
                border: 2px solid transparent;
                border-radius: 50%;
                text-align: center;
                font-size: 13px;
                pointer-events: none;
                transition: all 0.3s ease;
                line-height: 24px;
            }
            .option_list .option .icon.tick{
                color: #23903c;
                border-color: #23903c;
                background: #d4edda;
            }
            
            .option_list .option .icon.cross{
                color: #a42834;
                background: #f8d7da;
                border-color: #a42834;
            }
            
            footer{
                height: 60px;
                padding: 0 30px;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            
            footer .total_que span{
                display: flex;
                user-select: none;
            }
            
            footer .total_que span p{
                font-weight: 500;
                padding: 0 5px;
            }
            
            footer .total_que span p:first-child{
                padding-left: 0px;
            }
            
            footer button{
                height: 40px;
                padding: 0 13px;
                font-size: 18px;
                font-weight: 400;
                cursor: pointer;
                border: none;
                outline: none;
                color: #fff;
                border-radius: 5px;
                background: #007bff;
                border: 1px solid #007bff;
                line-height: 10px;
                opacity: 0;
                pointer-events: none;
                transform: scale(0.95);
                transition: all 0.3s ease;
            }
            
            footer button:hover{
                background: #0263ca;
            }
            
            footer button.show{
                opacity: 1;
                pointer-events: auto;
                transform: scale(1);
            }
            
            .result_box{
                background: #fff;
                border-radius: 5px;
                display: flex;
                padding: 25px 30px;
                width: 450px;
                align-items: center;
                flex-direction: column;
                justify-content: center;
                transform: translate(-50%, -50%) scale(0.9);
                opacity: 0;
                pointer-events: none;
                transition: all 0.3s ease;
            }
            
            .result_box .icon{
                font-size: 100px;
                color: #007bff;
                margin-bottom: 10px;
            }
            
            .result_box .complete_text{
                font-size: 20px;
                font-weight: 500;
            }
            
            .result_box .score_text span{
                display: flex;
                margin: 10px 0;
                font-size: 18px;
                font-weight: 500;
            }
            
            .result_box .score_text span p{
                padding: 0 4px;
                font-weight: 600;
            }
            
            .result_box .buttons{
                display: flex;
                margin: 20px 0;
            }
            
            .result_box .buttons button{
                margin: 0 10px;
                height: 45px;
                padding: 0 20px;
                font-size: 18px;
                font-weight: 500;
                cursor: pointer;
                border: none;
                outline: none;
                border-radius: 5px;
                border: 1px solid #007bff;
                transition: all 0.3s ease;
            }
            
            .buttons button.restart{
                color: #fff;
                background: #007bff;
            }
            
            .buttons button.restart:hover{
                background: #0263ca;
            }
            
            .buttons button.quit{
                color: #007bff;
                background: #fff;
            }
            
            .buttons button.quit:hover{
                color: #fff;
                background: #007bff;
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
                  <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap"
        rel="stylesheet">

  <!-- Preloader -->
  <link type="text/css"
        href="{{ asset('back/public/vendor/spinkit.css') }}"
        rel="stylesheet">

  <!-- Perfect Scrollbar -->
  <link type="text/css"
        href="{{ asset('back/public/vendor/perfect-scrollbar.css') }}"
        rel="stylesheet">

  <!-- Material Design Icons -->
  <link type="text/css"
        href="{{ asset('back/public/css/material-icons.css') }}"
        rel="stylesheet">

  <!-- Font Awesome Icons -->
  <link type="text/css"
        href="{{ asset('back/public/css/fontawesome.css') }}"
        rel="stylesheet">

  <!-- Preloader -->
  <link type="text/css"
        href="{{ asset('back/public/css/preloader.css') }}"
        rel="stylesheet">

  <!-- App CSS -->
  <link type="text/css"
        href="{{ asset('back/public/css/app.css') }}"
        rel="stylesheet">
@endsection

@section('content')
    @if ($questions->isEmpty())
        <p>No questions available for this exam.</p>
    @else
   <div class="container">
    <div class="row  " style=margin-top:18rem>
        <div class="col-md-12">
            <div class="start_btn" style=" 
                margin: 0 10px;
                height: 45px;
                padding: 0 20px;
                font-size: 18px;
                font-weight: 500;
                cursor: pointer;
                border: none;
                outline: none;
                border-radius: 5px;
                border: 1px solid #007bff;
                transition: all 0.3s ease;
                text-align:center !important;
            
            "><button>Start Brain Game </button></div> 
    
   
       
       
           

            <div class="quiz_box " >
                <header class="hero__lead "  style="background: #16459e !important; width: 100%; height: 100px;; margin: 0; padding: 0; box-sizing: border-box;">
                    <footer>
                        <div class="total_que text-white" style="font-weight: 700">
                            <!-- Here I've inserted Question Count Number from JavaScript -->
                        </div>
                       
                    </footer>
                    <div class="timer" style="margin:20px">
                        <div class="time_left_txt">Time Left</div>
                        <div class="timer_sec">15</div>
                    </div>
                    {{-- <div class="time_line"></div> --}}
                </header>
               
    
            
    
                   
                    <header class="hero__lead text-white-50"  style="background: #16459e !important; width: 100%; height: 100px;; margin: 0; padding: 0; box-sizing: border-box;">

                    <div class="que_text" style="padding: 30px !important">
                        <!-- Here I've inserted question from JavaScript -->
    
                    </div>
                    </header>
                    <div class="que_image">
                        <!-- The image will be displayed here -->
                    </div>
                    <div class="navbar navbar-expand-md navbar-list navbar-light bg-white border-bottom-2 "
                    style="white-space: nowrap;">
                   <div class="container page__container">
                       <ul class="nav navbar-nav flex navbar-list__item">
                           <li class="nav-item">
                               <i class="material-icons text-50 mr-8pt">tune</i>
                               Choose the correct answer below:
                           </li>
                       </ul>
                   </div>
               </div>
                   <section> <div class="option_list" >
                    <!-- Here I've inserted options from JavaScript -->
                </div></section>
    
          
                <!-- footer of Quiz Box -->
                <footer>
                    <div class="total_que" style="color: #fff">
                        <!-- Here I've inserted Question Count Number from JavaScript -->
                    </div>
                    <button class="next_btn" style="float: right;background-color: #ed0b4c;border:#ed0b4c">Next Question <i class="material-icons icon--right">keyboard_arrow_right</i></button>
                </footer>
            </div>
          
    
        @endif

        
        <!-- Result Box -->
        <div class="result_box">
            <div class="icon">
                <i class="fas fa-crown"></i>
            </div>
            <div class="complete_text">Thank you for participating, Try again tomorrow.</div>
            <div class="score_text">
                <!-- Here I've inserted Score Result from JavaScript -->
            </div>
            <div class="buttons">
                <button class="quit">Finish Brain</button>
            </div>
        </div>
        </div>
    </div>
   </div>

  
    

@endsection
@section('scripts')
    <script>
        //selecting all required elements
        const start_btn = document.querySelector(".start_btn button");
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
            quiz_box.classList.add("activeQuiz"); //show info box
        }

       
        // if continueQuiz button clicked
        start_btn.onclick = ()=>{
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
        quit_quiz.onclick = () => {
    window.location.href = "{{ route('student.dashboard') }}"; // Redirect to the dashboard route
};

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
                timeText.textContent = "00 :"; //change the timeText to Time Left
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
         

                //creating a new span and div tag for question and passing the value using array index
                let que_tag = '<span style="font-size:40px !important">' + test_questions[index].question + '</span>';
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
                <button onclick="submitNoOptionAnswer()" class="btn btn-primary  mt-3 text-white">Submit Answer</button>
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
            let totalQueCounTag = '<span> Question ' + index +' of '+ test_questions.length +' </span>';
            bottom_ques_counter.innerHTML = totalQueCounTag;  //adding new span tag inside bottom_ques_counter
        }

    </script>
@endsection

