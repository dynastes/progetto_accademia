<?php
   $passato= 0;
   $stringasql="SELECT * FROM materie_studenti WHERE Id_studente =".$_GET['ID']." AND Id_materia = ".$id_materia."";
   $elencoEsami=$connessione->query($stringasql);
   while($res=$elencoEsami->fetch_assoc()){
      $passato = 1;
      $voto = $res['Voto'];
      $data = $res['Data'];
      $professore = $res['Id_docente'];
      $idvoto = $res['Id'];
   }
   if ($passato == 0){
   ?>
      <form action="admin_inserisci_voti_query.php" id="aggiungi_voto" method="post">
                            <td style="text-align:center;"><?php echo $codice_settore." ".$passato ?></td>
                            <td><?php echo $nome_materia . " " . $modulo; ?></td>
                            <td style="text-align:center"><?php echo $cfa; ?></td>
                            <input type="hidden" value = "<?php echo $id_materia ?>" name="id_materia">
                            <input type="hidden" value = "<?php echo $_GET['ID'] ?>" name="id_studente">
                            <td><input class="form-control"type="date" name="data_esame"  required/></td>
                            <td>
                                <SELECT name="voto" class="form-control" required>
                                    <option value="18">
                                        18
                                    </option>
                                    <option value="19">
                                        19
                                    </option>
                                    <option value="20">
                                        20
                                    </option>
                                    <option value="21">
                                        21
                                    </option>
                                    <option value="22">
                                        22
                                    </option>
                                    <option value="23">
                                        23
                                    </option>
                                    <option value="24">
                                        24
                                    </option>
                                    <option value="25">
                                        25
                                    </option>
                                    <option value="26">
                                        26
                                    </option>
                                    <option value="27">
                                        27
                                    </option>
                                    <option value="28">
                                        28
                                    </option>
                                    <option value="29">
                                        29
                                    </option>
                                    <option value="30">
                                        30
                                    </option>
                                    <option value="31">
                                        30 - Lode
                                    </option>
                                </SELECT>
                             </td>
                            <td>
                                <SELECT name="id_professore" class="form-control">
                                    <?php
                                        $stringasql="SELECT p.Id_anagrafe, a.Nome as Nome, a.Cognome as Cognome, p.Id as Id FROM anagrafe AS a, docenti AS p WHERE p.Id_anagrafe=a.Id ORDER BY a.Cognome";
                                        $elencoProfessori=$connessione->query($stringasql);
                                        while($res=$elencoProfessori->fetch_assoc()){
                                            echo("<option value='".$res['Id']."'>
                                                ".$res['Cognome']." ".$res['Nome']."
                                            </option>");
                                        }
                                     ?>
                                </SELECT>
                            </td>
                            <td style="text-align:center">
                                <input type="submit" class="btn btn-default" />
                            </td>
                        </form>
<?php }else{
   //assegniamo i crediti aqcuisti
   $tot_crediti = $tot_crediti + $cfa;
   ?>
   <form action="admin_modifica_voti_studente.php" id="modifica_voto" method="post">
                         <td style="text-align:center;"><?php echo $codice_settore." ".$passato ?></td>
                         <td><?php echo $nome_materia . " " . $modulo; ?></td>
                         <td style="text-align:center"><?php echo $cfa; ?></td>
                         <input type="hidden" value = "<?php echo $idVoto ?>" name="id_voto">
                         <td style="text-align:center">
                            <p>
                               <?php echo $data ?>
                            </p>
                         </td>
                         <td style="text-align:center">
                            <p>
                               <?php echo($voto) ?>
                            </p>
                          </td>
                         <td style="text-align:center">
                                 <?php
                                     $stringasql="SELECT p.Id_anagrafe, a.Nome as Nome, a.Cognome as Cognome, p.Id as Id FROM anagrafe AS a, docenti AS p WHERE p.Id_anagrafe=a.Id AND p.Id = ".$professore." ORDER BY a.Cognome";
                                     $elencoProfessori=$connessione->query($stringasql);
                                     while($res=$elencoProfessori->fetch_assoc()){
                                         echo("<p>
                                          ".$res['Cognome']." ".$res['Nome']."
                                         </p>");

                                     }
                                  ?>
                         </td>
                         <td style="text-align:center">
                             <input type="submit" class="btn btn-default" value="Modifica" />
                         </td>
                     </form>
   <?php
}
?>
