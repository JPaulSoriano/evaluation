@extends('layouts.app')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">Select Section</div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                            4-ST. DOMINIC
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">4-ST. AGATHA</a>
                        <a href="#" class="list-group-item list-group-item-action">4-ST. MONICA</a>
                        <a href="#" class="list-group-item list-group-item-action">4-ST. JOHN BOSCO</a>
                      </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">Evaluation Report</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div><span class="font-weight-bold">Faculty:</span> Engelbert Cruz</div>
                            <div><span class="font-weight-bold">Section:</span> 4-ST. DOMINIC</div>
                        </div>
                        <div class="col-sm-6">
                            <div><span class="font-weight-bold">Total Student Evaluated:</span> 30</div>
                            <div><span class="font-weight-bold">Academic Year:</span> 2021-2022</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="border p-3 mt-3">5 = Strongly Agree 4 = Agree 3 = Uncertain 2 = Disagree 1 = Strongly Disagree</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered my-2">
                                <tr>
                                    <th>Category 1</th>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                </tr>
                                <tr>
                                    <td>Test Question</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>40%</td>
                                    <td>60%</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
