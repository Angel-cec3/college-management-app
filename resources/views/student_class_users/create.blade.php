@extends('layouts.dashboard')

@section('content')


<div class="card">
        <div class="card-header">
          <h3 class="float-left mb-0">Create New Student Class User</h3>
          <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('student_class_users.student_class_user.index') }}" class="btn btn-primary" title="Show All Student Class User">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>
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

            {!! Form::open([
                'route' => 'student_class_users.student_class_user.store',
                'class' => 'form-horizontal',
                'name' => 'create_student_class_user_form',
                'id' => 'create_student_class_user_form',
                
                ])
            !!}

            @include ('student_class_users.form', ['studentClassUser' => null,])
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
      </div>
@endsection