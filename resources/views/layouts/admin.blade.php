<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        .dropbtn {
            background-color: #3498DB;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropbtn:hover, .dropbtn:focus {
            background-color: #2980B9;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown a:hover {
            background-color: #ddd;
        }

        .show {
            display: block;
        }

        ul {
        }

        .link1 {
        }

        .link1:hover ul .link1 > ul {
            border: 1px solid red;
        }

        ul .link1 > ul {
            border: 1px solid #000;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}"/>
    >
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/blue.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/morris.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/jquery-jvectormap-1.2.2.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/datepicker3.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/daterangepicker-bs3.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/bootstrap3-wysihtml5.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/admin-custom-style.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>


    <!-- Fonts -->


</head>
<body>
<style>
    .showmore {
        cursor: pointer;
        font-weight: bold;
    }
</style>
<div class="wrapper">
    @include('admin.partial.nav')
    @include('admin.partial.sidebar')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </section>
    </div>
</div>


<script>
    $('ul.expandible').each(function () {
        var $ul = $(this),
            $lis = $ul.find('li:gt(4)'),
            isExpanded = $ul.hasClass('expanded');
        $lis[isExpanded ? 'show' : 'hide']();

        if ($lis.length > 0) {
            $ul
                .append($('<span class="showmore"><li class="expand">' + (isExpanded ? 'Show Less' : 'Show More') + '</li></span>')
                    .click(function (event) {
                        var isExpanded = $ul.hasClass('expanded');
                        event.preventDefault();
                        $(this).html(isExpanded ? 'Show More' : 'Show Less');
                        $ul.toggleClass('expanded');
                        $lis.toggle();
                    }));
        }
    });
</script>


{{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>--}}

<script src="{{asset('jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->

<!-- Morris.js charts -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>--}}
<script src="{{asset('js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('js/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('js/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('js/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('js/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>--}}
<script src="{{asset('js/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('js/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('js/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('js/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('js/demo.js')}}"></script>

<script src="{{asset('jquery/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('jquery/jquery.dataTables.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/bootstrap-submenu-script.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>


<!-- /.col -->
<script>
    $(function () {
        $("#example1").DataTable({
            "language": {
                "paginate": {
                    "next": "بعدی",
                    "previous": "قبلی"
                }
            },
            "info": false,
        });
        $('#example2').DataTable({
            "language": {
                "paginate": {
                    "next": "بعدی",
                    "previous": "قبلی"
                }
            },
            "info": false,
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "autoWidth": false
        });
    });
    jquery(document).ready(function ($) {
        $('select.select2').select2();
    });
</script>

<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
    });
</script>


<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function (event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>

<script>

    $(document).ready(function () {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div><input type="file" style=" display: inline-block;margin: 5px;width: 80%" class="form-control" name="product_item[]"/><a href="#" style="display: inline-block" class="remove_field"><i style="color: red" class="fa fa-remove"></i></a></div>'); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });

    $(document).ready(function () {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_new"); //Fields wrapper
        var add_button = $(".add_field_new"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div>' +
                    '<input placeholder="عنوان ویژگی" type="text" style=" display: inline-block;margin: 5px;width: 45%" class="form-control" name="property_title[]"/>' +
                    '<input placeholder="نام ویژگی" type="text" style=" display: inline-block;margin: 5px;width: 45%" class="form-control" name="property_name[]"/>' +
                    '<a href="#" style="display: inline-block;text-align: center;" class="remove_field"><i style=" text-align:center;color: red" class="fa fa-remove"></i></a></tbody>'); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });

    $(document).ready(function () {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields"); //Fields wrapper
        var add_button = $(".add_field"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div>' +
                    '<input placeholder="عنوان ویژگی" type="text" style=" display: inline-block;margin: 5px;width: 45%" class="form-control" name="property_title[]"/>' +

                    '<a href="#" style="display: inline-block;text-align: center;" class="remove_field"><i style=" text-align:center;color: red" class="fa fa-remove"></i></a></tbody>'); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
    $(document).ready(function () {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields"); //Fields wrapper
        var add_button = $(".add_field_city"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div>' +
                    '<input placeholder="نام شهر" type="text" style=" display: inline-block;margin: 5px;width: 45%" class="form-control" name="city[]"/>' +

                    '<a href="#" style="display: inline-block;text-align: center;" class="remove_field"><i style=" text-align:center;color: red" class="fa fa-remove"></i></a></tbody>'); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });


    $(document).ready(function () {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_banner"); //Fields wrapper
        var add_button = $(".add_field_banner"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div>' +
                    <?php
                        $categoryIT = \App\Models\Category::IdTitles();

                        ?>
                    '\n' +
                    '            <div class="input-group mb-3">\n' +
                    '                <div class="input-group-prepend">\n' +
                    '                    <span class="input-group-text-1">  دسته بندی </span>\n' +
                    '                </div>\n' +
                    '                <select name="category[]" style="" class="form-control ass js-example-basic-multiple">\n' +
                    '                    <option value="0"></option>\n' +
                    ' <?php
                        foreach ($categoryIT as $id => $title){
                        ?> ' +
                    '      <option value="' +
                    '<?php echo $id ?> ' +
                    '">' +
                    '<?php echo $title ?>' +
                    '</option>\n' +
                    ' <?php
                        }


                        ?> ' +
                    '                </select>\n' +
                    '            </div>' +
                    '<div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text">بارگزاری عکس</span></div><input type="file" name="image_item[]" class="form-control" placeholder="عکس"/></div>' +
                    '<a href="#" style="display: inline-block;text-align: center;" class="remove_field"><i style=" text-align:center;color: red" class="fa fa-remove"></i></a></tbody>'); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
</script>


</body>

</html>



