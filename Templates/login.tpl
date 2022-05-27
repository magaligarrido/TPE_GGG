  <div>
        <h1 >{$titulo}</h1>
        <div>
            <form action="verify-administrador" method="POST">
                <input type="text" name="usuario" placeholder="Usuario">
                <input type="password" name="pass" placeholder="Password">
                <input type="submit" value="Ingresar">
            </form>
        </div>
        <a href="">INGRESE COMO PACIENTE</a>
        <a href="">INGRESE COMO PERSONAL DE LA INSTITUCION</a>
            
    <h4>{$error}</h4>
    <a  href="registro-administrador">CREAR CUENTA</a>

    </div>