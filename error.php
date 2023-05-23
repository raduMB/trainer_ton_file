<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Error !</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <main>
            <div class="errorPanel">
                <p>We encountered somme difficulties : </p>
                <ul>
                    <?php foreach($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
                <p>
                    <a href="index.html">Back to Upload Form</a>
                </p>
            </div>
        </main> 
    </body>
    
</html>