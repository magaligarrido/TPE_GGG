{include file = 'header.tpl'}
<div>
<<<<<<< HEAD
       
        <div class="container-login">
          <h1 >{$titulo}</h1>
            <form class="contenido-form" action="verify-administrador" method="POST">
                <input type="text" name="institucion" placeholder="Clave de institucion">
=======
        <div class="container-login">
          <h1 >{$titulo}</h1>
            <form class="contenido-form" action="verify-administrador" method="POST">
>>>>>>> cb28e7a6d42b98285bf2c36adf6f1fd04180a8fe
                <input type="text" name="usuario" placeholder="Usuario">
                <input type="password" name="pass" placeholder="Password">
                <input class="btn" style="width:{'50%'}" type="submit" value="Ingresar">
            </form>
        </div>
            
    <h4>{$error}</h4>

</div>
{include file = 'footer.tpl'}
