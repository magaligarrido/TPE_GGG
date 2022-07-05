    {include file = 'header.tpl'}
     Filtrar por fecha <form action="filtrar_fecha" required method="POST">
                    <input type="text" name="dia" required placeholder="fecha (yyyy-mm-dd)">
                    <select name="hora" id="">
        <option value="am">mañana</option>
        <option value="pm">tarde</option>
    </select>
                    <input type="submit" value="filtrar">
                </form>
<br>
<br>
<br>
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
        border-collapse: collapse;">
        <form action="reservar_turno/{$turno->id_turno}" required method="POST">
                    <input type="text" name="nombre" required placeholder="nombre">
                    <input type="text" name="apellido" required placeholder="apellido">
                    <input type="text" name="direccion" required placeholder="direccion">
                    <input type="text" name="tel" required placeholder="tel">
                    <input type="text" name="email" required placeholder="email">
                    <input type="text" name="os" required placeholder="obra social">
                    <input type="text" name="n_afiliado" required placeholder="numero de afiliado">
                    <input type="submit" value="reservar">
                </form>
                </td>
    </tr>
    {/foreach} 
    <table>

    <a href="paciente_location">Volver</a>


    {include file = 'footer.tpl'}