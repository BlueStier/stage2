<?php
$select_entete ='';
$select_couleur = '';
switch($gen['entete']){
    case 'header-white header-bg':
    $select_entete = 1;
    break;
    case 'header-dark header-bg':
    $select_entete = 0;
    break;
    case 'header-white header-alpha':
    $select_entete = 3;
    break;
    case 'header-dark header-alpha':
    $select_entete = 2;
    break;
}
switch($gen['couleur']){
    case 'blue':
    $select_couleur = 0;
    break;
    case 'brown':
    $select_couleur = 1;
    break;
    case 'sea':
    $select_couleur = 2;
    break;
    case 'pink':
    $select_couleur = 3;
    break;
    case 'green':
    $select_couleur = 4;
    break;
    case 'oignies':
    $select_couleur = 5;
    break;
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        Apparence
        <small>Général</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="glyphicon glyphicon-th text-red"></i> Apparence</li>
        <li class="active">Général</li>
      </ol>
    </section>
    <div class="form-horizontal">
      <div class="box-body">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Couleur et style général</h3>              
            </div>
            </div>
        <?php if(isset($error)){echo $error['error'];};
                             echo validation_errors();
                                  echo form_open_multipart('cms/general/');?>
                                  <div class="form-group">
                <label class="col-sm-3 control-label">Choix de la couleur générale :</label>
                <div class="col-sm-9">                
                <select id="select_couleur" name ="select_couleur" class="form-control select2" >
                <option>Bleu</option>
                <option>Maron</option>
                <option>Océan</option>
                <option>Rose</option>
                <option>Verte</option>
                <option>Couleurs de Oignies</option>                
                </select>
                </div>
                </div>
                <div class="form-group">
                <label class="col-sm-3 control-label">En-tête :</label>
                <div class="col-sm-9">                
                <select id="select_en_tete" name ="select_en_tete" class="form-control select2" >
                <option>Noire pleine</option>
                <option>Blanche pleine</option>
                <option>Noire transparente</option>
                <option>Blanche transparente</option>                              
                </select>
                </div>
                </div>
                <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Couleur du menu</h3>              
            </div>
            </div>
            <div class="form-horizontal">
            <div class="form-group">
            <div class="col-sm-1 "></div>
                <div class="col-sm-2 " id='carre1' style="border: 1px solid #ddd;border-radius: 4px;padding: 1px;vertical-align: top;width:100px;height:200px; background-color: <?php echo $gen['couleur_titre']; ?>;"></div>
                <div class="col-sm-9 ">
                <label class=" control-label" style="color:red;">Rouge &nbsp&nbsp&nbsp<span id="rouge_menu"><?php echo $gen['rouge_menu']; ?></span></label>
                <input id='sliderR1' type='range' min="0" max="255" step="1" onChange="modif_menu()" value="<?php echo $gen['rouge_menu']; ?>"/>
                <label class=" control-label" style="color:green;">Vert &nbsp&nbsp&nbsp<span id="vert_menu" ><?php echo $gen['vert_menu']; ?></span></label>
                <input id='sliderV1' type='range' min="0" max="255" step="1" onChange="modif_menu()" value="<?php echo $gen['vert_menu']; ?>"/>
                <label class=" control-label" style="color:blue;">Bleu &nbsp&nbsp&nbsp<span id="bleu_menu" ><?php echo $gen['bleu_menu']; ?></span></label>
                <input id='sliderB1' type='range' min="0" max="255" step="1" onChange="modif_menu()" value='<?php echo $gen['bleu_menu']; ?>'/>
                <label class=" control-label" >Opacité &nbsp&nbsp&nbsp<span id="opacity_menu"><?php echo $gen['opacity_menu']; ?></span></label>
                <input id='sliderO1' type='range' min="0" max="1" step="0.05" onChange="modif_menu()" value="<?php echo $gen['opacity_menu']; ?>"/>
                <input type="hidden" id="r_menu" name="rouge_menu" value="<?php echo $gen['rouge_menu']; ?>"/>
                <input type="hidden" id="v_menu" name="vert_menu" value="<?php echo $gen['vert_menu']; ?>"/>
                <input type="hidden" id="b_menu" name="bleu_menu" value="<?php echo $gen['bleu_menu']; ?>"/>
                <input type="hidden" id="o_menu" name="opacity_menu" value="<?php echo $gen['opacity_menu']; ?>"/>
                <input type="hidden" id="couleur_menu" name="couleur_menu" value="<?php echo $gen['couleur_menu']; ?>"/>
                </div>
                </div>
                </div>
                <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Couleur du cadre de titre</h3>              
            </div>
            </div>
            <div class="form-horizontal">
            <div class="form-group">
            <div class="col-sm-1 "></div>
                <div class="col-sm-2 " id='carre' style="border: 1px solid #ddd;border-radius: 4px;padding: 1px;vertical-align: top;width:100px;height:200px; background-color: <?php echo $gen['couleur_titre']; ?>;"></div>
                <div class="col-sm-9 ">
                <label class=" control-label" style="color:red;">Rouge &nbsp&nbsp&nbsp<span id="rouge_titre"><?php echo $gen['rouge_titre']; ?></span></label>
                <input id='sliderR' type='range' min="0" max="255" step="1" onChange="modif_titre()" value="<?php echo $gen['rouge_titre']; ?>"/>
                <label class=" control-label" style="color:green;">Vert &nbsp&nbsp&nbsp<span id="vert_titre" ><?php echo $gen['vert_titre']; ?></span></label>
                <input id='sliderV' type='range' min="0" max="255" step="1" onChange="modif_titre()" value="<?php echo $gen['vert_titre']; ?>"/>
                <label class=" control-label" style="color:blue;">Bleu &nbsp&nbsp&nbsp<span id="bleu_titre" ><?php echo $gen['bleu_titre']; ?></span></label>
                <input id='sliderB' type='range' min="0" max="255" step="1" onChange="modif_titre()" value='<?php echo $gen['bleu_titre']; ?>'/>
                <label class=" control-label" >Opacité &nbsp&nbsp&nbsp<span id="opacity_titre"><?php echo $gen['opacity_titre']; ?></span></label>
                <input id='sliderO' type='range' min="0" max="1" step="0.05" onChange="modif_titre()" value="<?php echo $gen['opacity_titre']; ?>"/>
                <input type="hidden" id="r_titre" name="rouge_titre" value="<?php echo $gen['rouge_titre']; ?>"/>
                <input type="hidden" id="v_titre" name="vert_titre" value="<?php echo $gen['vert_titre']; ?>"/>
                <input type="hidden" id="b_titre" name="bleu_titre" value="<?php echo $gen['bleu_titre']; ?>"/>
                <input type="hidden" id="o_titre" name="opacity_titre" value="<?php echo $gen['opacity_titre']; ?>"/>
                <input type="hidden" id="couleur_titre" name="couleur_titre" value="<?php echo $gen['couleur_titre']; ?>"/>
                </div>
                </div>
                </div>
                <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Couleur du cadre de la barre de recherche</h3>              
            </div>
            </div>
            <div class="form-horizontal">
            <div class="form-group">
            <div class="col-sm-1 "></div>
                <div class="col-sm-2 " id='carre3' style="border: 1px solid #ddd;border-radius: 4px;padding: 1px;vertical-align: top;width:100px;height:200px; background-color: <?php echo $gen['couleur_cadre']; ?>;"></div>
                <div class="col-sm-9 ">
                <label class=" control-label" style="color:red;">Rouge &nbsp&nbsp&nbsp<span id="rouge_cadre"><?php echo $gen['rouge_cadre']; ?></span></label>
                <input id='sliderR3' type='range' min="0" max="255" step="1" onChange="modif_cadre()" value="<?php echo $gen['rouge_cadre']; ?>"/>
                <label class=" control-label" style="color:green;">Vert &nbsp&nbsp&nbsp<span id="vert_cadre" ><?php echo $gen['vert_cadre']; ?></span></label>
                <input id='sliderV3' type='range' min="0" max="255" step="1" onChange="modif_cadre()" value="<?php echo $gen['vert_cadre']; ?>"/>
                <label class=" control-label" style="color:blue;">Bleu &nbsp&nbsp&nbsp<span id="bleu_cadre" ><?php echo $gen['bleu_cadre']; ?></span></label>
                <input id='sliderB3' type='range' min="0" max="255" step="1" onChange="modif_cadre()" value='<?php echo $gen['bleu_cadre']; ?>'/>
                <label class=" control-label" >Opacité &nbsp&nbsp&nbsp<span id="opacity_cadre"><?php echo $gen['opacity_titre']; ?></span></label>
                <input id='sliderO3' type='range' min="0" max="1" step="0.05" onChange="modif_cadre()" value="<?php echo $gen['opacity_cadre']; ?>"/>
                <input type="hidden" id="r_cadre" name="rouge_cadre" value="<?php echo $gen['rouge_cadre']; ?>"/>
                <input type="hidden" id="v_cadre" name="vert_cadre" value="<?php echo $gen['vert_cadre']; ?>"/>
                <input type="hidden" id="b_cadre" name="bleu_cadre" value="<?php echo $gen['bleu_cadre']; ?>"/>
                <input type="hidden" id="o_cadre" name="opacity_cadre" value="<?php echo $gen['opacity_cadre']; ?>"/>
                <input type="hidden" id="couleur_cadre" name="couleur_cadre" value="<?php echo $gen['couleur_cadre']; ?>"/>
                </div>
                </div>
                </div>
                <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Couleur des boutons personnaes</h3>              
            </div>
            </div>
            <div class="form-horizontal">
            <div class="form-group">
            <div class="col-sm-1 "></div>
                <div class="col-sm-2 " id='carre2' style="border: 1px solid #ddd;border-radius: 4px;padding: 1px;vertical-align: top;width:100px;height:200px; background-color: <?php echo $gen['couleur_per']; ?>;"></div>
                <div class="col-sm-9 ">
                <label class=" control-label" style="color:red;">Rouge &nbsp&nbsp&nbsp<span id="rouge_per"><?php echo $gen['rouge_per']; ?></span></label>
                <input id='sliderR2' type='range' min="0" max="255" step="1" onChange="modif_per()" value="<?php echo $gen['rouge_per']; ?>"/>
                <label class=" control-label" style="color:green;">Vert &nbsp&nbsp&nbsp<span id="vert_per" ><?php echo $gen['vert_per']; ?></span></label>
                <input id='sliderV2' type='range' min="0" max="255" step="1" onChange="modif_per()" value="<?php echo $gen['vert_per']; ?>"/>
                <label class=" control-label" style="color:blue;">Bleu &nbsp&nbsp&nbsp<span id="bleu_per" ><?php echo $gen['bleu_per']; ?></span></label>
                <input id='sliderB2' type='range' min="0" max="255" step="1" onChange="modif_per()" value='<?php echo $gen['bleu_per']; ?>'/>
                <label class=" control-label" >Opacité &nbsp&nbsp&nbsp<span id="opacity_per"><?php echo $gen['opacity_per']; ?></span></label>
                <input id='sliderO2' type='range' min="0" max="1" step="0.05" onChange="modif_per()" value="<?php echo $gen['opacity_per']; ?>"/>
                <input type="hidden" id="r_per" name="rouge_per" value="<?php echo $gen['rouge_per']; ?>"/>
                <input type="hidden" id="v_per" name="vert_per" value="<?php echo $gen['vert_per']; ?>"/>
                <input type="hidden" id="b_per" name="bleu_per" value="<?php echo $gen['bleu_per']; ?>"/>
                <input type="hidden" id="o_per" name="opacity_per" value="<?php echo $gen['opacity_per']; ?>"/>
                <input type="hidden" id="couleur_per" name="couleur_per" value="<?php echo $gen['couleur_per']; ?>"/>
                </div>
                </div>
                </div>
                <div class="box-footer">
                <a class="btn btn-default" href="<?php echo base_url()?>cms">Annuler</a>
                <button id='enregistrer' type="submit" class="btn btn-info pull-right">Enregistrer</button>
                </form>
              </div>
              </div>
              </div>
</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div><strong>Copyright &copy; 2018-BlueStier</strong> All rights reserved.
  </footer><!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  <script>
       document.getElementById("select_couleur").selectedIndex = "<?php echo $select_couleur; ?>";
      document.getElementById("select_en_tete").selectedIndex = "<?php echo $select_entete; ?>";

        function modif_cadre(){
        var rouge = document.getElementById('sliderR3').value;
        var vert = document.getElementById('sliderV3').value;
        var bleu = document.getElementById('sliderB3').value;
        var opacity = document.getElementById('sliderO3').value;
        var couleur = document.getElementById('couleur_cadre');
        var rgba = 'rgba(' + rouge + ',' +  vert + ',' + bleu + ',' + opacity + ')';
        couleur.value = rgba;
        document.getElementById('carre3').style.background = rgba;
        document.getElementById('rouge_cadre').innerHTML = rouge;
        document.getElementById('vert_cadre').innerHTML = vert;
        document.getElementById('bleu_cadre').innerHTML = bleu;
        document.getElementById('opacity_cadre').innerHTML = opacity;
        document.getElementById('r_cadre').value = rouge;
        document.getElementById('v_cadre').value = vert;
        document.getElementById('b_cadre').value = bleu;
        document.getElementById('o_cadre').value = opacity;
      }

      function modif_titre(){
        var rouge = document.getElementById('sliderR').value;
        var vert = document.getElementById('sliderV').value;
        var bleu = document.getElementById('sliderB').value;
        var opacity = document.getElementById('sliderO').value;
        var couleur = document.getElementById('couleur_titre');
        var rgba = 'rgba(' + rouge + ',' +  vert + ',' + bleu + ',' + opacity + ')';
        couleur.value = rgba;
        document.getElementById('carre').style.background = rgba;
        document.getElementById('rouge_titre').innerHTML = rouge;
        document.getElementById('vert_titre').innerHTML = vert;
        document.getElementById('bleu_titre').innerHTML = bleu;
        document.getElementById('opacity_titre').innerHTML = opacity;
        document.getElementById('r_titre').value = rouge;
        document.getElementById('v_titre').value = vert;
        document.getElementById('b_titre').value = bleu;
        document.getElementById('o_titre').value = opacity;
      }

   function modif_menu(){
        var rouge = document.getElementById('sliderR1').value;
        var vert = document.getElementById('sliderV1').value;
        var bleu = document.getElementById('sliderB1').value;
        var opacity = document.getElementById('sliderO1').value;
        var couleur = document.getElementById('couleur_menu');
        var rgba = 'rgba(' + rouge + ',' +  vert + ',' + bleu + ',' + opacity + ')';
        couleur.value = rgba;
        document.getElementById('carre1').style.background = rgba;
        document.getElementById('rouge_menu').innerHTML = rouge;
        document.getElementById('vert_menu').innerHTML = vert;
        document.getElementById('bleu_menu').innerHTML = bleu;
        document.getElementById('opacity_menu').innerHTML = opacity;
        document.getElementById('r_menu').value = rouge;
        document.getElementById('v_menu').value = vert;
        document.getElementById('b_menu').value = bleu;
        document.getElementById('o_menu').value = opacity;
      }

       function modif_per(){
        var rouge = document.getElementById('sliderR2').value;
        var vert = document.getElementById('sliderV2').value;
        var bleu = document.getElementById('sliderB2').value;
        var opacity = document.getElementById('sliderO2').value;
        var couleur = document.getElementById('couleur_per');
        var rgba = 'rgba(' + rouge + ',' +  vert + ',' + bleu + ',' + opacity + ')';
        couleur.value = rgba;
        document.getElementById('carre2').style.background = rgba;
        document.getElementById('rouge_per').innerHTML = rouge;
        document.getElementById('vert_per').innerHTML = vert;
        document.getElementById('bleu_per').innerHTML = bleu;
        document.getElementById('opacity_per').innerHTML = opacity;
        document.getElementById('r_per').value = rouge;
        document.getElementById('v_per').value = vert;
        document.getElementById('b_per').value = bleu;
        document.getElementById('o_per').value = opacity;
      }
  </script>    
  	