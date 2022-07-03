{include file = 'header.tpl'}
<div>       
        <div class="container-login">
          <h1 >{$titulo}</h1>
            <form class="contenido-form" action="verifyregister" method="POST">
                <input type="number" name="dni" placeholder="DNI">
                <input type="text" name="nombre" placeholder="Nombre">
                <input type="text" name="apellido" placeholder="Apellido">
                <input type="text" name="direccion" placeholder="Direccion">
                <input type="number" name="telefono" placeholder="Telefono">
                <input type="text" name="email" placeholder="email">
                <input type="text" name="obra_social" placeholder="Obra Social">
                <input type="number" name="numero_afiliado" placeholder="Numero de Afiliado">
                <input class="btn" style="width:{'50%'}" type="submit" value="Ingresar">
            </form>
            <a href="loginPaciente">Si ya posee cuenta ingrese usando su DNI</a>
        </div>

    <h4>{$error}</h4>

</div>

{include file = 'footer.tpl'} 