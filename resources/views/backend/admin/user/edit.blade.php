<form id='edit'   action="{{ route('update', ['id' => $user->id]) }}" enctype="multipart/form-data" method="POST" accept-charset="utf-8" class="needs-validation"
      novalidate>
      @csrf
      @method('PATCH')
    
    <div class="form-row">
        <div id="status"></div>
        <div class="form-group col-md-4 col-sm-12">
            <label for=""> Name </label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" placeholder=""
                   required>
            <span id="error_name" class="has-error"></span>        </div>
        <div class="form-group col-md-4 col-sm-12">
            <label for=""> Email </label>
            <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder=""
                   readonly required>
            <span id="error_email" class="has-error"></span>        </div>
        <div class="form-group col-md-4 col-sm-12">
            <label for=""> Password </label>
            <input type="text" class="form-control" id="password" name="password" value="" placeholder=""
                   required>
            <span id="error_password" class="has-error"></span>        </div>
        <div class="clearfix"></div>
        <div class="col-md-8">
            <label for="photo">Logo (File must be jpg, jpeg, png)</label>
            <div class="input-group">
                <input id="photo" type="file" name="photo" style="display:none">
                <div class="input-group-prepend">
                    <a class="btn btn-secondary text-white" onclick="$('input[id=photo]').click();">Browse</a>
                </div>
                <input type="text" name="SelectedFileName" class="form-control" id="SelectedFileName"
                       value="{{$user->file_path}}" readonly>
            </div>
            <script type="text/javascript">
                $('input[id=photo]').change(function () {
                    $('#SelectedFileName').val($(this).val());
                });
            </script>
            <span id="error_photo" class="has-error"></span>        </div>
        <div class="form-group col-md-4">
            <label for=""> Status </label><br/>
            <input type="radio" name="status" class="flat-green"
                   value="1" {{ ( $user->status == 1 ) ? 'checked' : '' }} /> Active
            <input type="radio" name="status" class="flat-green"
                   value="0" {{ ( $user->status == 0 ) ? 'checked' : '' }}/> In Active
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-12 col-md-12 mb-3 mt-3">
            <strong>Assign Role: </strong>
            <div class='row mb-3 mt-3'>
                @foreach($roles as $role)
                    @if($role->guard_name != 'admin')
                        <div class="col-md-2 col-sm-12">
                            {{Form::checkbox('roles[]',  $role->id, $user->roles->contains($role->id), array('class'=>'data-check flat-green')) }}
                            {{Form::label($role->name, ucfirst($role->name), array('class'=>'')) }}
                        </div>
                  @endif
                @endforeach
            </div>
        </div>
        <div class="col-md-12 mb-3 mt-3">
            <button type="submit" class="btn btn-success button-submit"
                    data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
            </button>
        </div>
    </div>
</form>
<script>

    $(document).ready(function () {
        $('input[type="checkbox"].flat-green').iCheck({
            checkboxClass: 'icheckbox_flat-green',
        });
        $('input[type="radio"].flat-green').iCheck({
            radioClass: 'iradio_flat-green'
        });

        $('#edit').validate({// <- attach '.validate()' to your form
            // Rules for form validation
            rules: {
                name: {
                    required: true
                }
            },
            // Messages for form validation
            messages: {
                name: {
                    required: 'Enter Role Name'
                }
            },
            submitHandler: function (form) {

                var list_id = [];
                $(".data-check:checked").each(function () {
                    list_id.push(this.value);
                });

                var myData = new FormData($("#edit")[0]);
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                myData.append('_token', CSRF_TOKEN);
                myData.append('roles', list_id);

                swal({
                    title: "Confirm to assign " + list_id.length + " roles",
                    text: "Assign Role",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Assign!"
                }, function () {

                    $.ajax({
    url: '{{ route('admin.update') }}',
    type: 'PATCH',
    data: myData,
                        dataType: 'json',
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function (data) {

                            if (data.type === 'success') {
                                swal("Done!", "It was succesfully done!", "success");
                                reload_table();
                                notify_view(data.type, data.message);
                                $('#loader').hide();
                                $("#submit").prop('disabled', false); // disable button
                                $("html, body").animate({scrollTop: 0}, "slow");
                                $('#myModal').modal('hide'); // hide bootstrap modal

                            } else if (data.type === 'error') {
                                if (data.errors) {
                                    $.each(data.errors, function (key, val) {
                                        $('#error_' + key).html(val);
                                    });
                                }
                                $("#status").html(data.message);
                                $('#loader').hide();
                                $("#submit").prop('disabled', false); // disable button
                                swal("Error sending!", "Please try again", "error");

                            }

                        }
                    });
                });

            }
            // <- end 'submitHandler' callback
        });                    // <- end '.validate()'

    });
</script>