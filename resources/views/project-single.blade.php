@extends('main')

@section('title-block') Project page @endsection

@section('main-content')

    <div class="container">

        @if($errors->any())
            <div class="alert alert-danger center col-lg-10">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row col-5 flex-column">
            <p class="project-info-p">{{ __('Project: ') }} <strong>{{ $projectId->proj_title }}</strong> </p>
            <p class="project-info-p">{{ __('Number of groups: ') }} <strong>{{ $projectId->proj_groups_count }}</strong> </p>
            @foreach ($groupCountByProj as $groupCount)
                <p class="project-info-p">{{ __('Students per group: ') }} <strong>{{ $groupCount->gr_stud_count }}</strong> </p>
            @endforeach
        </div>

        <div class="row mt-4">
            <div class="col-lg-10">
                <h2 class="mb-3">{{ __('Students') }}</h2>

                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('Student') }}</th>
                            <th scope="col">{{ __('Group') }}</th>
                            <th scope="col">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <th scope="row">{{ $student->id }}</th>
                            <td>{{ $student->stud_full_name }}</td>
                            <td>{{ $student->group_id }}</td>
                            <td>
                                <a href="#"><u>{{ __('Delete') }}</u></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <a href="#">
                    <button type="button" class="btn btn-outline-secondary">{{ __('Create new student') }}</button>
                </a>
            </div>
        </div>

        <div class="row col-10 mt-5">
            <h2 class="mb-3">{{ __('Groups') }}</h2>
            <div class="col-lg-10">
                <div class="col-lg-4">

                </div>
            </div>
        </div>
    </div>

@endsection
