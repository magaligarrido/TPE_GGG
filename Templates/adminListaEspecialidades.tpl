<div class="display-centrado">
    <table>
        <tr>
            <td>Especialidad</td>
        </tr>
        {foreach from=$especialidades item=especialidad}
            <tr>
                <td>{$especialidad->especialidad}</td>
            </tr>      
        {/foreach}
    </table>
</div>