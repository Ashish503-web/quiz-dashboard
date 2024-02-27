@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif



                    @if(isset($questions))
                    @foreach($questions as $index => $item)
                    <fieldset>
                        <legend>{{ $index + 1 }}) {{ $item->question }}</legend>
                        @foreach($item->options as $option)
                        <input id="answer{{ $index + 1 }}_{{ $loop->index + 1 }}" type="radio" name="let_keyword_{{ $index + 1 }}" value="{{ $option->id }}" data-question-index="{{ $index + 1 }}" data-correct-option-id="{{ $item->correctOption->option->id }}">
                        <label for="answer{{ $index + 1 }}_{{ $loop->index + 1 }}">{{ $option->option }}</label><br>
                        @endforeach
                    </fieldset>
                    <span class="result" id="result_{{ $index + 1 }}"></span><br>
                    @endforeach
                    @endif

                    <span id="result4"></span><br>
                    <p id="score"></p>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    let points = [0];
    const paraText = document.getElementById("score");
    localStorage.clear();

    const radios = document.querySelectorAll('input[type="radio"]');
    const resultSpans = document.querySelectorAll('.result');

    radios.forEach(radio => {
        radio.addEventListener('change', function() {
            const questionIndex = this.dataset.questionIndex;
            const correctOptionId = this.dataset.correctOptionId;

            const resultSpan = resultSpans[questionIndex - 1];

            if (this.value === correctOptionId) {
                resultSpan.textContent = "Correct answer!";
                resultSpan.style.color = "green";
                points[questionIndex] = 1;
            } else {
                resultSpan.textContent = "Wrong answer!";
                resultSpan.style.color = "red";
                points[questionIndex] = 0;
            }

            let sum = points.reduce((acc, val) => acc + val, 0);
            paraText.textContent = "Your Score: " + sum + "/5";
            paraText.style.color = "Blue";
            paraText.style.fontWeight = "bold";
            localStorage.setItem("points", JSON.stringify(points));
        });
    });
</script>
@endsection