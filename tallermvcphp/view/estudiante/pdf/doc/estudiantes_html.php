<page backtop= "10mm"backbottom="10mm"backleft="20mm"backright="20mm">
 
  <page_header>

<table style=
"width: 100%; border: solid 1px black;">
<tr>
<td style="text-align: left; width: 33%">Listado de Estudiantes</td>
<td style="text-align: center; width: 34%">BACKEND PHP2024 </td>
<td style="text-align: right; width: 33%"><?php echo date('d/m/Y');?>
</td>
 
 </tr>

  </table>
</page_header>

<page_footer>

<table style= "width: 100%; border: solid 1px black;">
<tr>

<td style="text-align: left; width: 50%">Leng. Prog. III</td>
<td style="text-align: right; width: 50%" >página [[page_cu]]/[[page_nb]]</td>
</tr>
</table>
</page_footer>
<br><br>
21
22
<table style=
"width: 80%;border: solid 1px #5544DD; border-collapse: collapse"
align=
"center"
>
23
<thead>
24
<tr>
25
<th style=
"width: 15%; text-align: left; border: solid 1px #900C3F; background: #900C3F; text-color: #FFFFFF;"
><span style=
"color: #FFFFFF;"
>CODIGO</span></th>
26
<th style=
"width: 25%; text-align: left; border: solid 1px #900C3F; background: #900C3F; text-color: #FFFFFF;" ><span style="color: #FFFFFF;">NOMBRE</span></th>
<th style= "width: 30%; text-align: left; border: solid 1px #900C3F; background: #900C3F; text-color:#FFFFFF;"><span style=
"color: #FFFFFF;">APELLIDO</span></th><th style="width: 10%; text-align: left; border: solid 1px #900C3F; background: #900C3F; text-color: #FFFFFF;"
><span style="color: #FFFFFF;" >CIN</span></th></tr>
</thead>

<tbody>z
<?php foreach(
$rows
as
$row
) {

?>

<tr>

<td style=
"width: 20%; text-align: left; border: solid 1px #900C3F"
>

<?=
$row
[
'idEstudiante'
]
?>

</td>

<td style=
"width: 45%; text-align: left; border: solid 1px #900C3F">
<?=$row['nombre']?>

</td>


<td style=
"width: 45%; text-align: left; border: solid 1px #900C3F"
>

<?=
$row
[
'apellido'
]
?>

</td>

<td style=
"width: 20%; text-align: left; border: solid 1px #900C3F"
>

<?=
$row
[
'cin'
]
?>

</td>

</tr>

<?php

}

?>

</tbody>

<!-- <tfoot>
55
<tr>
56
<th style=
"width: 30%; text-align: left; border: solid 1px #900C3F; background: #CCFFCC"
>Fin del reporte</th>
57
<th style=
"width: 30%; text-align: left; border: solid 1px #900C3F; background: #CCFFCC"
>Gracias!</th>
58
</tr>
59
</tfoot> -->

</table>

</page>