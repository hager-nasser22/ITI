<?php 
$table = [
    ["Name"=>"Hager","Age"=>22,"City"=>"Zagazig","Phone"=>84545],
    ["Name"=>"Mennah","Age"=>22,"City"=>"Shepeen","Phone"=>3945],
    ["Name"=>"Sara","Age"=>24,"City"=>"Cairo","Phone"=>2348],
    ["Name"=>"A'laa","Age"=>21,"City"=>"Alex","Phone"=>5482]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <?php foreach($table as $row){ 
                        foreach($row as $key=> $value){?>
                            <th><?php echo $key; ?></th>
                <?php }break;} ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($table as $row){?>
            <tr>
                <?php foreach($row as $value){?>
                <td><?php echo $value ?></td>
                <?php } ?>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>