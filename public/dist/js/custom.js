arrMensErro = [
  'Termo não informado',
  'Informe o termo com no mínimo de três caracteres',
  'Informe o arquivo ser importado',
  'Descrição não informada',
  'Palavra chave não informada'
];

$('.btnAdd').click(function(){
  // Objeto acionado
  obj = $(this).parent().parent();

  // Copia do objeto
  d_ant = obj.find('input').val();
  // Limpando dados
  obj.find('input').val('');
  // Clonando obj
  copia = obj.clone(true,true);
  // Atualizando objeto pai
  copia.find('input').val(d_ant);
  // Criando novo objeto
  obj.before(copia);
  // Focando no elemento
  obj.find('input').focus();
  // Limpando objeto clonado
  obj.find('input').parent().parent().removeClass('has-error');
  obj.find('input').next('span').remove();
});

function getProxElem()
{
  var arrEl = [];
  var numero = 0;
  $('#frmTermo .box-body div.ln.termo').map(function(i, el){
    arrEl.push($(el).attr('ref'));
  });
  numero = Math.max.apply(null, arrEl);

  return numero + 1;
}

$('.btnAddTermo').click(function(){

  var prox_el = getProxElem();

  // Objeto acionado
  obj = $(this).parent().parent().parent();

  // Limpando radios
  $('input[type="radio"]').iCheck('destroy');

  // Copia do objeto
  d_ant = obj.find('input').val();
  // Limpando dados
  obj.find('input').val('');

  // Clonando obj
  copia = obj.clone(true,true);
  // Atualizando objeto pai
  copia.find('input').val(d_ant);
  // Criando novo objeto
  obj.before(copia);
  // Focando no elemento
  obj.find('input').focus();
  // Limpando objeto clonado
  obj.find('input').parent().parent().removeClass('has-error');
  obj.find('input').next('span').remove();
  // obj.find("input[type='checkbox']").iCheck('uncheck');

  // Atualizando referência
  obj.attr('ref', prox_el);

  obj.find('input[type="radio"]').attr('name', 'classificacao_'+prox_el);

  // Limpando a seleção anterior
  obj.find('input[type="radio"]').removeAttr('checked').iCheck('update');

  $('input[type="radio"]').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green',
    increaseArea: '40%' 
  });
});


$('.btnAddTextArea').click(function(){
  // Objeto acionado
  obj = $(this).parent().parent();
  // Copia do objeto
  d_ant = obj.find('textarea').val();
  // Limpando dados
  obj.find('textarea').val('');
  // Clonando obj
  copia = obj.clone(true,true);
  // Atualizando objeto pai
  copia.find('textarea').val(d_ant);
  // Criando novo objeto
  obj.before(copia);
  // Focando no elemento
  obj.find('textarea').focus();
  // Limpando objeto clonado
  obj.find('textarea').parent().parent().removeClass('has-error');
  obj.find('textarea').next('span').remove();
});

$('.btnDel').click(function(){
  
  var tot = $(".box-body .form-group.row.termo").length;
  if(tot > 1){
    obj = $(this).parent().parent();
    obj.remove();
  } else {
    $("#modal-warning").modal("show");
  }
});

$('.btnDelTermo').click(function(){
  
  var tot = $(".box-body .ln.termo").length;
  if(tot > 1){
    obj = $(this).parent().parent().parent();
    obj.remove();
  } else {
    $("#modal-warning").modal("show");
  }
});

if($("#carregar-csv").length)
{
  $("#carregar-csv").fileinput({
    language: "pt-BR",
    showCaption: true, 
    showPreview: false,
    showUpload: false,
    dropZoneEnabled: false,
    allowedFileExtensions: ["csv"],
    elErrorContainer: '#kartik-file-errors'
  });
}

//iCheck for checkbox and radio inputs
if(
  $('input[type="checkbox"].minimal').length || 
  $('input[type="radio"].minimal').length ||
  $('input[type="checkbox"].minimal-red').length ||
  $('input[type="radio"].minimal-red').length ||
  $('input[type="checkbox"].flat-red').length ||
  $('input[type="radio"].flat-red').length
  )
{
  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass   : 'iradio_minimal-blue'
  });
  //Red color scheme for iCheck
  $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
    checkboxClass: 'icheckbox_minimal-red',
    radioClass   : 'iradio_minimal-red'
  });
  //Flat red color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green'
  });
}

function limparForm(idt)
{
  var objLimpar = $(idt+" input[name='termos[]']").parent().parent();
  for(y=1; y < objLimpar.length; y++ )
  {
    objLimpar[y].remove();
  }      
}

function limpaMensErrBox(idt)
{
  $(idt+" .boxErrImport").removeClass('has-error');
  $(idt+" .boxErrImport span.help-block").remove();
}

function limpaMensErr(idt)
{
  $(idt).keypress(function(event) {
    $(event.target).parent().parent().removeClass('has-error');
    $(event.target).next('span').remove();
  });
}

function OnCheckbox(idt)
{
  // Botão ativo - Inclusão de valores
  $("input[type='checkbox']").on('ifChecked', function(event){
    $(idt).val(1);
  });
}

function OffCheckbox(idt)
{
  // Botão desativado - Inclusão de valores
  $("input[type='checkbox']").on('ifUnchecked', function(event){
    $(idt).val(0);
  });
}

function OnRadioButton(idt)
{
  // Botão ativo - Inclusão de valores
  $("input[ref='tipo_on']").on('ifChanged', function(event){
    $(idt).val(1);
  });
}

function OffRadioButton(idt)
{
  // Botão ativo - Inclusão de valores
  $("input[ref='tipo_off']").on('ifChanged', function(event){
    $(idt).val(2);
  });
}

function finalizandoProcessarImport(idt,url)
{
  $(".progress").show();

  for(i=0;i<=100;i++){
    $("#grf-import").attr('aria-valuenow', i);
    $("#grf-import").css({'width': i+'%'});
    $(".sr-only").text('');
    $(".sr-only").text(i+'% Complete (sucesso)');
  }
  if(i == 101){
    $(".boxSucessoImport").show();
    $(".boxSucessoImport").fadeOut( 5000, function() {
      $(".progress").hide(); 
      $(idt)[0].reset();  
      $(idt+' .btnFechar').trigger('click');
      location.href=url;
    }); 
  } 
}

function addErrImport(idt)
{
  $(idt+" .boxErrImport").removeClass('has-error');
  $(idt+" .boxErrImport span.help-block").remove();
  $(idt+" .boxErrImport").addClass('has-error');
  $(idt+" .boxErrImport label").after('<span class="help-block">'+arrMensErro[2]+'</span>');
}

function insertLink(idt, lnk)
{
  $(idt).attr('href', lnk);
}

function contarPalavra(elm, tpalavra){
  // "textarea[name='termos[]']"
  var formcontent = $(elm)[0];
  var txt = $(formcontent).val();
  var aux = txt.split(" ");
  
  return (aux.length > tpalavra) ? false : true;
}


// Menu - config automatica
/** add active class and stay opened when selected */
var url = window.location;

// for sidebar menu entirely but not cover treeview
$('ul.sidebar-menu a').filter(function() {
   return this.href == url;
}).parent().addClass('active');

// for treeview
$('ul.treeview-menu a').filter(function() {
   return this.href == url;
}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');