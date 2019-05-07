@extends("templates.master")


@section('css-view')

@stop

@section('conteudo-view')
<section class="content-header">
    <h1>
      Validação
      <small>Calcular</small>
    </h1>
    <ol class="breadcrumb">
      <li><a class="lnkList" href=""><i class="fa fa-pencil-square-o"></i> Processar</a></li>
      <li class="active"><i class="fa fa-lightbulb-o"></i> Calcular Validação</li>
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
            <h3 class="box-title">Calcular Validação</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form id="frmBuscaZero" name="frmBuscaZero" method="post">
            <div class="box-body">
              <!-- <button id="btnChamarImportar" type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-upload"></i> Importar
              </button> -->
              <div class="form-group"><br></div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td colspan="4" class="txtc"><h4>Valor Verdadeiro</h4></td>
                      </tr>
                      <tr class="txtc">
                        <td colspan="2"></td>
                        <td><h4>Positivos</h4></td>
                        <td><h4>Negativos</h4></td>
                      </tr>
                      <tr>
                        <td rowspan="5" style="text-align: center; vertical-align: middle;"><h4 style="transform: rotate(270deg);">Valor Previsto</h4></td>
                      </tr>
                      <tr  class="txtc">
                        <td rowspan="2" style="vertical-align: middle"><h4>Positivos</h4></td>
                        <td><input name=vp></td>
                        <td><input name=fp></td>
                      </tr>
                      <tr class="txtc">
                        <td>VP - Verdadeiro Positivo</td>
                        <td>FP - Falso Positivo</td>
                      </tr>
                      <tr class="txtc">
                        <td rowspan="2" style="vertical-align: middle"><h4>Negativos</h4></td>
                        <td><input name=fn></td>
                        <td><input name=vn></td>
                      </tr>
                      <tr class="txtc">
                        <td>FN - Falso Negativo</td>
                        <td>VN - Verdadeiro Negativo</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer txtc">
              <button class="btn btn-primary btn-lg"><i class="fa fa-cog"></i> Processar</button>
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
