<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('front/meta'); ?>
    <!-- Logo Top -->
    <link rel="icon" href="assets/img/logo1.png">    
    <!-- ChartJS -->
    <script src="<?php echo base_url('assets/template/frontend/') ?>plugins/chart.js/Chart.min.js"></script>
    <!-- ChartJS Plugins-->
    <script src="<?php echo base_url('assets/template/frontend/') ?>plugins/chartjs-plugin-labels.min.js"></script>
</head>

<body>
    <!-- Navigation -->
    <?php $this->load->view('front/navbar'); ?>

    <!-- Main Content -->
    <div class="container">
        <div class="chart-container text-center mx-auto" style="position: relative; height:20vh; width:70vw">
            <canvas id="myChart"></canvas>
        </div>
        <div class="py-2" style="margin-bottom: 20vh"></div>
    </div>

    <!-- Footer -->
    <?php $this->load->view('front/footer'); ?>

    <!-- Javascript -->
    <?php $this->load->view('front/js'); ?>

    <!-- page script -->
    <script>
        new Chart(document.getElementById("chartjs-4"), {
            "type": "pie",
            "data": {
                "labels": ["Red", "Blue", "Yellow"],
                "datasets": [{
                    "label": "OSIS",
                    "data": [300, 50, 100],
                    "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"]
                }]
            },
        });
    </script>
    <script>
        let myChart = document.getElementById('myChart').getContext('2d');

        // Global Options
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 12;
        Chart.defaults.global.defaultFontColor = '#777';

        let massPopChart = new Chart(myChart, {
            type: 'pie', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data: {
                labels: ['01', '02', '03', '04', '05'],
                datasets: [{
                    label: 'Data Suara',
                    data: [
                        61,
                        18,
                        15,
                        10,
                        15
                    ],
                    //backgroundColor:'green',
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1,
                    borderColor: '#fff',
                    hoverBorderWidth: 2,
                    hoverBorderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                responsiveAnimationDuratio: 200,
                maintainAspectRatio: true,
                title: {
                    display: true,
                    text: 'Hasil Suara Sementara',
                    fontSize: 25,
                    fontColor: '#000'
                },
                legend: {
                    display: false,
                    position: 'top',
                    labels: {
                        fontColor: '# 000 '
                    }
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        bottom: 0,
                        top: 40
                    }
                },
                tooltips: {
                    enabled: true
                },
                plugins: {
                    labels: [{
                            render: 'label',
                            // arc: true,
                            fontColor: '#000',
                            position: 'outside',
                            // outsidePadding: 4,
                            textMargin: 10,
                            fontStyle: 'bold',
                            fontSize: 21
                        },
                        {
                            render: 'percentage',
                            fontColor: 'white',
                            fontStyle: 'bold',
                            fontSize: 18,
                            precision: 2
                        }
                    ]
                }
            }
        });
    </script>
</body>

</html>