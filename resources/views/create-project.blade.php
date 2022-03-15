@extends('main')

@section('title-block') Create new project @endsection

@section('main-content')

<div class="container">

    @if($errors->any())
        <div class="alert alert-danger center col-lg-3">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-3 mr-5">
            <h3 class="mb-3">{{ __('Create new project')}}</h3>
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">{{ __('Project title')}}</label>
                    <input type="text" name="proj_title" id="proj_title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="value">{{ __('Number of groups')}}</label>
                    <input type="number" step="1" name="groups_count" id="groups_count" class="form-control">
                </div>

                <div class="form-group">
                    <label for="quality">{{ __('Maximum number of students per group')}}</label>
                    <input type="number" step="1" name="stud_count" id="stud_count" class="form-control">
                </div>

                <button type="submit" class="btn btn-success mb-5" name="buttonItm">{{ __('Add')}}</button>
            </form>
        </div>

        <div class="col-lg-6 ml-5">
            <h3 class="mb-3">{{ __('Projects') }}</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Project title') }}</th>
                    <th scope="col">{{ __('Group count') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->proj_title }}</td>
                        <td>{{ $project->groups_count }}</td>
                        <td>
                            <a href="{{ route('projects.show', $project->id) }}">
                                <button type="button" class="btn btn-primary">{{ __('Open') }}</button>
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
