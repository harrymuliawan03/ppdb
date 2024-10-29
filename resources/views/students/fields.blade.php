<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:', ['class' => 'd-block']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Kelas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('school_class_id', 'Kelas:', ['class' => 'd-block']) !!}
    {!! Form::select('school_class_id', $school_classes, null, ['class' => 'form-control']) !!}
</div>

<!-- Birth Date Field -->
@if (isset($student))
    <div class="form-group col-sm-6">
        {!! Form::label('birth_date', 'Birth Date:') !!}
        {!! Form::date(
            'birth_date',
            $student->birth_date ? \Carbon\Carbon::parse($student->birth_date)->format('Y-m-d') : null,
            [
                'class' => 'form-control date',
            ],
        ) !!}
    </div>
@else
    <div class="form-group col-sm-6">
        {!! Form::label('birth_date', 'Birth Date:') !!}
        {!! Form::date('birth_date', null, [
            'class' => 'form-control date',
        ]) !!}
    </div>
@endif

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:', ['class' => 'd-block']) !!}
    {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'], null, [
        'class' => 'form-control',
    ]) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address', 'Address:', ['class' => 'd-block']) !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>


<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', 'Phone Number:', ['class' => 'd-block']) !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Nisn Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nisn', 'Nisn:', ['class' => 'd-block']) !!}
    {!! Form::text('nisn', null, ['class' => 'form-control']) !!}
</div>

<div class="clearfix"></div>
<hr>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('students.index') !!}" class="btn btn-light">Cancel</a>
</div>

@section('scripts')
    <!-- Relational Form table -->
    <script>
        $(document).ready(function() {
            $('.dropify').dropify({
                messages: {
                    default: 'Drag and drop file here or click',
                    replace: 'Drag and drop file here or click to Replace',
                    remove: 'Remove',
                    error: 'Sorry, the file is too large'
                }
            });
            var editor_config = {
                path_absolute: "/",
                selector: 'textarea.my-editor2',
                height: "250",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern"
                ],
                menubar: false,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                relative_urls: false,
                file_browser_callback: function(field_name, url, type, win) {
                    var x = window.innerWidth || document.documentElement.clientWidth || document
                        .getElementsByTagName('body')[0].clientWidth;
                    var y = window.innerHeight || document.documentElement.clientHeight || document
                        .getElementsByTagName('body')[0].clientHeight;

                    var cmsURL = editor_config.path_absolute + 'filemanager?field_name=' + field_name;
                    cmsURL = cmsURL + "&type=Files";

                    tinyMCE.activeEditor.windowManager.open({
                        file: cmsURL,
                        title: 'Filemanager',
                        width: x * 0.8,
                        height: y * 0.8,
                        resizable: "yes",
                        close_previous: "no"
                    });
                }
            }
            tinymce.init(editor_config);
        });
        $('.btn-add-related').on('click', function() {
            var relation = $(this).data('relation');
            var index = $(this).parents('.panel').find('tbody tr').length - 1;

            if ($('.empty-data').length) {
                $('.empty-data').hide();
            }

            // TODO: edit these related input fields (input type, option and default value)
            var inputForm = '';
            var fields = $(this).data('fields').split(',');
            // $.each(fields, function(idx, field) {
            //     inputForm += `
        //         <td class="form-group">
        //             {!! Form::select('`+relation+`[`+relation+index+`][`+field+`]', [], null, [
            'class' => 'form-control select2',
            'style' => 'width:100%',
        ]) !!}
        //         </td>
        //     `;
            // })
            $.each(fields, function(idx, field) {
                inputForm += `
                <td class="form-group">
                    {!! Form::text('`+relation+`[`+relation+index+`][`+field+`]', null, [
                        'class' => 'form-control',
                        'style' => 'width:100%',
                    ]) !!}
                </td>
            `;
            })

            var relatedForm = `
            <tr id="` + relation + index + `">
                ` + inputForm + `
                <td class="form-group" style="text-align:right">
                    <button type="button" class="btn-delete btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></button>
                </td>
            </tr>
        `;

            $(this).parents('.panel').find('tbody').append(relatedForm);

            $('#' + relation + index + ' .select2').select2();
        });

        $(document).on('click', '.btn-delete', function() {
            var actionDelete = confirm('Are you sure?');
            if (actionDelete) {
                var dom;
                var id = $(this).data('id');
                var relation = $(this).data('relation');

                if (id) {
                    dom = `<input class="` + relation + `-delete" type="hidden" name="` + relation +
                        `-delete[]" value="` + id + `">`;
                    $(this).parents('.box-body').append(dom);
                }

                $(this).parents('tr').remove();

                if (!$('tbody tr').length) {
                    $('.empty-data').show();
                }
            }
        });
    </script>
    <!-- End Relational Form table -->
@endsection
