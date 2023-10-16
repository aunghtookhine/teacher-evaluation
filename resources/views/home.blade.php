@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10" style="background-color: #183655">
                @can('student-only')
                    <h2 class="text-white">Student Dashboard</h2>
                    <hr class="text-white">
                    <p class="h5 text-white">
                        Hello, {{ Auth::user()->name }}. You are logged in. <br>
                        Here is some information you need to know before evaluate.
                    </p>
                    <div class="card mt-3" style="width: 15rem;">
                        <div class="card-header text-white">
                            <i class="bi bi-award text-warning"></i>
                            Rating Legend
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <span>
                                    1. Strongly Disagree
                                </span> <br>
                                <span>
                                    2. Disagree
                                </span> <br>
                                <span>
                                    3. Neutral
                                </span> <br>
                                <span>
                                    4. Agree
                                </span> <br>
                                <span>
                                    5. Strongly Agree
                                </span> <br>
                            </p>
                        </div>
                    </div>
                @endcan

                @can('teacher-only')
                    <h2 class="text-white">Teacher Dashboard</h2>
                    <hr class="text-white">
                    <p class="h5 text-white">
                        Hello, {{ Auth::user()->name }}. You are logged in. <br>
                        Here is some information you need to know before evaluate.
                    </p>

                    <div class="card mt-3" style="width: 15rem; height:200px">
                        <div class="card-header text-white">
                            <i class="bi bi-award text-warning"></i>
                            Levels of Result
                        </div>
                        <div class="card-body d-flex align-items-center">
                            <p class="card-text w-100">
                                <span class="badge bg-danger me-1"> </span>
                                1 <= Ineffective < 2 <br>
                                    <span class="badge bg-warning me-1"> </span>
                                    2 <= Partially Effective < 3 <br>
                                        <span class="badge bg-info me-1"> </span>
                                        3 <= Effective < 4 <br>
                                            <span class="badge bg-success me-1"> </span>
                                            4 <= Highly Effective <=5 </p>
                        </div>
                    </div>
                @endcan

                @can('admin-only')
                    <h2 class="text-white">Admin Dashboard</h2>
                    <hr class="text-white">
                    <p class="h5 text-white">
                        Hello, {{ Auth::user()->name }}. You are logged in. <br>
                        Here is some information about your department.
                    </p>
                    <table class="mt-3">
                        <tr>
                            <td>
                                <div class="card me-1 mb-1" style="width: 15rem;">
                                    <div class="card-header text-white">
                                        <i class="bi bi-building-fill text-warning me-2"></i>
                                        Department
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-center">
                                            Information Technology
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card me-1 mb-1" style="width: 15rem;">
                                    <div class="card-header text-white">
                                        <i class="bi bi-calendar4-week text-warning me-2"></i>
                                        Academic Year
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-center">
                                            {{ !App\Models\Year::where('status', 'Started')->first()
                                                ? '-'
                                                : App\Models\Year::where('status', 'Started')->first()->year }}
                                        </p>

                                    </div>
                                </div>
                            </td>
                            <td rowspan="2">
                                <div class="card" style="width: 15rem; height:200px">
                                    <div class="card-header text-white">
                                        <i class="bi bi-award text-warning me-2"></i>
                                        Levels of Result
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                        <p class="card-text w-100">
                                            <span class="badge bg-danger me-1"> </span>
                                            1 <= Ineffective < 2 <br>
                                                <span class="badge bg-warning me-1"> </span>
                                                2 <= Partially Effective < 3 <br>
                                                    <span class="badge bg-info me-1"> </span>
                                                    3 <= Effective < 4 <br>
                                                        <span class="badge bg-success me-1"> </span>
                                                        4 <= Highly Effective <=5 </p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="card" style="width: 15rem;">
                                    <div class="card-header text-white">
                                        <i class="bi bi-people-fill text-warning me-2"></i>
                                        Number of Teacher
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-center">
                                            {{ count(App\Models\Teacher::all()) }}
                                        </p>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card" style="width: 15rem;">
                                    <div class="card-header text-white">
                                        <i class="bi bi-person-vcard text-warning me-2"></i>
                                        Number of Student
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-center">
                                            {{ count(App\Models\Student::all()) }}
                                        </p>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                @endcan
            </div>
        </div>
    </div>
@endsection
