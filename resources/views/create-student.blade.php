@extends('main')

@section('title-block') Add new student @endsection

@section('main-content')

<div class="container">

    @if($errors->any())
        <div class="alert alert-danger center col-lg-5" id="createStudentErrs">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-3">
            <h3 class="mb-3">{{ __('Add new student') }}</h3>
            <form action="{{ route('students.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">{{ __('Student full name') }}</label>
                    <input type="text" name="stud_full_name" placeholder="Name" id="stud_full_name" class="form-control">
                </div>

                <button type="submit" class="btn btn-success mb-4 col-5" name="buttonItm">{{ __('Add') }}</button>
            </form>

        </div>
    </div>
</div>
@endsection
