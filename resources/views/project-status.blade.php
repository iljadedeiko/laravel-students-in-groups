@extends('main')

@section('title-block') Project page @endsection

@section('main-content')

<div class="container">

    <div class="row col-5 flex-column">
        <p class="project-info-p">{{ __('Project: ') }} <strong>{{ $project->proj_title }}</strong> </p>
        <p class="project-info-p">{{ __('Number of groups: ') }} <strong>{{ $project->proj_groups_count }}</strong> </p>
        <p class="project-info-p">{{ __('Students per group: ') }} <strong>{{ $studPerGroupCount->gr_stud_count }}</strong> </p>
    </div>

    <div class="row mt-4">
        <div class="col-lg-10">
            <h2 class="mb-3">{{ __('All students') }}</h2>

            @if(session('deleteStudent'))
                <div class="alert alert-success mt-3 col-5" role="alert" id="deleteStudent">
                    {{ session('deleteStudent') }}
                </div>
            @endif

            <table class="table table-bordered text-center">
                <thead>
                    <tr class="table-header">
                        <th scope="col">#</th>
                        <th scope="col">{{ __('Student') }}</th>
                        <th scope="col">{{ __('Group') }}</th>
                        <th scope="col">{{ __('Project') }}</th>
                        <th scope="col" class="col-2">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{ $student->id }}</th>
                        <td>{{ $student->stud_full_name }}</td>
                        @empty ($student->id)
                            <td> - </td>
                        @else
                            <td>{{ $student->gr_name }}</td>
                        @endempty
                        <td>{{ $student->proj_title }}</td>
                        <td>
                            <a href="{{ route('students.destroy', $student->id) }}">
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                </form>
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            <a href="{{ route('students.create') }}">
                <button type="button" class="btn btn-outline-secondary create-stud-btn">{{ __('Add new student') }}</button>
            </a>
        </div>
    </div>
</div>

@if($errors->any())
    <div class="alert alert-danger center col-lg-10">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-5 groups-container">
    <h2 class="mt-4">{{ __('Groups') }}</h2>
    <div class="container">

        <div class="row mt-4 log-6">
            @foreach ($singleProjData->groups as $group)
            <div class="col-5 mt-3">
                <table class="table table-bordered text-center">

                    @if ($studPerGroupCount->gr_stud_count - $group->students->count() == 0)
                    <thead>
                        <tr>
                            <th scope="col" class="group-is-full text-danger">{{ __('This group is full !') }}</th>
                        </tr>
                    </thead>
                    @endif

                    <thead>
                    <tr>
                        <th scope="col" class="table-header">{{ $group->gr_name }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($group->students as $studentData)
                        <tr>
                            <td>
                                {{ $studentData->stud_full_name }}
                            </td>
                        </tr>
                        @endforeach

                        @for ($i = $studPerGroupCount->gr_stud_count - $group->students->count(); $i > 0; $i--)
                        <tr>
                            <td>
                                <form action="{{ route('students.update', [$group->id]) }}" id="groupsForm" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <select class="form-control" name="studentId" id="studentId" onchange="this.form.submit()">
                                        <option selected>{{ __('Assign student') }}</option>
                                        @foreach ($students as $student)
                                            @if ($student->gr_name == null)
                                                <option value="{{ $student->id }}">{{ $student->stud_full_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
