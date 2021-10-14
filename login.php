<?php 
    $auth = 0;
    include 'lib/includes.php';
    include 'partials/header.php';

    if(count($_SESSION) > 0)
    { 
         header('Location:'. WEBROOT .'index.php');
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $db->quote($_POST['username']);
        $password = sha1($_POST['password']);

        $select = $db->query("SELECT * FROM users WHERE username=$username AND password='$password'");
        if($select->rowCount() > 0){
            $_SESSION['Auth'] = $select->fetch();
            header('Location:'. WEBROOT .'indexAdmin.php');
        };
    }
?>
    <head>
        <title>Connect</title>
        <link rel="stylesheet" href="css/style_connect.css">
    </head>
    <body>
        <div>
            <center>
                <form method='post' id='formConnection'>
                    <fieldset class="carrelogin">
                        <legend>Identifiez-vous</legend>
                        <p>
                            <input type='text'     placeholder='Id*'   name='username' id="username" value="<?php if(isset($_POST['username'])){echo $_POST['username']; }?>"> <br><br>
                            <input type='password' placeholder='Password*' name='password' id="Password"><br><br>
                            <input type='submit' value='Connection'>
                        </p>
                    </fieldset>
                </form>
            </center>