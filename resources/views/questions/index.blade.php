@extends('layouts.app')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<a class="btn btn-primary" href="{{ route('questions.create') }}">Add Question</a>
<form action="{{ route('questions.mass_action') }}" method="POST">
    @csrf
    <div class="row my-2">
        <!-- <div class="col-sm-3">
            <select class="form-control" name="action" required>
                <option value="">Choose an action</option>
                <option value="activate">Activate selected</option>
                <option value="deactivate">Deactivate selected</option>
            </select>
        </div>
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div> -->
        <div class="col-sm-6">
            <div class="btn-group" role="group" aria-label="Action">
                <button type="button" class="btn btn-warning" id="select-all-btn">Select All</button>
                <button type="submit" name="action" value="activate" class="btn btn-primary">Activate selected</button>
                <button type="submit" name="action" value="deactivate" class="btn btn-secondary">Deactivate selected</button>
            </div>
        </div>
    </div>
    <table class="table table-bordered my-2">
    <tr>
        <th>No</th>
        <th>Question</th>
        <th>Category</th>
        <th width="100px">
            Status
        </th>
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

<!-- <script>
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
</script> -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the "Select All" button
        const selectAllBtn = document.getElementById('select-all-btn');

        // Add a click event listener to the "Select All" button
        selectAllBtn.addEventListener('click', function() {
            // Get all the checkboxes of the questions
            const questionCheckboxes = document.querySelectorAll('input[name="questions[]"]');

            // Toggle the checkboxes of all the questions
            questionCheckboxes.forEach(function(questionCheckbox) {
                questionCheckbox.checked = !questionCheckbox.checked;
            });
        });
    });
</script>
@endsection