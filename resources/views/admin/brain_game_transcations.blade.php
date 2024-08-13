@extends('layouts.master')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Centy Plus</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Transactions</a></li>
                        </ol>
                    </div>
                    <br>

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
                        <h4 class="header-title">Manage Brain Game  Transactions</h4>

                        <ul class="nav nav-tabs nav-bordered mb-3">
                            <li class="nav-item">
                                <a href="#buttons-table-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                    Preview
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane show active" id="buttons-table-preview">
                                @php
                                    $centi20 = 0;
                                    $centi15 = 0;
                                    $centi5 = 0;
                                @endphp
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>Transaction ID</th>
                                        <th>Student </th>
                                        <th>Amount</th>
                                        <th>20 Centis</th>
                                        <th>15 Centis</th>
                                        <th>5 Centis</th>
                                        <th>Transaction Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($transactions as $transaction)
                                    @php
                                    $centi20 += $transaction->centi20;
                                    $centi15 += $transaction->centi15;
                                    $centi5 += $transaction->centi5;
                                    @endphp
                                        <tr>
                                            <td>{{ $transaction->trans_id }}</td>
                                            <td>{{ $transaction->student_name }}</td>
                                            <td>{{ $transaction->amount }}</td>
                                            <td>{{ $transaction->centi20 }}</td>
                                            <td>{{ $transaction->centi15 }}</td>
                                            <td>{{ $transaction->centi5 }}</td>
                                            <td>{{ $transaction->created_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3">Totals</th>
                                            <th>{{ $centi20 }}</th>
                                            <th>{{ $centi15 }}</th>
                                            <th>{{ $centi5 }}</th>
                                            <th></th> <!-- This is to leave the Transaction Time column blank -->
                                        </tr>
                                    </tfoot>
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


@endsection

