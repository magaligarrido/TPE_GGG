{include file = 'header.tpl'}

<div>
            <h3>Filtrar medico</h3>
            <form action="mostrar_medicos_filtrados" required method="POST">
                <input type="text" name="especialidad" required placeholder="especialidad">
                <input type="text" name="obra_social" required placeholder="obra social">
               {* <br> Rango de fechas
                <input type="text" name="fechaI" required placeholder="desde">
                <input type="text" name="fechaF" required placeholder="hasta">
                <select name="horario" required>
                         <option value="am">mañana</option>
                         <option value="pm">tarde</option>                                      
                </select> *}
                <input type="submit" value="Filtrar">
            </form>
        </div>
        <br>
        <br>
        <br>
        <br>

<h3>TURNOS PENDIENTES</h3>

<table style="border: 1px solid;
    border-collapse: collapse;">
<tr style="border: 1px solid;
    border-collapse: collapse;">
    <td style="border: 1px solid;
    border-collapse: collapse;">fecha</td>
    <td style="border: 1px solid;
    border-collapse: collapse;">hora</td>
    <td style="border: 1px solid;
    border-collapse: collapse;">medico</td>
    <td style="border: 1px solid;
    border-collapse: collapse;">especialidad</td>

</tr>
 {foreach from=$turnos item=turno}
 <tr style="border: 1px solid;
    border-collapse: collapse;">
        <td style="border: 1px solid;
    border-collapse: collapse;">{$turno->fecha}</td>
        <td style="border: 1px solid;
    border-collapse: collapse;">{$turno->hora}</td>
        <td style="border: 1px solid;
    border-collapse: collapse;">{$turno->nombre}, {$turno->apellido}</td>
        <td style="border: 1px solid;
    border-collapse: collapse;">{$turno->id_especialidad}</td>
        <td style="border: 1px solid;
    border-collapse: collapse;"><a href="cancelar_turno/{$turno->id_turno}">cancelar</a></td>
    {if $turno->confirmado neq 1}
        <td style="border: 1px solid;
    border-collapse: collapse;"><a href="confirmar_turno/{$turno->id_turno}">confirmar</a></td>
    {else}
<td style="border: 1px solid;
    border-collapse: collapse;">confirmado</td>
    {/if}
 </tr>
 {/foreach} 
<table>
    <h4>{$error}</h4>
