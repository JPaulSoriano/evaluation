@extends('layouts.app')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between">
                    Evaluation Report
                    <button type="button"  class="btn btn-sm btn-secondary" onclick="printJS({ printable: 'report', type: 'html', header: 'UCS Faculty Evaluation' })">
                        Print
                    </button>
                </div>
                <div class="card-body">
                    <form id="report">
                        <div class="row">
                            <div class="col-sm-12">
                            <table class="table table-bordered my-2">
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Faculty</th>
                                        <th>Overall Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ranked_faculty as $i => $r)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $r['faculty']->full_name }}</td>
                                        <td>{{ $r['overall_score'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
