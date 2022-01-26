<?php
error_reporting(E_ERROR | E_PARSE);
include 'banco.php';

// SELECT MES JANEIRO 
$sql = "SELECT SUM(VALOR_MENSAL) as quantidade FROM TB_CONTRATO WHERE MONTH(DATA_INICIO_CONT) = 1";
$resultado = mysqli_query($db, $sql);
$total = mysqli_num_rows($resultado);
$linha = mysqli_fetch_assoc($resultado); 
if ($total){
	do{
    //$janeiro =  $linha["quantidade"];
    if($linha["quantidade"] == null){
        $janeiro = "0";
    }else {
        $janeiro = $linha["quantidade"];
    }
}
while ($linha = mysqli_fetch_assoc($resultado));
  mysqli_free_result($resultado); 
}
// SELECT MES FEVEREIRO
$sql = "SELECT SUM(VALOR_MENSAL) as quantidade FROM TB_CONTRATO WHERE MONTH(DATA_INICIO_CONT) = 2";
$resultado = mysqli_query($db, $sql);
$total = mysqli_num_rows($resultado);
$linha = mysqli_fetch_assoc($resultado); 
if ($total){
	do{
    //$fevereiro =  $linha["quantidade"];
    if($linha["quantidade"] == null){
        $fevereiro = "0";
    }else {
        $fevereiro = $linha["quantidade"];
    }
}
while ($linha = mysqli_fetch_assoc($resultado));
  mysqli_free_result($resultado); 
}
// SELECT MES MARCO
$sql = "SELECT SUM(VALOR_MENSAL) as quantidade FROM TB_CONTRATO WHERE MONTH(DATA_INICIO_CONT) = 3";
$resultado = mysqli_query($db, $sql);
$total = mysqli_num_rows($resultado);
$linha = mysqli_fetch_assoc($resultado); 
if ($total){
	do{
    //$marco =  $linha["quantidade"];
    if($linha["quantidade"] == null){
        $marco = "0";
    }else {
        $marco = $linha["quantidade"];
    }
}
while ($linha = mysqli_fetch_assoc($resultado));
  mysqli_free_result($resultado); 
}
// SELECT MES ABRIO
$sql = "SELECT SUM(VALOR_MENSAL) as quantidade FROM TB_CONTRATO WHERE MONTH(DATA_INICIO_CONT) = 4";
$resultado = mysqli_query($db, $sql);
$total = mysqli_num_rows($resultado);
$linha = mysqli_fetch_assoc($resultado); 
if ($total){
	do{
    //$abril =  $linha["quantidade"];
    if($linha["quantidade"] == null){
        $abril = "0";
    }else {
        $abril = $linha["quantidade"];
    }
}
while ($linha = mysqli_fetch_assoc($resultado));
  mysqli_free_result($resultado); 
}
// SELECT MES MAIO
$sql = "SELECT SUM(VALOR_MENSAL) as quantidade FROM TB_CONTRATO WHERE MONTH(DATA_INICIO_CONT) = 5";
$resultado = mysqli_query($db, $sql);
$total = mysqli_num_rows($resultado);
$linha = mysqli_fetch_assoc($resultado); 
if ($total){
	do{
    //$maio =  $linha["quantidade"];
    if($linha["quantidade"] == null){
        $maio = "0";
    }else {
        $maio = $linha["quantidade"];
    }
}
while ($linha = mysqli_fetch_assoc($resultado));
  mysqli_free_result($resultado); 
}
// SELECT MES JUNHO
$sql = "SELECT SUM(VALOR_MENSAL) as quantidade FROM TB_CONTRATO WHERE MONTH(DATA_INICIO_CONT) = 6";
$resultado = mysqli_query($db, $sql);
$total = mysqli_num_rows($resultado);
$linha = mysqli_fetch_assoc($resultado); 
if ($total){
	do{
    //$junho =  $linha["quantidade"];
    if($linha["quantidade"] == null){
        $junho = "0";
    }else {
        $junho = $linha["quantidade"];
    }
}
while ($linha = mysqli_fetch_assoc($resultado));
  mysqli_free_result($resultado); 
}
// SELECT MES JULHO
$sql = "SELECT SUM(VALOR_MENSAL) as quantidade FROM TB_CONTRATO WHERE MONTH(DATA_INICIO_CONT) = 7";
$resultado = mysqli_query($db, $sql);
$total = mysqli_num_rows($resultado);
$linha = mysqli_fetch_assoc($resultado); 
if ($total){
	do{
    //$julho =  $linha["quantidade"];
    if($linha["quantidade"] == null){
        $julho = "0";
    }else {
        $julho = $linha["quantidade"];
    }
}
while ($linha = mysqli_fetch_assoc($resultado));
  mysqli_free_result($resultado); 
}
// SELECT MES AGOSTO
$sql = "SELECT SUM(VALOR_MENSAL) as quantidade FROM TB_CONTRATO WHERE MONTH(DATA_INICIO_CONT) = 8";
$resultado = mysqli_query($db, $sql);
$total = mysqli_num_rows($resultado);
$linha = mysqli_fetch_assoc($resultado); 
if ($total){
	do{
    //$agosto =  $linha["quantidade"];
    if($linha["quantidade"] == null){
        $agosto = "0";
    }else {
        $agosto = $linha["quantidade"];
    }
}
while ($linha = mysqli_fetch_assoc($resultado));
  mysqli_free_result($resultado); 
}
// SELECT MES SETEMBRO
$sql = "SELECT SUM(VALOR_MENSAL) as quantidade FROM TB_CONTRATO WHERE MONTH(DATA_INICIO_CONT) = 9";
$resultado = mysqli_query($db, $sql);
$total = mysqli_num_rows($resultado);
$linha = mysqli_fetch_assoc($resultado); 
if ($total){
	do{
    //$setembro =  $linha["quantidade"];
    if($linha["quantidade"] == null){
        $setembro = "0";
    }else {
        $setembro = $linha["quantidade"];
    }
}
while ($linha = mysqli_fetch_assoc($resultado));
  mysqli_free_result($resultado); 
}
// SELECT MES OUTUBRO
$sql = "SELECT SUM(VALOR_MENSAL) as quantidade FROM TB_CONTRATO WHERE MONTH(DATA_INICIO_CONT) = 10";
$resultado = mysqli_query($db, $sql);
$total = mysqli_num_rows($resultado);
$linha = mysqli_fetch_assoc($resultado); 
if ($total){
	do{
    //$outubro =  $linha["quantidade"];
    if($linha["quantidade"] == null){
        $outubro = "0";
    }else {
        $outubro = $linha["quantidade"];
    }
}
while ($linha = mysqli_fetch_assoc($resultado));
  mysqli_free_result($resultado); 
}
// SELECT MES NOVEMBRO
$sql = "SELECT SUM(VALOR_MENSAL) as quantidade FROM TB_CONTRATO WHERE MONTH(DATA_INICIO_CONT) = 11";
$resultado = mysqli_query($db, $sql);
$total = mysqli_num_rows($resultado);
$linha = mysqli_fetch_assoc($resultado); 
if ($total){
	do{
    //$novembro =  $linha["quantidade"];
    if($linha["quantidade"] == null){
        $novembro = "0";
    }else {
        $novembro = $linha["quantidade"];
    }
}
while ($linha = mysqli_fetch_assoc($resultado));
  mysqli_free_result($resultado); 
}
// SELECT MES DEZEMBRO
$sql = "SELECT SUM(VALOR_MENSAL) as quantidade FROM TB_CONTRATO WHERE MONTH(DATA_INICIO_CONT) = 12";
$resultado = mysqli_query($db, $sql);
$total = mysqli_num_rows($resultado);
$linha = mysqli_fetch_assoc($resultado); 
if ($total){
	do{
    //$dezembro =  $linha["quantidade"];
    if($linha["quantidade"] == null){
        $dezembro = "0";
    }else {
        $dezembro = $linha["quantidade"];
    }
}
while ($linha = mysqli_fetch_assoc($resultado));
  mysqli_free_result($resultado); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #chartdiv {
          width: 100%;
          height: 500px;
        }
        </style>
        
        <!-- Resources -->
        <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
                
        <script>
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv");


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart = root.container.children.push(am5xy.XYChart.new(root, {
  panX: true,
  panY: true,
  wheelX: "panX",
  wheelY: "zoomX"
}));

// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
cursor.lineY.set("visible", false);


// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });
xRenderer.labels.template.setAll({
  rotation: -90,
  centerY: am5.p50,
  centerX: am5.p100,
  paddingRight: 15
});

var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
  maxDeviation: 0.3,
  categoryField: "country",
  renderer: xRenderer,
  tooltip: am5.Tooltip.new(root, {})
}));

var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
  maxDeviation: 0.3,
  renderer: am5xy.AxisRendererY.new(root, {})
}));


// Create series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
var series = chart.series.push(am5xy.ColumnSeries.new(root, {
  name: "Series 1",
  xAxis: xAxis,
  yAxis: yAxis,
  valueYField: "value",
  sequencedInterpolation: true,
  categoryXField: "country",
  tooltip: am5.Tooltip.new(root, {
    labelText:"{valueY}"
  })
}));

series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5 });
series.columns.template.adapters.add("fill", (fill, target) => {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});

series.columns.template.adapters.add("stroke", (stroke, target) => {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});

// Set data
var data = [{
  country: "Janeiro",
  value:  <?php  echo $janeiro ?>
}, {
  country: "Fevereiro",
  value:   <?php  echo $fevereiro ?>
}, {
  country: "Março",
  value:   <?php  echo $marco ?>
}, {
  country: "Abril",
  value:   <?php  echo $abril ?>
}, {
  country: "Maio",
  value:   <?php  echo $maio ?>
}, {
  country: "Junho",
  value:   <?php  echo $junho ?>
}, {
  country: "Julho",
  value:   <?php  echo $julho ?>
}, {
  country: "Agosto",
  value:   <?php  echo $agosto ?>
}, {
  country: "Setembro",
  value:   <?php  echo $setembro ?>
}, {
  country: "Outubro",
  value:   <?php  echo $outubro ?>
}, {
  country: "Novembro",
  value:   <?php  echo $novembro ?>
}, {
  country: "Dezembro",
  value:   <?php  echo $dezembro ?>
}];

xAxis.data.setAll(data);
series.data.setAll(data);


// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
series.appear(1000);
chart.appear(1000, 100);

}); // end am5.ready()
</script>

                        
</head>
<body>
    <div id="chartdiv"></div>
</body>
</html>