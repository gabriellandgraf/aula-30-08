<DOCTYPE html>
    <head> 
        <meta charset="utf-8" />
        <title>App Help Desk</title>
    </head>

<body> 

    <?php

        session_start();
        $_SESSION ['X']='Seção oficialmente aberta';
        print_r($_SESSION['X']);
        echo'<hr>';

        $usuario_autenticator=false; 

        require_once "processo_cadastro.php";

            foreach ($usuarios_app as $user){ 
                if($user['email']==$_POST['email'] && $user['senha']==$_POST['senha']) {
                    $usuario_autenticator=true;
                } 
            }

            if($usuario_autenticator) {
                echo "Usuario Autenticado";
                $_SESSION['autenticado'] = 'SIM';
                header('Location: home.php');
            }
            else{ /*se não encontrar devolver usuario não encontrado*/
                header('Location: index.php?login=erro');
                $_SESSION['autenticado'] = 'NAO';
            }

    ?>
</body>
    
</html>