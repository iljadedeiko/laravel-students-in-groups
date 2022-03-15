@extends('main')

@section('title-block') Project page @endsection

@section('main-content')

    <div class="container">

        @if($errors->any())
            <div class="alert alert-danger center col-lg-5">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-3">
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

                    <button type="submit" class="btn btn-success mb-5" name="submit_button">{{ __('Add')}}</button>
                </form>
            </div>

        </div>
    </div>

@endsection
