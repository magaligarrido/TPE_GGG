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
    <h4>{$error}</h4>
{include file = 'footer.tpl'} 