@extends('students.master')

@section('content')

    <div class="container">
        @error('error')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div class="row">
            @foreach ($user as $account)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $account->name }}</h5>
                            <p>Email: {{ $account->email }}</p>
                            <p>phone: {{ $account->phone_number }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
