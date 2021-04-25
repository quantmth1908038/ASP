

<section class="content">


    <div class="col-md-6">
        <!-- new and access month data  CHART -->
        <div class="box box-primary">
            <div class="box-header with-border text-center">
                {{--<h3 class="box-title"> NEW USER AND QUANTITY ACCESS IN MONTH BEFORE</h3>--}}
                <h3 class="box-title"> DAU </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="chart">
                    <canvas id="accessMonthChart" style="height: 250px; "></canvas>
                </div>
            </div>

        </div>
        <!-- /.new and access month data  CHART -->
        <!-- paidFees CHART -->
        <div class="box box-success">
            <div class="box-header with-border text-center">
                {{--<h3 class="box-title">PAID FEES USER AND USED USER 12 MONTH BEFORE</h3>--}}
                <h3 class="box-title">Number of paid members</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>

            </div>
            <div class="box-body">
                <div class="chart">
                    <canvas id="paidFeesChart" style="height:250px"></canvas>
                </div>
            </div>
        </div>
        <!-- /.paidFees CHART -->


    </div>


    <div class="col-md-6">
        <!-- ACCESS YEAR CHART -->
        <div class="box box-info">
            <div class="box-header with-border text-center">
                {{--<h3 class="box-title">QUANTITY ACCESS 12 MONTH BEFORE </h3>--}}
                <h3 class="box-title">MAU </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="chart">
                    <canvas id="accessYearChart" style="height:250px"></canvas>
                </div>
            </div>

        </div>
        <!-- /.ACCESS YEAR CHART -->

        <!-- average_duration chart-->
        <div class="box box-danger">
            <div class="box-header with-border text-center">
                {{--<h3 class="box-title">AVERAGE DURATION</h3>--}}
                <h3 class="box-title"> Average duration</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <canvas id="averageDurationChart" style="height:250px"></canvas>
            </div>

        </div>


    </div>


</section>


<script>
    $(function () {

//get label charts day or month before
        function newDate(days) {

            let checkpoint = moment("{{ $created_at }}");
            return checkpoint.subtract(days, 'day').format('DD');

        }

        function newMonth(months) {

            let checkpoint = moment("{{ $created_at }}");
            return  checkpoint.subtract(months, 'month').format('MM');

        }

        var labelDayBefore = [];
        var labelMonthBefore = [];

        for( var i = 30; i>= 1; i--) {

            labelDayBefore.push(newDate(i));
        }

        for(var i =12; i>=1 ;i--) {

            labelMonthBefore.push(newMonth(i)+'ヶ月');

        }


        //Access month
        var accessMonthChartdata = {
            labels  : labelDayBefore,
            datasets: [
                {
                    label               : 'NEW USER',
                    borderColor         : 'rgb(242, 113, 115)',
                    backgroundColor     : 'rgb(242, 113, 115)',
                    fill                :'false',
                    data                : [{{ $new_user_month }}],

                },
                {
                    label               : 'USER ACCESS',
                    borderColor         : 'rgb(60, 141, 188)',
                    backgroundColor     : 'rgb(60, 141, 188)',
                    fill                :'false',
                    data                : [{{ $access_month }}],

                }
            ]
        };

        var accessMonthChartOption = {
            responsive      : true,
            hoverMode       : 'index',
            stacked         : false,
            datasetFill     : false ,
            title: {
                display     : false,
                text        : 'NEW USER AND QUANTITY ACCESS IN MONTH'
            },

        };


        var accessMonthChartCanvas = document.getElementById('accessMonthChart').getContext('2d');
        var accessMonthChart       = new Chart(accessMonthChartCanvas, {
            type: 'line',
            data: accessMonthChartdata,
            options: accessMonthChartOption,
        });

        // /access month

        //Access year chart
        var accessYearChartdata = {
            labels  : labelMonthBefore,
            datasets: [
                {
                    label               : ' USER ACCESS ',
                    borderColor         : 'rgb(242, 113, 115)',
                    backgroundColor     : 'rgb(242, 113, 115)',
                    fill                :'false',
                    data                : [{{ $access_year }}],

                }
            ]
        };

        var accessYearChartOption = {
            responsive      : true,
            hoverMode       : 'index',
            stacked         : false,
            datasetFill     : false,
            title: {
                display     : false,
                text        : 'USER ACCESS IN 12 MONTH BEFORE'
            },
        };


        var accessYearChartCanvas = document.getElementById('accessYearChart').getContext('2d');
        var accessYearChart       = new Chart(accessYearChartCanvas, {
            type: 'line',
            data: accessYearChartdata,
            options: accessYearChartOption,
        });

        //Paid fees user quantity charts
        var paidFeesChartdata = {
            labels  : labelMonthBefore,
            datasets: [

                {
                    label               : ' USED USER',
                    borderColor         : 'rgb(60, 141, 188)',
                    backgroundColor     : 'rgb(60, 141, 188)',
                    fill                :'false',
                    data                : [{{ $user_year }}],

                },
                {
                    label               : ' PAID FEES USER',
                    borderColor         : 'rgb(242, 113, 115)',
                    backgroundColor     : 'rgb(242, 113, 115)',
                    fill                :'false',
                    data                : [{{ $paid_fees_user_year }}],

                }
            ]
        };
        var paidFeesChartOption = {
            responsive      : true,
            hoverMode       : 'index',
            stacked         : false,
            datasetFill     : false,
            title: {
                display     : false,
                text        : 'PAID FEES USER AND USED USER IN 12 MONTH BEFORE '
            },

        };


        var paidFeesChartCanvas = document.getElementById('paidFeesChart').getContext('2d');
        var paidFeesChart       = new Chart(paidFeesChartCanvas, {
            type: 'bar',
            data: paidFeesChartdata,
            options: paidFeesChartOption,
        });


        //average_duration CHART

        var averageDurationChartdata = {
            labels  : ['1ヶ月','2~3ヶ月','4ヶ月~6ヶ月','7ヶ月~12ヶ月','13ヶ月以上'],
            datasets: [
                {
                    label               : 'AVERAGE DURATION ',
                    borderColor         : '#fff',
                    backgroundColor     : ['#f56954','#00a65a','#f39c12','#00c0ef','#3c8dbc'],
                    fill                :'false',
                    data                : [{{ $average_duration }}],

                },

            ]
        };
        var averageDurationChartOption = {
            responsive      : true,
            hoverMode       : 'index',
            stacked         : false,
            datasetFill     : false,
            title: {
                display     : false,
                text        : 'AVERAGE DURATION '
            },

        };


        var averageDurationChartCanvas = document.getElementById('averageDurationChart').getContext('2d');
        var averageDurationChart       = new Chart(averageDurationChartCanvas, {
            type: 'pie',
            data: averageDurationChartdata,
            options: averageDurationChartOption,
        });


    })
</script>
