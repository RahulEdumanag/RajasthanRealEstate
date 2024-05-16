 <footer class="content-footer footer bg-footer-theme">
     <div class="container-xxl">
         <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
             <div>
                 ©
                 2024
                 , made with ❤️ by
                 <a href="https://edumanag.com/" target="_blank" class="fw-medium">Edumanag</a>
             </div>
         </div>
     </div>
 </footer>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

 <!-- JavaScript Libraries -->
 <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
 <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
 <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
 <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
 <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
 <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
 <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
 <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
 <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

 <!-- Vendors JS -->
 <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
 <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
 <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

 <!-- Main JS -->
 <script src="{{ asset('assets/js/main.js') }}"></script>
 <script src="{{ asset('assets/js/custom.js') }}"></script>



 <!-- Confirm Delete Function -->
 <script>
     function confirmDelete(button) {
         if (confirm("Are you sure you want to delete this item?")) {
             var form = button.parentElement;
             form.submit();
         } else {
             alert("Delete operation cancelled.");
         }
     }
 </script>

 <!-- Confirm Inactive Function -->
 <script>
     function confirmInactive(guestId) {
         var confirmed = confirm("Are you sure you want to set this guest as inactive?");
         if (confirmed) {
             window.location.href = "{{ URL::to('admin/guest/inactive') }}/" + guestId;
         } else {
             // Do something else if not confirmed
         }
     }
 </script>

 <!-- Confirm Inactive Function -->
 <script>
     function confirmInactive(guestId) {
         var confirmed = confirm("Are you sure you want to set this guest as inactive?");
         if (confirmed) {
             window.location.href = "{{ URL::to('admin/guest/inactive') }}/" + guestId;
         } else {
             // Do something else if not confirmed
         }
     }
 </script>


 <!-- selected image display  -->

 <script>
     function displaySelectedImage(input, fileNameId, previewId) {
         var selectedFileName = input.files[0].name;
         document.getElementById(fileNameId).value = selectedFileName;


         var reader = new FileReader();
         reader.onload = function(e) {
             document.getElementById(previewId).src = e.target.result;
             document.getElementById(previewId).style.display = 'block';
         };
         reader.readAsDataURL(input.files[0]);
     }
 </script>


 <!-- Checkbox Change Function -->
 <script>
     function handleCheckboxChange(checkbox) {
         const icon = checkbox.parentElement.querySelector('.icon');
         if (checkbox.checked) {
             icon.classList.add('icon-moved');

         } else {
             icon.classList.remove('icon-moved');

         }
     }

     function selectImage(inputId) {
         $('#' + inputId).click();
     }
 </script>

 <!-- For success message display username and password -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>


 <script>
     // Initialize Clipboard.js
     var clipboard = new ClipboardJS('.btn');

     // Display success message on successful copy
     clipboard.on('success', function(e) {
         e.clearSelection();
         alert('Copied to clipboard!');
     });

     // Display error message on copy failure
     clipboard.on('error', function(e) {
         alert('Copy failed. Please select and copy manually.');
     });

     function removeSuccessAlert() {
         var successAlert = document.getElementById('success-alert');
         if (confirm('Are you sure you want to remove this message?')) {
             successAlert.remove();
         }
     }

     function removeEmployeeAlert() {
         var employeeAlert = document.getElementById('employee-alert');
         if (confirm('Are you sure you want to remove this message?')) {
             employeeAlert.remove();
         }
     }
 </script>


 <!-- for reset form fields  -->

 <script>
     function confirmReset() {
         if (confirm('Are you sure you want to reset the form?')) {
             // Reset the form using JavaScript
             document.getElementById('register-form').reset();
         }
     }
 </script>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


 <!-- DataTable Script -->
 <script>
     $(document).ready(function() {
         $('#footerDataTable').DataTable({
             "paging": true,
             "searching": true,
             "lengthMenu": [10, 25, 50, 100],
             "oLanguage": {
                 "oPaginate": {
                     "sNext": "&#8594;",
                     "sPrevious": "&#8592;"
                 }
             },
             "dom": '<"top"f>rt<"bottom"lip><"clear">'
         });
     });
 </script>

 <!-- Drag and drop function  -->

 <script>
    $(document).ready(function() {
        $(".DragNdDrop").sortable({
            axis: "y",
            handle: ".drag-handle",
            update: function(event, ui) {
                var order = $(this).sortable('toArray', {
                    attribute: 'data-id'
                });

                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.slider.updateOrder') }}',
                    data: {
                        order: order,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        }).on('touchstart', function(event) {
            event.preventDefault(); // Add passive: true for touchstart event
        });
    });
</script>
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->





<script>
     document.querySelectorAll('.applyCK').forEach(function(element) {
        CKEDITOR.replace(element, {
            filebrowserUploadUrl: "{{ route('admin.images.upload') }}",
            filebrowserUploadMethod: 'form',
            filebrowserImageBrowseUrl: "{{ route('admin.images.browse') }}",
            filebrowserImageBrowseMethod: 'get',
            height: 300,
            extraPlugins: 'colorbutton,justify,font,smiley,link,templates',
            colorButton_enableMore: true,
            colorButton_colors: '00BCD4,8BC34A,FFC107,FF5722,673AB7,F44336,2196F3,4CAF50',
            toolbar: [
                ['Source', 'Bold', 'Italic', 'Underline', 'TextColor', 'BGColor', 'NumberedList',
                    'BulletedList', 'Link', 'Unlink', 'Blockquote', 'JustifyLeft', 'JustifyCenter',
                    'JustifyRight', 'JustifyBlock', 'Indent', 'Outdent', 'RemoveFormat', 'Subscript',
                    'Superscript', 'HorizontalRule', 'SpecialChar', 'Image', 'Table', 'Smiley', 'Styles',
                    'Format', 'Font', 'FontSize', 'Maximize', 'PasteText', 'PasteFromWord', 'Undo', 'Redo'
                ],
                ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt'],
                ['Templates', 'CodeSnippet'] // Add 'CodeSnippet' for source tool button
            ],
            templates: 'default',
            fontSize_sizes: '8/8px;9/9px;10/10px;11/11px;12/12px;14/14px;16/16px;18/18px;20/20px;22/22px;24/24px;28/28px;32/32px;36/36px',
            filebrowserImageUploadUrl: "{{ route('admin.images.upload') }}",
            filebrowserImageBrowseUrl: "{{ route('admin.images.browse') }}",
            filebrowserImageBrowseMethod: 'get',
            filebrowserUploadMethod: function(url, result, formData) {
                result = JSON.parse(result);
                if (result.uploaded) {
                    return result.url;
                } else {
                    console.error('Error uploading image:', result.error.message);
                    return '';
                }
            },
        });
    });
</script>
