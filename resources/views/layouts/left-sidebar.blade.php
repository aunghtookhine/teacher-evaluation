@can('student-only')
    <div class="evaluation mb-3">
        <h5>Evaluation</h5>
        <div class="list-group">
            <a href="{{ route('evaluation.index') }}" class="list-group-item list-group-item-action evaluationBtn">Evaluate
                Teachers</a>
        </div>
    </div>
@endcan

@can('admin-only')
    <div class="year mb-3">
        <h5>Academic Year</h5>
        <div class="list-group">
            <a href="{{ route('year.create') }}" class="list-group-item list-group-item-action">Create Academic
                Year</a>
            <a href="{{ route('year.index') }}" class="list-group-item list-group-item-action">Academic Year List</a>
        </div>
    </div>
    <div class="question mb-3">
        <h5>Evaluation Question</h5>
        <div class="list-group">
            <a href="{{ route('question.create') }}" class="list-group-item list-group-item-action">Create Evaluation
                Question</a>
            <a href="{{ route('question.index') }}" class="list-group-item list-group-item-action">Evaluation Question
                List</a>
        </div>
    </div>
    <div class="student mb-3">
        <h5>Student</h5>
        <div class="list-group">
            <a href="{{ route('student.create') }}" class="list-group-item list-group-item-action">Create Student</a>
            <a href="{{ route('student.index') }}" class="list-group-item list-group-item-action">Student List</a>
        </div>
    </div>
    <div class="student mb-3">
        <h5>Teacher</h5>
        <div class="list-group">
            <a href="{{ route('teacher.create') }}" class="list-group-item list-group-item-action">Create Teacher</a>
            <a href="{{ route('teacher.index') }}" class="list-group-item list-group-item-action">Teacher List</a>
        </div>
    </div>
    <div class="grade mb-3">
        <h5>Class</h5>
        <div class="list-group">
            <a href="{{ route('grade.create') }}" class="list-group-item list-group-item-action">Create Class</a>
            <a href="{{ route('grade.index') }}" class="list-group-item list-group-item-action">Class List</a>
        </div>
    </div>
    <div class="grade mb-3">
        <h5>Subject</h5>
        <div class="list-group">
            <a href="{{ route('subject.create') }}" class="list-group-item list-group-item-action">Create Subject</a>
            <a href="{{ route('subject.index') }}" class="list-group-item list-group-item-action">Subject List</a>
        </div>
    </div>
@endcan
