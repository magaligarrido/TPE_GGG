<div class="display-centrado">
    <table>
       <tr>
             <td>Nombre</td>
            <td>Apellido</td>
            <td></td>
            <td>Secretaria</td>
    </tr>
    {foreach from=$medicos item=medico}
        {if $medico->id_secretaria}
            <tr>
                <td>{$medico->nombre}</td>
                <td>{$medico->apellido}</td>
                <td>--></td>
                {foreach from=$secretarias item=secretaria}
                    {if $secretaria->id_secretaria == $medico->id_secretaria}
                        <td>{$secretaria->nombre}</td>                    
                    {/if}
                {/foreach}
            </tr>
        {/if}        
    {/foreach}
    </table>
</div>

