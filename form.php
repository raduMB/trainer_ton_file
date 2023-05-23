<?php

// final version

if(isset($_POST["birthDate"]) && $_POST["birthDate"]== "") {
    $errors[] = "Birth date is required";
}

if(isset($_POST["class"]) && $_POST["class"]== "") {
    $errors[] = "Type of class is required";
}

if(isset($_POST["sex"]) && $_POST["sex"]== "") {
    $errors[] = "Sex is required :)";
}

if(isset($_POST["height"]) && $_POST["height"]== "") {
    $errors[] = "Height is required";
}

if(isset($_POST["weight"]) && $_POST["weight"]== "") {
    $errors[] = "Weight is required";
}

if(isset($_POST["hair"]) && $_POST["hair"]== "") {
    $errors[] = "Type of hair is required";
}

if(isset($_POST["eyes"]) && $_POST["eyes"]== "") {
    $errors[] = "Type of eyes is required";
}

if (!empty($errors)) {
    require 'error.php';
    die();
}

if($_SERVER["REQUEST_METHOD"] === "POST" ){ 
    
    $authorizedExtensions = ['jpg','png', 'gif', 'webp'];
    $maxFileSize = 1048576;
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $uploadDir = 'public/uploads/';
    $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);

    if (in_array($extension, $authorizedExtensions)){
        if(filesize($_FILES['avatar']['tmp_name']) > $maxFileSize){
            $errors[] = "Votre fichier doit faire moins de 1M !";
        } else {
            move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
        } 
    } else {
        $errors[] = 'Veuillez sélectionner une image de type jpg, png, gif ou webp !';
    }

    if (!empty($errors)) {
        require 'error.php';
        die();
    }
    
}




/*


// version multiple files



if(!empty($_FILES['files']['name'][0])) {
    
    $files = $_FILES['files'];

    $uploaded = array();
    $failed = array();

    $allowed = array('jpg','png', 'gif', 'webp');

    foreach($files['name'] as $position => $file_name) {

        $file_tmp = $files['tmp_name'][$position];
        $file_size = $files['size'][$position];
        $file_error = $files['error'][$position];

        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));

        if(in_array($file_ext, $allowed)) {

            if($file_error === 0) {

                if($file_size <= 1048576) {

                    $file_name_new = uniqid('', true) . '.' . $file_ext;
                    $file_destination ='public/uploads/' . $file_name_new;

                    if(move_uploaded_file($file_tmp, $file_destination)) {
                        $uploaded[$position] = $file_destination;
                } else {
                        $failed[$position] = "[{$file_name}] failed ti upload.";
                }
                
             } else {
                    $failed[$position] = "[{$file_name}] is too large.";
                }

            } else {
                $failed[$position] = "[{$file_name}] erored with code {$file_error}.";
            }

        } else {
            $failed[$position] = "[{$file_name}] file extension '{$file_ext}' is not allowed.";
        }

    }

    if(!empty($uploaded)) {
        print_r($uploaded);
    }

    if(!empty($failed)) {
        print_r($failed);
    }


}


*/

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivers License</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <h1>Drivers License ready to print</h1>
        <img src="public/images/logo_license.jpg" alt="Logo License">
    </header>

    <main>
        <div class="summary">
            <p>
                <img src="public/uploads/hommie.jpg" alt="">
            </p> 
            <ul>
                <p>Name: Homer Simpson</p>
                <P>Birth date : <span><?php echo htmlentities($_POST["birthDate"]); ?></span></p>
                <p>Expires : 31/02/2100</p>
                <P>Class : <span><?php echo htmlentities($_POST["class"]); ?></span></p>
                <P>Address : in the middle of nowhere</p>
                <P>Town : Springfield</p>
                <P>ZIP code : 666</p>
                <P>Sex : <span><?php echo htmlentities($_POST["sex"]); ?></span></p>
                <P>Height : <span><?php echo htmlentities($_POST["height"]); ?></span></p>
                <P>Weight : <span><?php echo htmlentities($_POST["weight"]); ?></span></p>
                <P>Hair : <span><?php echo htmlentities($_POST["hair"]); ?></span></p>
                <P>Eyes : <span><?php echo htmlentities($_POST["eyes"]); ?></span></p>
            </ul>
        </div>
    </main>
</body>

</html>