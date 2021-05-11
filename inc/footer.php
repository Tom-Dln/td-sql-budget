    </main>
    <footer>


    </footer>
    <!-- JS Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/4cfbd32d63.js" crossorigin="anonymous"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- JS Custom -->
    <script src="assets/js/script.js"></script>
    <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Dépenses', 'Restants'],
                datasets: [{
                    label: 'Dépenses par rapport aux Revenus',
                    data: [$("canvas").data("expenses"), $("canvas").data("incomes")],
                    backgroundColor: [
                        'rgba(57, 68, 247, 1)',
                        'rgba(191, 35, 109, 1)',
                    ],
                }]
            }
        });
    </script>
    </body>

</html>