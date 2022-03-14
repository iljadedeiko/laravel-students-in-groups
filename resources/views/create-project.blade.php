@extends('main')

@section('title-block') Create new project @endsection

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
            <form action="{{ route('home') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="name">{{ __('Project title')}}</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="value">{{ __('Number of groups')}}</label>
                    <input type="number" step="1" name="number_of_groups" id="number_of_groups" class="form-control">
                </div>

                <div class="form-group">
                    <label for="quality">{{ __('Maximum number of students per group')}}</label>
                    <input type="number" step="1" name="max_stud" id="max_stud" class="form-control">
                </div>

                <button type="submit" class="btn btn-success mb-5" name="buttonItm">{{ __('Add')}}</button>
            </form>
        </div>

    </div>
</div>

@endsection
