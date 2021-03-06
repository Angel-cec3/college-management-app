@extends('layouts.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="float-left">{{ !empty($title) ? $title : 'Attendance' }}</h4>

        <div class="btn-group btn-group-sm float-right" role="group">

            <a href="{{ route('attendances.attendance.index') }}" class="btn btn-primary" title="Show All Attendance">
                <span class="fas fa-th-list" aria-hidden="true"></span> All List
            </a>
            @can('create-attendance')
            <a href="{{ route('attendances.attendance.create') }}" class="btn btn-success"
                title="Create New Attendance">
                <span class="fas fa-plus" aria-hidden="true"></span> Create New
            </a>
            @endcan
        </div>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <ul class="list-unstyled alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        {!! Form::model($attendance, [
        'method' => 'PUT',
        'route' => ['attendances.attendance.update', $attendance->id],
        'class' => 'form-horizontal',
        'name' => 'edit_attendance_form',
        'id' => 'edit_attendance_form',

        ]) !!}

        @include ('attendances.form', ['attendance' => $attendance,])

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection