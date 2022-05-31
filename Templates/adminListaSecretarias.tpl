 <div class="display-centrado">
    <table>
       <tr>
            <td>Secretaria</td>
        </tr>
    {foreach from=$secretarias item=secretaria}
        <tr>
            <td>{$secretaria->nombre}</td>

        </tr>
    {/foreach}
    </table>
</div>