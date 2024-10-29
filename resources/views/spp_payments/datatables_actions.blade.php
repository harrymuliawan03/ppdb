{!! Form::open(['route' => ['sppPayments.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    @can('sppPayment-show')
        <a href="{{ route('sppPayments.show', $id) }}" class='btn btn-outline-secondary btn-xs btn-icon'>
            <i class="fa fa-eye"></i>
        </a>
    @endcan
    @can('sppPayment-edit')
        <a href="{{ route('sppPayments.edit', $id) }}" class='btn btn-outline-primary btn-xs btn-icon'>
            <i class="fa fa-edit"></i>
        </a>
    @endcan
    @can('sppPayment-delete')
        {!! Form::button('<i class="fa fa-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-outline-danger btn-xs btn-icon',
            'onclick' => "return confirm('Are you sure?')"
        ]) !!}
    @endcan
</div>
{!! Form::close() !!}
