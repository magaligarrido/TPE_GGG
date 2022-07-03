{include file = 'header.tpl'}

    <h3>medicos con obra social y especialidad ingresados:</h3>

 {foreach from=$medicos item=m}
<a href="get_turnos_medico/{$m->id_medico}">{$m->nombre}, {$m->apellido}</a><br>
 {/foreach} 


{include file = 'footer.tpl'}