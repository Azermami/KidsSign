<?php






$db = new mysqli('localhost', 'root', '', 'sourd');









// Retrieve the total number of id_demande

$sql = "SELECT COUNT(id_interpret) AS total FROM affectation";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$total_id_demande = $row['total'];






// Retrieve the total number of id_id_interpretdemande where id_interpret is equal to $_SESSION['id_interpret']

$sql = "SELECT COUNT(id_interpret) AS total FROM affectation WHERE id_interpret = '{$_SESSION['id_interpret']}'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$total_id_demande_parent = $row['total'];

?>






<!-- Display the donut chart -->

<div id="donutChart"></div>

<script>

 document.addEventListener("DOMContentLoaded", () => {

 new ApexCharts(document.querySelector("#donutChart"), {

 series: [<?php echo $total_id_demande; ?>, <?php echo $total_id_demande_parent; ?>],

 chart: {

 height: 350,

 type: 'donut',

 toolbar: {

 show: true

 }

 },

 labels: ['Nombre total des affectations', 'Nombre des mots affecter par cette interpret'],

 dataLabels: {

 enabled: true,

 formatter: function (val) {

 return val.toFixed(0);

 }

 }

 }).render();

 });

</script>