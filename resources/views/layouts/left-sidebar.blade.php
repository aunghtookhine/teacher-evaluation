@vite('resources/css/left-sidebar.css')

@can('student-only')
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <i class="bi bi-clipboard2-check me-2"></i>
                    Evaluation
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a href="{{ route('evaluation.index') }}"
                        class="list-group-item list-group-item-action evaluationBtn">Evaluate
                        Teachers</a>
                </div>
            </div>
        </div>
    </div>
@endcan

@can('admin-only')
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item evaluation">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <i class="bi bi-clipboard2-check me-2"></i>
                    Evaluation
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a href="{{ route('result.indexAll') }}" class="list-group-item list-group-item-action">Evaluation
                        Results</a>
                </div>
            </div>
        </div>
        <div class="accordion-item year">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <i class="bi bi-calendar4-week me-2"></i>
                    Academic Year
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body border-bottom">
                    <a href="{{ route('year.create') }}" class="list-group-item list-group-item-action">Create Academic
                        Year</a>
                </div>
                <div class="accordion-body">
                    <a href="{{ route('year.index') }}" class="list-group-item list-group-item-action">Academic Year
                        List</a>
                </div>
            </div>
        </div>
        <div class="accordion-item question">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    <i class="bi bi-journal-text me-2"></i>
                    Evaluation Question
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a href="{{ route('question.index') }}" class="list-group-item list-group-item-action">Evaluation
                        Question
                        List</a>
                </div>
            </div>
        </div>
        <div class="accordion-item student">
            <h2 class="accordion-header" id="flush-headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                    <i class="bi bi-person-vcard me-2"></i>
                    Student
                </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body border-bottom">
                    <a href="{{ route('student.create') }}" class="list-group-item list-group-item-action">Create
                        Student</a>
                </div>
                <div class="accordion-body">
                    <a href="{{ route('student.index') }}" class="list-group-item list-group-item-action">Student List</a>
                </div>
            </div>
        </div>
        <div class="accordion-item teacher">
            <h2 class="accordion-header" id="flush-headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                    <i class="bi bi-people-fill me-2"></i>
                    Teacher
                </button>
            </h2>
            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body border-bottom">
                    <a href="{{ route('teacher.create') }}" class="list-group-item list-group-item-action">Create
                        Teacher</a>
                </div>
                <div class="accordion-body">
                    <a href="{{ route('teacher.index') }}" class="list-group-item list-group-item-action">Teacher List</a>
                </div>
            </div>
        </div>
        <div class="accordion-item class">
            <h2 class="accordion-header" id="flush-headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                    <i class="bi bi-view-list me-2"></i>
                    Class
                </button>
            </h2>
            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body border-bottom">
                    <a href="{{ route('grade.create') }}" class="list-group-item list-group-item-action">Create Class</a>
                </div>
                <div class="accordion-body">
                    <a href="{{ route('grade.index') }}" class="list-group-item list-group-item-action">Class List</a>
                </div>
            </div>
        </div>
        <div class="accordion-item subject">
            <h2 class="accordion-header" id="flush-headingSeven">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                    <i class="bi bi-book me-2"></i>
                    Subject
                </button>
            </h2>
            <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body border-bottom">
                    <a href="{{ route('subject.create') }}" class="list-group-item list-group-item-action">Create
                        Subject</a>
                </div>
                <div class="accordion-body">
                    <a href="{{ route('subject.index') }}" class="list-group-item list-group-item-action">Subject
                        List</a>
                </div>
            </div>
        </div>
    </div>
@endcan

@can('teacher-only')
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <i class="bi bi-clipboard2-check me-2"></i>
                    Evaluation
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a href="{{ route('result.index') }}" class="list-group-item list-group-item-action">Evaluation
                        Results</a>
                </div>
            </div>
        </div>
    </div>
@endcan
