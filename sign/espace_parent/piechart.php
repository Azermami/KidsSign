<?php



$db = new mysqli('localhost', 'root', '', 'sourd');






// Retrieve the total number of id_demande
$sql = "SELECT COUNT(id_demande) AS total FROM demande";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_id_demande = $row['total'];



// Retrieve the total number of id_demande where id_parent is equal to $_SESSION['id_parent']
$sql = "SELECT COUNT(id_demande) AS total FROM demande WHERE id_parent = '{$_SESSION['id_parent']}'";
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
 labels: ['Nombre total des mots', 'Nombre des mots proposés'],
 dataLabels: {
 enabled: true,
 formatter: function (val) {
 return val.toFixed(0);
 }
 }
 }).render();
 });
</script>