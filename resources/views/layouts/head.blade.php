    <meta charset="utf-8" />
    <title>Inventory </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/back/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/back/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/back/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/back/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('/assets/back/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/back/global/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/back/global/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/back/global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset('/assets/back/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ asset('/assets/back/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{ asset('/assets/back/layouts/layout4/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/back/layouts/layout4/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ asset('/assets/back/layouts/layout4/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/back/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/back/global/plugins/bootstrap-fileinput/css/fileinput.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />

    <!-- BEGIN CORE PLUGINS -->
    <script src="{{ asset('/assets/back/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script src="{{ asset('/assets/back/global/plugins/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/morris/raphael-min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/counterup/jquery.waypoints.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/amcharts/amcharts/amcharts.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/amcharts/amcharts/serial.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/amcharts/amcharts/pie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/amcharts/amcharts/radar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/amcharts/amcharts/themes/light.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/amcharts/amcharts/themes/patterns.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/amcharts/amcharts/themes/chalk.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/amcharts/ammap/ammap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/amcharts/ammap/maps/js/worldLow.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/amcharts/amstockcharts/amstock.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/horizontal-timeline/horozontal-timeline.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/flot/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/flot/jquery.flot.categories.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/jqvmap/jqvmap/jquery.vmap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{ asset('/assets/back/global/scripts/app.min.js') }}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('/assets/back/pages/scripts/dashboard.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{ asset('/assets/back/layouts/layout4/scripts/layout.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/layouts/layout4/scripts/demo.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
    <link href="{{ asset('/assets/back/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet">
    <script src="{{ asset('/assets/back/global/plugins/bootstrap-toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('/assets/back/global/plugins/bootstrap-toastr/custom_toast.js') }}"></script>

    <link href="{{ asset('/assets/back/global/plugins/bootstrap-select/css/bootstrap-select.min.css ') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/back/global/plugins/jquery-multi-select/css/multi-select.css ') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/back/global/plugins/select2/css/select2.css" rel="stylesheet') }}" type="text/css" />
    <link href="{{ asset('/assets/back/global/plugins/select2/css/select2-bootstrap.min.css ') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('/assets/back/global/plugins/bootstrap-select/js/bootstrap-select.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/jquery-multi-select/js/jquery.multi-select.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>

    <link href="{{ asset('/assets/back/global/plugins/datatables/datatables.min.css ') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/back/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css ') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('/assets/back/global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>

    <script src="{{ asset('/assets/back/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>

    <link href="{{ asset('/assets/back/global/plugins/bootstrap-sweetalert/sweetalert.css ') }}" rel="stylesheet" />
    <script src="{{ asset('/assets/back/global/plugins/bootstrap-sweetalert/sweetalert.min.js ') }}"></script>
    <script src="{{ asset('/assets/back/global/plugins/fancybox/source/jquery.fancybox.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/back/global/plugins/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/update/update.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
    	var _base_url = '{{ url() }}';
    </script>
