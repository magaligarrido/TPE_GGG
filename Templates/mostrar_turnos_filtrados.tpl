{include file = 'header.tpl'}
<h3>turnos para el medico seleccionado</h3>
<table style="border: 1px solid;
    border-collapse: collapse;">
<tr style="border: 1px solid;
    border-collapse: collapse;">
    <td style="border: 1px solid;
    border-collapse: collapse;">fecha</td>
    <td style="border: 1px solid;
    border-collapse: collapse;">hora</td>
    <td style="border: 1px solid;
    border-collapse: collapse;">reservar</td>

</tr>
 {foreach from=$turnos item=turno}
 <tr style="border: 1px solid;
    border-collapse: collapse;">
        <td style="border: 1px solid;
    border-collapse: collapse;">{$turno->fecha}</td>
        <td style="border: 1px solid;
    border-collapse: collapse;">{$turno->hora}</td>
        <td style="border: 1px solid;
    border-collapse: collapse;"><a href="reservar_turno/{$turno->id_turno}">reservar</a></td>
 </tr>
 {/foreach} 
<table>



{include file = 'footer.tpl'}