@extends('layouts.app')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <a class="btn btn-primary" href="{{ route('questions.create') }}">New</a>
    <form action="{{ route('questions.mass_action') }}" method="POST">
    @csrf
    <div class="row my-2">
        <div class="col-sm-3">
            <select class="form-control" name="action" required>
                <option value="">Choose an action</option>
                <option value="activate">Activate selected</option>
                <option value="deactivate">Deactivate selected</option>
            </select>
        </div>
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-sm-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="select-all">
                <label class="form-check-label" for="select-all">
                    Select All
                </label>
            </div>
        </div>
    </div>
    <table class="table table-bordered my-2">
    <tr>
        <th>No</th>
        <th>Question</th>
        <th>Category</th>
        <th width="100px">Status</th>
    </tr>
    @foreach ($questions as $question)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $question->question }}</td>
            <td>{{ $question->category->name }}</td>
            <td>
                <input type="checkbox" name="questions[]" value="{{ $question->id }}" @if($question->status == 1) checked @endif>
            </td> 
        </tr>
    @endforeach
    </table>
</form>
@endsection
@section('scripts')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the "Select All" checkbox
        const selectAllCheckbox = document.getElementById('select-all');

        // Add a click event listener to the "Select All" checkbox
        selectAllCheckbox.addEventListener('click', function() {
            // Get all the checkboxes of the questions
            const questionCheckboxes = document.querySelectorAll('input[name="questions[]"]');

            // Toggle the checkboxes of all the questions
            questionCheckboxes.forEach(function(questionCheckbox) {
                questionCheckbox.checked = selectAllCheckbox.checked;
            });
        });
    });
</script>
@endsection