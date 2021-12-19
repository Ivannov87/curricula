<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Resumen Documentación</h4>
                <canvas id="doughnutChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-sm-3"></div>
</div>

<script>
    $(document).ready(function() {
        const ctx = document.getElementById("doughnutChart");
        const myChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: ["Básica", "C. Ingeniería", "D. Ingeniería", "C. SOC. y HUM."],
                datasets: [{
                    label: "# Documentos x Área",
                    data: [
                        <?php
                            $totales = new EstadisticaC();
                            $totales->Resumen();
                        ?>
                    ],

                    backgroundColor: [
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                        "rgba(255, 206, 86, 0.2)",
                        "rgba(75, 192, 192, 0.2)"

                    ],
                    borderColor: [
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(75, 192, 192, 1)",

                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>