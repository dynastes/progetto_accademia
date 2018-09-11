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
                        <th><?php echo ucfirst($dataType); ?> precedente</th>
                        <th>Nuovo <?php echo $dataType; ?></th>
                        <th></th>
                        </thead>
                        <tr>
                            <td><?php echo $dataValue; ?><input type="hidden" name="data_type" value="<?php echo $dataType; ?>"></td>
                            <?php
                              if($dataType == "cf"){
                                echo('<td><input id="codice_fiscale" type="text" class="form-control" name="value" maxlength="16" pattern="[A-Za-z0-9]+" required></td>');
                            }else if($dataType == "telefono"){
                                  echo('<td><input type="number" class="form-control" name="value" required></td>');
                            }else if($dataType == "indirizzo"){
                                  echo('<td><input type="text" class="form-control" name="value1" placeholder="Via" pattern="[A-Za-z]+" required></td>');
                                  echo('<td><input type="number" class="form-control" name="value2" placeholder="Numero civico" required></td>');
                            }else if($dataType == "email"){
                                echo('<td><input type="email" class="form-control" name="value" pattern="[A-Za-z]+" required></td>');
                            }else{
                                echo('<td><input type="text" class="form-control" name="value" pattern="[A-Za-z]+" required></td>');
                            }
                            ?>

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
<script>
  var cod_fisc = $("#codice_fiscale");
  cod_fisc.change(function(){
      cod_fisc.val($(this).val().toUpperCase());
  })
</script>
