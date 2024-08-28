@extends('students.master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/quiz.css') }}" type="text/css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
@endsection

@section('content')
<div class="page__container">
    <!-- Questions will be injected here -->
</div>
@endsection

@section('scripts')     
    <script>
       document.addEventListener("DOMContentLoaded", function() {
            const questions = @json($formatedQuestions);
            updateUI(questions);
        });

function updateUI(questions) {
    const container = document.querySelector('.page__container');
    let html = '';

    questions.forEach((question, index) => {
        if (question.options && question.options.length > 0) {
            // Display multiple-choice question
            html += `
                <div class="bg-primary pb-lg-64pt py-32pt">
                    <div class="container page__container">
                        <div class="d-flex flex-wrap align-items-end justify-content-end mb-16pt">
                            <h1 class="text-white flex m-0">Question ${index + 1} of ${questions.length}</h1>
                            <p class="h1 text-white-50 font-weight-light m-0" id="timer${index}">00:14</p>
                        </div>
                        <p class="hero__lead measure-hero-lead text-white-50">${question.question}</p>
                    </div>
                </div>

                <div class="navbar navbar-expand-md navbar-list navbar-light bg-white border-bottom-2" style="white-space: nowrap;">
                    <div class="container page__container">
                        <ul class="nav navbar-nav flex navbar-list__item">
                            <li class="nav-item">
                                <i class="material-icons text-50 mr-8pt">tune</i>
                                Choose the correct answer below:
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="container page__container">
                    <div class="page-section">
                        ${question.options.map((option, i) => `
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input id="customCheck${index}_${i}" type="radio" name="question${index}" value="${option}" class="custom-control-input">
                                    <label for="customCheck${index}_${i}" class="custom-control-label">${option}</label>
                                </div>
                            </div>
                        `).join('')}
                    </div>
                </div>

                <div class="container page__container mt-3">
                    <button onclick="submitAnswer(${index}, 'multiple_choice')" class="btn btn-primary">Submit Answer</button>
                </div>
            `;
        } else {
            // Display open-ended question
            html += `
                <div class="bg-primary pb-lg-64pt py-32pt">
                    <div class="container page__container">
                        <div class="d-flex flex-wrap align-items-end justify-content-end mb-16pt">
                            <h1 class="text-white flex m-0">Question ${index + 1} of ${questions.length}</h1>
                            <p class="h1 text-white-50 font-weight-light m-0" id="timer${index}">00:14</p>
                        </div>
                        <p class="hero__lead measure-hero-lead text-white-50">${question.question}</p>
                    </div>
                </div>

                <div class="container page__container">
                    <div class="page-section">
                        <div class="form-group">
                            <textarea id="userAnswer${index}" class="form-control" rows="3" placeholder="Type your answer here..."></textarea>
                        </div>
                        <button onclick="submitAnswer(${index}, 'open_ended')" class="btn btn-primary">Submit Answer</button>
                    </div>
                </div>
            `;
        }
    });

    container.innerHTML = html;

    // Initialize timers for each question
    questions.forEach((question, index) => startTimer(index, 14));
}

function startTimer(questionIndex, time) {
    const timerElement = document.querySelector(`#timer${questionIndex}`);
    let counter = setInterval(() => {
        timerElement.textContent = formatTime(time);
        time--;
        if (time < 0) {
            clearInterval(counter);
            timerElement.textContent = "Time Off";
            disableOptions(questionIndex);
        }
    }, 1000);
}

function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const secs = seconds % 60;
    return `${minutes}:${secs < 10 ? '0' : ''}${secs}`;
}

function disableOptions(questionIndex) {
    document.querySelectorAll(`input[name="question${questionIndex}"]`).forEach(input => {
        input.disabled = true;
    });
    document.querySelector(`#userAnswer${questionIndex}`)?.disabled = true;
}

function submitAnswer(questionIndex, questionType) {
    let answer;

    if (questionType === 'multiple_choice') {
        const selectedOption = document.querySelector(`input[name="question${questionIndex}"]:checked`);
        if (!selectedOption) {
            alert('Please select an answer.');
            return;
        }
        answer = selectedOption.value;
    } else if (questionType === 'open_ended') {
        answer = document.querySelector(`#userAnswer${questionIndex}`).value;
        if (answer.trim() === '') {
            alert('Please enter an answer.');
            return;
        }
    }

    fetch('/quiz/validate-answer', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            questionIndex: questionIndex,
            answer: answer,
            questionType: questionType
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.correct) {
            alert('Correct answer!');
        } else {
            alert('Incorrect answer. Try again.');
        }
    })
    .catch(error => {
        console.error('Error validating answer:', error);
    });
}
    </script>
@endsection
