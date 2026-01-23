<?php
$statut = 'success';

if ($statut === 'success') {
    $color = 'green';
} else {
    $color = 'red';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        p {
            color: <?php echo $color ?>;
        }
        
    </style>
    <title>Condition</title>
</head>
<body>
    
<p>La couleur de cette phrase indique le statut</p>
    
</body>
</html>