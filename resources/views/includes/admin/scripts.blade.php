
 <!-- jQuery  -->
        <script src="{{asset('admin_assets/assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('admin_assets/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('admin_assets/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('admin_assets/assets/js/metisMenu.min.js')}}"></script>
        <script src="{{asset('admin_assets/assets/js/waves.js')}}"></script>
        <script src="{{asset('admin_assets/assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('admin_assets/assets/js/modernizr.min.js')}}"></script>

        <!-- Flot chart -->
        <script src="{{asset('admin_assets/plugins/flot-chart/jquery.flot.min.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/flot-chart/jquery.flot.time.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/flot-chart/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/flot-chart/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/flot-chart/jquery.flot.crosshair.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/flot-chart/curvedLines.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/flot-chart/jquery.flot.axislabels.js')}}"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="admin_assets/plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="{{asset('admin_assets/plugins/jquery-knob/jquery.knob.js')}}"></script>

                <!-- Bootstrap fileupload js -->
        <script src="{{asset('admin_assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>

        <!-- Dropzone js -->
        <script src="{{asset('admin_assets/plugins/dropzone/dropzone.js')}}"></script>

                <!-- Toastr js -->
        <script src="{{asset('admin_assets/plugins/jquery-toastr/jquery.toast.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin_assets/assets/pages/jquery.toastr.js')}}" type="text/javascript"></script>

        <!-- App js -->
        <script src="{{asset('admin_assets/assets/js/jquery.core.js')}}"></script>
        <script src="{{asset('admin_assets/assets/js/jquery.app.js')}}"></script>

                <!-- plugin js -->
        <script src="{{asset('admin_assets/plugins/moment/moment.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/bootstrap-timepicker/bootstrap-timepicker.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

        <!-- Init js -->
        <script src="{{asset('admin_assets/assets/pages/jquery.form-pickers.init.js')}}"></script>

        <!-- Required datatable js -->
        <script src="{{asset('admin_assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{asset('admin_assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/datatables/jszip.min.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/datatables/buttons.print.min.js')}}"></script>

        <!-- Key Tables -->
        <script src="{{asset('admin_assets/plugins/datatables/dataTables.keyTable.min.js')}}"></script>

        <!-- Responsive examples -->
        <script src="{{asset('admin_assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

        <!-- Selection table -->
        <script src="{{asset('admin_assets/plugins/datatables/dataTables.select.min.js')}}"></script>

        {{-- My Script for uploading normal Form and dropzone media --}}
        <script>
            submitform = function(){
            document.getElementById("form1").submit();
            // document.getElementById("form2").submit();
            }

            $(document).ready(function() {
                // Default Datatable
                $('.datatable').DataTable();                
            } );

            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf']
            });

            table.buttons().container()
                    .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        </script>

        <script type="text/javascript">
            // Display Success messages
            @if(session()->has('success_message'))
            // alert('Success');
                //toastr.success('');
                $.toast({
                    heading: 'Well done!',
                    text: '{{ session()->get('success_message') }}',
                    position: 'top-right',
                    loaderBg: '#5ba035',
                    icon: 'success',
                    hideAfter: 5000,
                    stack: 1
                });
            @endif

            // Display Error messages
            @if(session()->has('error_message'))
                // toastr.error('');
                $.toast({
                    heading: 'Oh snap!',
                    text: '{{ session()->get('error_message') }}',
                    position: 'top-right',
                    loaderBg: '#bf441d',
                    icon: 'error',
                    hideAfter: 5000,
                    stack: 1
                });
            @endif

            // Display Error messages
            @if(session()->has('warning_message'))
                // toastr.warning('');
                $.toast({
                    heading: 'Holy guacamole!',
                    text: '{{ session()->get('warning_message') }}',
                    position: 'top-right',
                    loaderBg: '#da8609',
                    icon: 'warning',
                    hideAfter: 5000,
                    stack: 1
                });
            @endif

            // Display Error messages
            @if(session()->has('info_message'))
                // toastr.info('');
                $.toast({
                    heading: 'Heads up!',
                    text: '{{ session()->get('info_message') }}',
                    position: 'top-right',
                    loaderBg: '#3b98b5',
                    icon: 'info',
                    hideAfter: 5000,
                    stack: 1
                });
            @endif
        </script>


