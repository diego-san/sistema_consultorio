<?php
require "bd/consulta.php";
$consulta = new consulta();
$fecha = date('Y-m-d');
if($_GET['t']==0) {
    $ano = $consulta->consultadia($fecha);
$ki=0;
foreach ($ano as $key => $value){if ($value[1]=="KINESIOLOGIA"){
                        $ki++;
                    }
                }

$of=0;
foreach ($ano as $key => $value){
    if ($value[1]=="OFTAMOLOGIA"){
        $of++;
    }
}


$pe=0;
foreach ($ano as $key => $value){
    if ($value[1]=="PEDIATRIA"){
        $pe++;
    }
}


$ma=0;
foreach ($ano as $key => $value){
    if ($value[1]=="MATERNAL"){
      $ma++;
    }
}


$gi=0;
foreach ($ano as $key => $value){
    if ($value[1]=="GINECOLOGIA"){
       $gi++;
    }
}

$den=0;
foreach ($ano as $key => $value){
    if ($value[1]=="DENTAL"){
        $den++;
    }
}


$ge=0;
foreach ($ano as $key => $value){
    if ($value[1]=="GENERAL"){
       $ge++;
    }
}


$me=0;
foreach ($ano as $key => $value){
    if ($value[1]=="MENTAL"){
        $me++;
    }
}




echo " <div class='table-responsive ' >
<script type='text/javascript'>
    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

          var data = google.visualization.arrayToDataTable([
                  ['Tipo', 'Cantidad'],
                  ['KINESIOLOGIA', ".$ki."],
                  ['OFTAMOLOGIA',  ".$of."],
                  ['PEDIATRIA',  ".$pe."],
                  ['MATERNAL', ".$ma."],
                  ['DENTAL', ".$den."],
                  ['GENERAL', ".$ge."],
                  ['MENTAL', ".$me."],
                  ['GINECOLOGIA',    ".$gi."]
              ]);

          var options = {
              title: 'cantidad de consultas para hoy'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
 
    <div id='piechart' style='width: 1000px; height: 500px;'></div>
    <div style='height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;'></div>
                    <div style='height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;'></div></div>";

}elseif ($_GET['t']==1){


    $fecha = date('Y-m-d');
    $tipo="GENERAL";
    $mes = $consulta->consultames($fecha,$tipo);
    $cadena=" ";
    foreach ($mes as $key => $value){
        $cadena= $cadena."['".$value[2]."',".$value[0]."],";
    }


    echo "
<div class='table-responsive ' >
         <script type='text/javascript'>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Cantidad de reserva'],
          ".$cadena."
         
        ]);

        var options = {
          chart: {
            title: 'Reserva tipo General',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id='columnchart_material' style=\"width: 1000px; height: 500px;\"></div>
    <div style='height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;'></div>
                    <div style='height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;'></div></div>
 
            
    ";




}elseif ($_GET['t']==2){


    $fecha = date('Y-m-d');
    $tipo="GENERAL";
    $mes = $consulta->consultaano($fecha,$tipo);
    $cadena=" ";
    foreach (array_reverse($mes) as $key => $value){
        $cadena= $cadena."['".mes($value[2])." De ".$value[1]."',".$value[0]."],";
    }


    echo "
<div class='table-responsive ' >
         <script type='text/javascript'>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Cantidad de reserva'],
          ".$cadena."
         
        ]);

        var options = {
          chart: {
            title: 'Reserva tipo General',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id='columnchart_material' style=\"width: 1000px; height: 500px;\"></div>
    <div style='height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;'></div>
                    <div style='height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;'></div></div>
 
            
    ";



}elseif ($_GET['t']==3){

    $fecha = date('Y-m-d');
    $tipo="KINESIOLOGIA";
    $mes = $consulta->consultames($fecha,$tipo);
    $cadena=" ";
    foreach ($mes as $key => $value){
        $cadena= $cadena."['".$value[2]."',".$value[0]."],";
    }


    echo "
<div class='table-responsive ' >
         <script type='text/javascript'>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Cantidad de reserva'],
          ".$cadena."
         
        ]);

        var options = {
          chart: {
            title: 'Reserva tipo KINESIOLOGIA',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id='columnchart_material' style=\"width: 1000px; height: 500px;\"></div>
    <div style='height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;'></div>
                    <div style='height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;'></div></div>
 
            
    ";

}elseif ($_GET['t']==4){
    $fecha = date('Y-m-d');
    $tipo="KINESIOLOGIA";
    $mes = $consulta->consultaano($fecha,$tipo);
    $cadena=" ";
    foreach (array_reverse($mes) as $key => $value){
        $cadena= $cadena."['".mes($value[2])." De ".$value[1]."',".$value[0]."],";
    }


    echo "
<div class='table-responsive ' >
         <script type='text/javascript'>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Cantidad de reserva'],
          ".$cadena."
         
        ]);

        var options = {
          chart: {
            title: 'Reserva tipo KINESIOLOGIA',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id='columnchart_material' style=\"width: 1000px; height: 500px;\"></div>
    <div style='height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;'></div>
                    <div style='height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;'></div></div>
 
            
    ";

}elseif ($_GET['t']==5){

    $fecha = date('Y-m-d');
    $tipo="OFTAMOLOGIA";
    $mes = $consulta->consultames($fecha,$tipo);
    $cadena=" ";
    foreach ($mes as $key => $value){
        $cadena= $cadena."['".$value[2]."',".$value[0]."],";
    }


    echo "
<div class='table-responsive ' >
         <script type='text/javascript'>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Cantidad de reserva'],
          ".$cadena."
         
        ]);

        var options = {
          chart: {
            title: 'Reserva tipo OFTAMOLOGIA',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id='columnchart_material' style=\"width: 1000px; height: 500px;\"></div>
    <div style='height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;'></div>
                    <div style='height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;'></div></div>
 
            
    ";

}elseif ($_GET['t']==6){
    $fecha = date('Y-m-d');
    $tipo="OFTAMOLOGIA";
    $mes = $consulta->consultaano($fecha,$tipo);
    $cadena=" ";
    foreach (array_reverse($mes) as $key => $value){
        $cadena= $cadena."['".mes($value[2])." De ".$value[1]."',".$value[0]."],";
    }


    echo "
<div class='table-responsive ' >
         <script type='text/javascript'>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Cantidad de reserva'],
          ".$cadena."
         
        ]);

        var options = {
          chart: {
            title: 'Reserva tipo OFTAMOLOGIA',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id='columnchart_material' style=\"width: 1000px; height: 500px;\"></div>
    <div style='height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;'></div>
                    <div style='height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;'></div></div>
 
            
    ";

}elseif ($_GET['t']==7){

    $fecha = date('Y-m-d');
    $tipo="PEDIATRIA";
    $mes = $consulta->consultames($fecha,$tipo);
    $cadena=" ";
    foreach ($mes as $key => $value){
        $cadena= $cadena."['".$value[2]."',".$value[0]."],";
    }


    echo "
<div class='table-responsive ' >
         <script type='text/javascript'>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Cantidad de reserva'],
          ".$cadena."
         
        ]);

        var options = {
          chart: {
            title: 'Reserva tipo PEDIATRIA',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id='columnchart_material' style=\"width: 1000px; height: 500px;\"></div>
    <div style='height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;'></div>
                    <div style='height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;'></div></div>
 
            
    ";

}elseif ($_GET['t']==8){
    $fecha = date('Y-m-d');
    $tipo="PEDIATRIA";
    $mes = $consulta->consultaano($fecha,$tipo);
    $cadena=" ";
    foreach (array_reverse($mes) as $key => $value){
        $cadena= $cadena."['".mes($value[2])." De ".$value[1]."',".$value[0]."],";
    }


    echo "
<div class='table-responsive ' >
         <script type='text/javascript'>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Cantidad de reserva'],
          ".$cadena."
         
        ]);

        var options = {
          chart: {
            title: 'Reserva tipo PEDIATRIA',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id='columnchart_material' style=\"width: 1000px; height: 500px;\"></div>
    <div style='height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;'></div>
                    <div style='height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;'></div></div>
 
            
    ";

}elseif ($_GET['t']==9){

    $fecha = date('Y-m-d');
    $tipo="MATERNAL";
    $mes = $consulta->consultames($fecha,$tipo);
    $cadena=" ";
    foreach ($mes as $key => $value){
        $cadena= $cadena."['".$value[2]."',".$value[0]."],";
    }


    echo "
<div class='table-responsive ' >
         <script type='text/javascript'>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Cantidad de reserva'],
          ".$cadena."
         
        ]);

        var options = {
          chart: {
            title: 'Reserva tipo MATERNAL',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id='columnchart_material' style=\"width: 1000px; height: 500px;\"></div>
    <div style='height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;'></div>
                    <div style='height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;'></div></div>
 
            
    ";

}elseif ($_GET['t']==10){
    $fecha = date('Y-m-d');
    $tipo="MATERNAL";
    $mes = $consulta->consultaano($fecha,$tipo);
    $cadena=" ";
    foreach (array_reverse($mes) as $key => $value){
        $cadena= $cadena."['".mes($value[2])." De ".$value[1]."',".$value[0]."],";
    }


    echo "
<div class='table-responsive ' >
         <script type='text/javascript'>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Cantidad de reserva'],
          ".$cadena."
         
        ]);

        var options = {
          chart: {
            title: 'Reserva tipo MATERNAL',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id='columnchart_material' style=\"width: 1000px; height: 500px;\"></div>
    <div style='height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;'></div>
                    <div style='height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;'></div></div>
 
            
    ";

}elseif ($_GET['t']==11){

    $fecha = date('Y-m-d');
    $tipo="GINECOLOGIA";
    $mes = $consulta->consultames($fecha,$tipo);
    $cadena=" ";
    foreach ($mes as $key => $value){
        $cadena= $cadena."['".$value[2]."',".$value[0]."],";
    }


    echo "
<div class='table-responsive ' >
         <script type='text/javascript'>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Cantidad de reserva'],
          ".$cadena."
         
        ]);

        var options = {
          chart: {
            title: 'Reserva tipo GINECOLOGIA',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id='columnchart_material' style=\"width: 1000px; height: 500px;\"></div>
    <div style='height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;'></div>
                    <div style='height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;'></div></div>
 
            
    ";

}elseif ($_GET['t']==12){
    $fecha = date('Y-m-d');
    $tipo="GINECOLOGIA";
    $mes = $consulta->consultaano($fecha,$tipo);
    $cadena=" ";
    foreach (array_reverse($mes) as $key => $value){
        $cadena= $cadena."['".mes($value[2])." De ".$value[1]."',".$value[0]."],";
    }


    echo "
<div class='table-responsive ' >
         <script type='text/javascript'>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Cantidad de reserva'],
          ".$cadena."
         
        ]);

        var options = {
          chart: {
            title: 'Reserva tipo GINECOLOGIA',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id='columnchart_material' style=\"width: 1000px; height: 500px;\"></div>
    <div style='height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;'></div>
                    <div style='height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;'></div></div>
 
            
    ";

}elseif ($_GET['t']==13){

    $fecha = date('Y-m-d');
    $tipo="DENTAL";
    $mes = $consulta->consultames($fecha,$tipo);
    $cadena=" ";
    foreach ($mes as $key => $value){
        $cadena= $cadena."['".$value[2]."',".$value[0]."],";
    }


    echo "
<div class='table-responsive ' >
         <script type='text/javascript'>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Cantidad de reserva'],
          ".$cadena."
         
        ]);

        var options = {
          chart: {
            title: 'Reserva tipo DENTAL',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id='columnchart_material' style=\"width: 1000px; height: 500px;\"></div>
    <div style='height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;'></div>
                    <div style='height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;'></div></div>
 
            
    ";

}elseif ($_GET['t']==14){
    $fecha = date('Y-m-d');
    $tipo="DENTAL";
    $mes = $consulta->consultaano($fecha,$tipo);
    $cadena=" ";
    foreach (array_reverse($mes) as $key => $value){
        $cadena= $cadena."['".mes($value[2])." De ".$value[1]."',".$value[0]."],";
    }


    echo "
<div class='table-responsive ' >
         <script type='text/javascript'>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Cantidad de reserva'],
          ".$cadena."
         
        ]);

        var options = {
          chart: {
            title: 'Reserva tipo DENTAL',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id='columnchart_material' style=\"width: 1000px; height: 500px;\"></div>
    <div style='height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;'></div>
                    <div style='height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;'></div></div>
 
            
    ";

}elseif ($_GET['t']==15){

    $fecha = date('Y-m-d');
    $tipo="MENTAL";
    $mes = $consulta->consultames($fecha,$tipo);
    $cadena=" ";
    foreach ($mes as $key => $value){
        $cadena= $cadena."['".$value[2]."',".$value[0]."],";
    }


    echo "
<div class='table-responsive ' >
         <script type='text/javascript'>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Cantidad de reserva'],
          ".$cadena."
         
        ]);

        var options = {
          chart: {
            title: 'Reserva tipo MENTAL',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id='columnchart_material' style=\"width: 1000px; height: 500px;\"></div>
    <div style='height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;'></div>
                    <div style='height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;'></div></div>
 
            
    ";

}elseif ($_GET['t']==16){
    $fecha = date('Y-m-d');
    $tipo="MENTAL";
    $mes = $consulta->consultaano($fecha,$tipo);
    $cadena=" ";
    foreach (array_reverse($mes) as $key => $value){
        $cadena= $cadena."['".mes($value[2])." De ".$value[1]."',".$value[0]."],";
    }


    echo "
<div class='table-responsive ' >
         <script type='text/javascript'>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Cantidad de reserva'],
          ".$cadena."
         
        ]);

        var options = {
          chart: {
            title: 'Reserva tipo MENTAL',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id='columnchart_material' style=\"width: 1000px; height: 500px;\"></div>
    <div style='height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;'></div>
                    <div style='height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;'></div></div>
 
            
    ";

}


function mes($m){

    if($m==1){
        return "Enero";
    }elseif ($m==2){
        return "Febrero";
    }elseif ($m==3){
        return "Marzo";
    }elseif ($m==4){
        return "Abril";
    }elseif ($m==5){
        return "Mayo";
    }elseif ($m==6){
        return "Junio";
    }elseif ($m==7){
        return "Julio";
    }elseif ($m==8){
        return "Agosto";
    }elseif ($m==9){
        return "Septiembre";
    }elseif ($m==10){
        return "Octubre";
    }elseif ($m==11){
        return "Noviembre";
    }elseif ($m==12){
        return "Diciembre";
    }


}


?>