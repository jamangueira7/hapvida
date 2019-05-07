@extends("templates.master")


@section('css-view')

@stop

@section('conteudo-view')
<section class="content-header">
    <h1>
      Escala de Severidade
      <small>Adicionar</small>
    </h1>
    <ol class="breadcrumb">
      <li><a class="lnkList" href=""><i class="fa fa-pencil-square-o"></i> Cadastro</a></li>
      <li class="active"><i class="fa fa-signal"></i> Adicionar Escala de Severidade</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="alert alert-success alert-dismissible boxSucesso" style="display: none">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Sucesso</h4>
          Dados cadastrados com sucesso.
        </div>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Cadastrar Escala de Severidade</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form id="frmEscalaSeveridade" name="frmEscalaSeveridade" method="post">
            <div class="box-body">
              <!-- <button id="btnChamarImportar" type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-upload"></i> Importar
              </button> -->
              <div class="form-group"><br></div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Especialidade Médica</label>
                <div class="col-sm-8">
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Não especificada</option>
                    <option>Colo Uterino</option>
                  </select>
                </div>
              </div>
              <div class="form-group row termo">
                <label class="col-sm-2 col-form-label">Valor Inicio</label>
                <div class="col-sm-8">
                  <input name="valorInicio" type="number" min="1" max="100" class="form-control" placeholder="Informe o Valor Inicio">
                </div>
              </div>
              <div class="form-group row termo">
                <label class="col-sm-2 col-form-label">Valor Final</label>
                <div class="col-sm-8">
                  <input name="valorFinal" type="number" min="1" max="100" class="form-control" placeholder="Informe o Valor Final">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Escala</label>
                <div class="col-sm-8">
                  <input type="text" value="0" class="slider form-control" data-slider-min="0" data-slider-max="100"
                       data-slider-step="1" data-slider-value="[0,100]" data-slider-orientation="horizontal"
                       data-slider-selection="before" data-slider-tooltip="show" data-slider-id="blue">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Ativo</label>
                <div class="col-sm-10">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input id="ativo" name="ativo" type="hidden" value="0">
                  </label>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Salvar</button>
              <a class="lnkList btn btn-info" href=""><i class="fa  fa-list-alt"></i> Lista</a>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
      <!--/.col (left) -->
    </div>
    <!-- /.row -->
  </section>
@stop

@section('js-view')
@stop
