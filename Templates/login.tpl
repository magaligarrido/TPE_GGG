{include file = 'header.tpl'}
<div>
        <h1 >{$titulo}</h1>
        <div>
            <form action="verify-administrador" method="POST">
                <input type="text" name="institucion" placeholder="clave de institucion">
                <input type="text" name="usuario" placeholder="Usuario">
                <input type="password" name="pass" placeholder="Password">
                <input type="submit" value="Ingresar">
            </form>
        </div>
            
    <h4>{$error}</h4>

</div>
{include file = 'footer.tpl'}
