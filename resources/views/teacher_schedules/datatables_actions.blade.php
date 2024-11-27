{!! Form::open(['route' => ['teacherSchedules.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    @can('teacherSchedule-show')
        <a href="{{ route('teacherSchedules.show', $id) }}" class='btn btn-outline-secondary btn-xs btn-icon'>
            <i class="fa fa-eye"></i>
        </a>
    @endcan
    @can('teacherSchedule-edit')
        <a href="{{ route('teacherSchedules.edit', $id) }}" class='btn btn-outline-primary btn-xs btn-icon'>
            <i class="fa fa-edit"></i>
        </a>
    @endcan
    @can('teacherSchedule-delete')
        {!! Form::button('<i class="fa fa-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-outline-danger btn-xs btn-icon',
            'onclick' => "return confirm('Are you sure?')"
        ]) !!}
    @endcan
</div>
{!! Form::close() !!}
