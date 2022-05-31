<div class="display-centrado">
    <table>
        <tr>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Especialidad</td>
        </tr>
    {foreach from=$medicos item=medico}
        <tr>
            <td>{$medico->nombre}</td>
            <td>{$medico->apellido}</td>
            {foreach from=$especialidades item=especialidad}
                {if $especialidad->id_especialidad == $medico->id_especialidad}
                    <td>{$especialidad->especialidad}</td>                    
                {/if}
            {/foreach}
        </tr>
    {/foreach}
    </table>
</div>