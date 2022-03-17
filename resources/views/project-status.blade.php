@extends('main')

@section('title-block') Project page @endsection

@section('main-content')

<div class="container">

    <div class="row col-5 flex-column">
        <p class="project-info-p">{{ __('Project: ') }} <strong>{{ $project->proj_title }}</strong> </p>
        <p class="project-info-p">{{ __('Number of groups: ') }} <strong>{{ $project->proj_groups_count }}</strong> </p>
        @foreach ($groupCountByProj as $groupCount)
            <p class="project-info-p">{{ __('Students per group: ') }} <strong>{{ $groupCount->gr_stud_count }}</strong> </p>
        @endforeach
    </div>

    <div class="row mt-4">
        <div class="col-lg-10">
            <h2 class="mb-3">{{ __('Students') }}</h2>

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
                        <th scope="col" class="col-2">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{ $student->id }}</th>
                        <td>{{ $student->stud_full_name }}</td>
                        @empty ($student->group_id)
                            <td> - </td>
                        @else
                            <td>{{ $student->group_id }}</td>
                        @endempty
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
                <button type="button" class="btn btn-outline-secondary create-stud-btn">{{ __('Create new student') }}</button>
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

<div class="container mb-5 mt-5">
    <h2 class="mt-4">{{ __('Groups') }}</h2>
    <div class="container">

        <div class="row mt-4 log-6">
            @foreach ($groups as $group)
            <div class="col-5 mt-8">
                <table class="table table-bordered text-center">
                    <thead>
                    <tr>
                        <th scope="col" class="table-header">{{ $group->gr_name }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ilja Dedeiko</td>
                        </tr>
                        <tr>
                            <th>
                                <label for="studentSelect"></label>
                                <select class="form-control" id="studentSelect">
                                    <option selected>{{ __('Assign student') }}</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->stud_full_name }}</option>
                                    @endforeach
                                </select>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
