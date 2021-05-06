@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if ($errors->storetask->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->storetask->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.checklist_groups.checklists.update' ,[$checklistGroup,$checklist])}}" method="POST">
                            @csrf
                            @method('PUT')
                        <div class="card-header">{{ __('Edit Checklist') }}</div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input value="{{$checklist->name }}" class="form-control" name="name" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save Checklist') }}</button>
                        </div>
                        </form>
                    </div>
                        <form action="{{ route('admin.checklist_groups.checklists.destroy' ,[$checklistGroup,$checklist])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="card-footer">
                            <button class="btn btn-sm btn-danger" type="submit"
                            onclick="return confirm('{{ __('Are You Sure ?')}}')"
                            >
                           
                             {{ __('Delete this Checklist group') }}</button>
                              </div>
                            </form>
                            <hr/>
                            <h2>
                            {{__('List of Tasks')}}
                            </h2>
                         
                        <div class="card">
<div class="card-header">
<i class="fa fa-align-justify"></i>{{__('List of tasks')}} </div>
<div class="card-body">
<table class="table table-responsive-sm">
<tbody>
@foreach($checklist->tasks as $task)
<tr>
<td>{{$task->name}}</td>
<td>{!! $task->description !!}</td>
<td>
<a class="btn btn-sm btn-primary"href="{{ route('admin.checklists.tasks.edit' ,[$checklist,$task])}}">{{__('Edit')}}
</a>
<form style="display:inline-block"
action="{{ route('admin.checklists.tasks.destroy' ,[$checklist,$task])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit"
                            onclick="return confirm('{{ __('Are You Sure ?')}}')"
                            >
                           
                             {{ __('Delete this Task') }}</button>
                            </form>
</td>

@endforeach
</tbody>
</table>

</div>
</div>
                        <div class="card">
                        @if ($errors->storetask->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->storetask->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('admin.checklists.tasks.store' ,[$checklist])}}" method="POST">
                            @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input   value="{{$checklist->name}}"class="form-control" name="name" type="text" >
                                    </div>
                                    <div class="form-group">
                                        <label for="name">{{ __('description') }}</label>
                                        <textarea  class="form-control" name="description" rows="5"id="task-textarea">
                                        
                                        </textarea>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save Task') }}</button>
                        </div>
                        </form>
                        </div> 
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    ClassicEditor
        .create( document.querySelector( '#task-textarea' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection