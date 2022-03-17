@extends('main')

@section('title-block') Create new project @endsection

@section('main-content')

<div class="container-xxl">

    @if($errors->any())
        <div class="alert alert-danger center col-3" id="createProjectErrs">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('successStudent'))
        <div class="alert alert-success mb-3 col-3" id="createStudent" role="alert">
            {{ session('successStudent') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-3 mr-3">
            <h3 class="mb-3">{{ __('Create new project')}}</h3>
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">{{ __('Project title')}}</label>
                    <input type="text" name="proj_title" id="proj_title" class="form-control" value="{{ old('proj_title') }}">
                </div>

                <div class="form-group">
                    <label for="value">{{ __('Number of groups')}}</label>
                    <input type="number" step="1" name="proj_groups_count" id="proj_groups_count" class="form-control"
                    value="{{ old('proj_groups_count') }}">
                </div>

                <div class="form-group">
                    <label for="quality">{{ __('Maximum number of students per group')}}</label>
                    <input type="number" step="1" name="gr_stud_count" id="gr_stud_count" class="form-control"
                    value="{{ old('gr_stud_count') }}">
                </div>

                <button type="submit" class="btn btn-success mb-4 col-5" name="buttonItm">{{ __('Add')}}</button>

                @if(session('successProject'))
                    <div class="alert alert-success" role="alert" id="createProject">
                        {{ session('successProject') }}
                    </div>
                @endif

            </form>
        </div>

        <div class="col-lg-8 ml-5">

            @if(session('deleteProject'))
                <div class="alert alert-success mt-3" role="alert" id="deleteProject">
                    {{ session('deleteProject') }}
                </div>
            @endif

            <h3 class="mb-3">{{ __('Projects') }}</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Project title') }}</th>
                    <th scope="col">{{ __('Number of groups') }}</th>
                    <th scope="col">{{ __('Students per group') }}</th>
                    <th scope="col" colspan="2" class="text-center">{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->proj_title }}</td>
                        <td>{{ $project->proj_groups_count }}</td>
                        <td>{{ $project->gr_stud_count }}</td>
                        <td>
                            <a href="{{ route('projects.show', $project->id) }}">
                                <button type="button" class="btn btn-primary">{{ __('Open') }}</button>
                            </a>
                        </td>

                        <td>
                            <a href="{{ route('projects.destroy', $project->id) }}">
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger float-right">{{ __('Delete') }}</button>
                                </form>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
