<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../vue/style/planning.css">
</head>
<body>
    <header>
            <img src="../vue/logoAwaBank.png" alt="">
    </header>
    <div class="conteneur">
        <?php echo  $contenue ?>
    </div>
    <style>
        table{
            border-collapse: collapse;
            text-align: center;
            margin-left:410px;
            margin-top:-50px;
            margin-bottom:40px;
            width:500px;
            hight:400px;
        }
        th,td{
            border: 1px solid;
            }
        tr:nth-child(even){
            background-color:rgba(208, 226, 243, 0.62);
        }
        tr:nth-child(odd){
            background-color: rgba(136, 147, 81, 0.51);
        }
        input{
            text-align:center;
        }

    </style>
</body>
</html>