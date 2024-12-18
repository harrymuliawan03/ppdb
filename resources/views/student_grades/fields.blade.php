<!-- Student Field -->

<div class="form-group col-sm-6">
    {!! Form::label('school_classes', 'Kelas:') !!}
    {!! Form::select('school_classes', ['' => 'Select Class'] + $classes->toArray(), null, [
        'class' => 'form-control',
        'id' => 'school_classes',
    ]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('student_id', 'Murid:') !!}
    {!! Form::select('student_id', ['' => 'Select student'] + $students, null, [
        'class' => 'form-control',
        'id' => 'student_id',
        'disabled',
    ]) !!}
</div>

<!-- Subjects Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subject_id', 'Mata Pelajaran:') !!}
    {!! Form::select('subject_id', $subjects, null, ['class' => 'form-control']) !!}
</div>

<!-- Teacher Field -->
<div class="form-group col-sm-6">
    {!! Form::label('teacher_id', 'Guru:') !!}
    @php
        // Check if the logged-in user is a teacher
        $isTeacher = Auth::user()->hasRole('teacher');
    @endphp

    {!! Form::select('teacher_id', $teachers, null, ['class' => 'form-control', $isTeacher ? 'readonly' : '']) !!}
</div>

<!-- Nilai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai', 'Nilai (0 - 100) :') !!}
    {!! Form::number('nilai', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('semester', 'Semester:') !!}
    {!! Form::number('semester', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('school_year', 'Tahun Ajaran:') !!}
    {!! Form::number('school_year', null, ['class' => 'form-control']) !!}
</div>

<div class="clearfix"></div>
<hr>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('studentGrades.index') !!}" class="btn btn-light">Cancel</a>
</div>

@section('scripts')
    <!-- Relational Form table -->
    <script>
        $(document).ready(function() {
            $('#school_classes').on('change', function() {
                var classId = $(this).val(); // Get selected class ID

                if (classId) {
                    $.ajax({
                        url: '/get-students/' + classId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#student_id').empty(); // Clear the student dropdown
                            // $('#student_id').append(
                            //     '<option value="">Select Student</option>'
                            // ); // Add default option
                            if (data.length > 0) {
                                $('#student_id').removeAttr('disabled');
                            } else {
                                $('#student_id').attr('disabled', 'disabled');
                            }
                            $.each(data, function(index, item) {
                                $('#student_id').append('<option value="' + item.id +
                                    '">' +
                                    item.full_name + '</option>');
                            });
                        },
                        error: function() {
                            $('#student_id').empty();
                            $('#student_id').attr('disabled', 'disabled');
                        }
                    });
                } else {
                    $('#student_id').empty();
                    $('#student_id').append(
                        '<option value="">Select Student</option>'
                    );
                    $('#student_id').attr('disabled', 'disabled');
                }
            });
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
