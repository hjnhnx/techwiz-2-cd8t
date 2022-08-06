<script type="application/javascript">
    var firebaseConfig = {
        apiKey: "AIzaSyBe99gU85yorlzWEMTh6ttpmFLhLHsmr9Q",
        authDomain: "daokhanh-201004.firebaseapp.com",
        databaseURL: "https://daokhanh-201004.firebaseio.com",
        projectId: "daokhanh-201004",
        storageBucket: "daokhanh-201004.appspot.com",
        messagingSenderId: "396333762261",
        appId: "1:396333762261:web:7401d6e1d01640bb62c45c"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    function InitializeFireBaseMessaging() {
        messaging
            .requestPermission()
            .then(function () {
                console.log("Notification Permission")
                return messaging.getToken();
            })
            .then(function (token) {
                console.log("Token: " + token)
                $('[name="device_token"]').val(token);
            })
            .catch(function (reason) {
                console.log(reason)
            })
    }

    messaging.onMessage(function (payload) {
        console.log(payload)
        let notify;
        notify = new Notification(payload.notification.title, {
            body: payload.notification.body,
            image: payload.notification.image,
        });
    })
    messaging.onTokenRefresh(function () {
        messaging.getToken()
            .then(function (newToken) {
                console.log("New token: " + newToken)
            }).catch(function (reason) {
            console.log(reason)
        })
    })

    InitializeFireBaseMessaging()
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var that = document.getElementById('page_active')
        var thiz = document.querySelectorAll('li.nav-item')
        for (let i = 0; i < thiz.length; i++) {
            if (thiz[i].slot === that.value) {
                thiz[i].classList.add('active')
            } else thiz[i].classList.remove('active')
        }
    })
</script>
<script src="{{lib_assets('script/core/jquery.min.js')}}"></script>
<script src="{{lib_assets('script/core/popper.min.js')}}"></script>
<script src="{{lib_assets('script/table.js')}}"></script>
<script src="{{lib_assets('script/core/bootstrap-material-design.min.js')}}"></script>
<script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js')}}"></script>
<script src="{{url('https://unpkg.com/default-passive-events')}}"></script>
<script src="{{lib_assets('script/plpcugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="{{url('https://buttons.github.io/buttons.js')}}"></script>
<!-- Chartist JS -->
<script src="{{lib_assets('script/plugins/chartist.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{lib_assets('script/plugins/bootstrap-notify.js')}}"></script>

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(document).ready(function () {
        $().ready(function () {
            $sidebar = $('.sidebar');

            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');

            window_width = $(window).width();

            $('.fixed-plugin a').click(function (event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-notification span').click(function () {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-notification', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-notification', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-notification', new_color);
                }
            });

            $('.fixed-plugin .background-notification .badge').click(function () {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('background-color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-background-notification', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function () {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function () {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function () {
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').change(function () {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });

            $('.switch-sidebar-mini input').change(function () {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    md.misc.sidebar_mini_active = false;

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                } else {

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                    setTimeout(function () {
                        $('body').addClass('sidebar-mini');

                        md.misc.sidebar_mini_active = true;
                    }, 300);
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function () {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function () {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });
        });
    });

    $(function () {

        let start = moment().subtract(29, 'days');
        let end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
            $.ajax({
                type: "GET",
                url: "/admin/date-range-ride?start_date=" + start.format('YYYY-MM-DD') + "&end_date=" + end.format('YYYY-MM-DD'),
                success: function (resp) {
                    if (start.format('DD/MM/YYYY') === end.format('DD/MM/YYYY')) {
                        $('#dateHeader').html(start.format('DD/MM/YYYY'))
                    } else {
                        $('#dateHeader').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'))
                    }
                    renderDataRide(resp)
                }
            });
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);
    });

    function renderDataRide(data) {
        let objHtml = '';
        if (data.length > 0){
            for (let i = 0; i < data.length; i++) {
                objHtml += html_renderer_ride(data[i])
            }
        }else {
            objHtml = '<p>No data</p>'
        }
        $('#ride_body').html(objHtml);
    }

    function html_renderer_ride(obj) {
        let html = '';
        html += '<tr>'
        html += '<td>' + obj['date'] + '</td>';
        html += '<td>' + obj['count'] + '</td>';
        html += '</tr>';
        return html;
    }

    $(function () {

        let start = moment().subtract(29, 'days');
        let end = moment();

        function cb(start, end) {
            $('#reportrangeBill span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
            $.ajax({
                type: "GET",
                url: "/admin/date-range-bill?start_date=" + start.format('YYYY-MM-DD') + "&end_date=" + end.format('YYYY-MM-DD'),
                success: function (resp) {
                    if (start.format('DD/MM/YYYY') === end.format('DD/MM/YYYY')) {
                        $('#dateHeader').html(start.format('DD/MM/YYYY'))
                    } else {
                        $('#dateHeader').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'))
                    }
                    renderDataBill(resp)
                }
            });
        }

        $('#reportrangeBill').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);
    });

    function renderDataBill(data) {
        let objHtml = '';
        if (data.length > 0) {
            for (let i = 0; i < data.length; i++) {
                objHtml += html_renderer_bill(data[i])
            }
        } else {
            objHtml = '<p>No data</p>'
        }
        $('#bill_body').html(objHtml);
    }

    function html_renderer_bill(obj) {
        let html = '';
        html += '<tr>'
        html += '<td>' + obj['date'] + '</td>';
        html += '<td>' + obj['sum'] + '</td>';
        html += '</tr>';
        return html;
    }

    $(function () {

        let start = moment().subtract(29, 'days');
        let end = moment();

        function cb(start, end) {
            $('#reportrangeTopDrivers span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
            $.ajax({
                type: "GET",
                url: "/admin/date-range-top-drivers?start_date=" + start.format('YYYY-MM-DD') + "&end_date=" + end.format('YYYY-MM-DD'),
                success: function (resp) {
                    if (start.format('DD/MM/YYYY') === end.format('DD/MM/YYYY')) {
                        $('#dateHeaderTopDrivers').html(start.format('DD/MM/YYYY'))
                    } else {
                        $('#dateHeaderTopDrivers').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'))
                    }
                    renderDataTopDrivers(resp)
                }
            });
        }

        $('#reportrangeTopDrivers').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);
    });

    function renderDataTopDrivers(data) {
        let objHtml = '';
        if (data.length > 0) {
            for (let i = 0; i < data.length; i++) {
                objHtml += html_renderer_top_drivers(data[i])
            }
        } else {
            objHtml = '<p>No data</p>'
        }
        $('#top_drivers_body').html(objHtml);
    }

    function html_renderer_top_drivers(obj) {
        let html = '';
        html += '<tr>'
        html += '<td>' + obj['username'] + '</td>';
        html += '<td>' + obj['sum'] + '</td>';
        html += '</tr>';
        return html;
    }

    $(function () {

        let start = moment().subtract(29, 'days');
        let end = moment();

        function cb(start, end) {
            $('#reportrangeTopRiders span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
            $.ajax({
                type: "GET",
                url: "/admin/date-range-top-riders?start_date=" + start.format('YYYY-MM-DD') + "&end_date=" + end.format('YYYY-MM-DD'),
                success: function (resp) {
                    if (start.format('DD/MM/YYYY') === end.format('DD/MM/YYYY')) {
                        $('#dateHeaderTopRiders').html(start.format('DD/MM/YYYY'))
                    } else {
                        $('#dateHeaderTopRiders').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'))
                    }
                    renderDataTopRiders(resp)
                }
            });
        }

        $('#reportrangeTopRiders').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);
    });

    function renderDataTopRiders(data) {
        let objHtml = '';
        if (data.length > 0) {
            for (let i = 0; i < data.length; i++) {
                objHtml += html_renderer_top_riders(data[i])
            }
        } else {
            objHtml = '<p>No data</p>'
        }
        $('#top_riders_body').html(objHtml);
    }

    function html_renderer_top_riders(obj) {
        let html = '';
        html += '<tr>'
        html += '<td>' + obj['username'] + '</td>';
        html += '<td>' + obj['sum'] + '</td>';
        html += '</tr>';
        return html;
    }


</script>

