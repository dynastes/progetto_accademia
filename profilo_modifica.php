<?php @include_once 'shared/menu.php';
$dataType = $_GET['data_type'];
$dataValue = $_GET['value'];
?>
<html>
<head>
    <?php @include_once 'shared/head_inclusions.php'; ?>
    <meta charset="utf-8">
</head>
<body>
<div id="principale">
    <div id="menu">
        <?php
        menu();
        ?>
    </div> <!-- FINE MENU -->

    <div class="container">

        <div class="row">
            <div class="col-md-12 col-xs-12">
                <h1>Modifica <?php echo $dataType; ?></h1>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <ul class="pager">
                    <li class="previous"><a href="profilo.php"><span aria-hidden="true">&larr;</span>Torna indietro</a></li>
                </ul>
            </div>

            <div class="col-lg-12 col-sm-12">
                <form class="form-group" action="profilo_modifica_query.php" method="post">
                    <table class="table table-responsive">
                        <thead>
                        <th>Valore precedente</th>
                        <th>Nuovo valore</th>
                        <th></th>
                        </thead>
                        <tr>
                            <td><?php echo $dataValue; ?><input type="hidden" name="data_type" value="<?php echo $dataType; ?>"></td>
                            <td><input type="text" class="form-control" name="value"></td>
                            <td>
                                <button class="btn btn-info"><span class="glyphicon glyphicon-ok"></span> Salva</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>


    </div>

</div>
<br><br>
<?php @include_once 'shared/footer.php'; ?>
</body>
</html>
