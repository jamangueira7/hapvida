@extends("templates.master")


@section('css-view')

@stop

@section('conteudo-view')
<section class="content-header">
    <h1>
      Consultas
      <small>Visualizar</small>
    </h1>
    <ol class="breadcrumb">
      <li><a class="lnkList" href=""><i class="fa fa-binoculars"></i> Visualizar</a></li>
      <li class="active"><i class="fa fa-search-plus"></i> Consultas</li>
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
            <h3 class="box-title">Visualizar Consultas</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form id="frmConsultas" name="frmConsultas" method="post">
            <div class="box-body">
              <!-- <button id="btnChamarImportar" type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-upload"></i> Importar
              </button> -->
              <div class="form-group"><br></div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label">Local</label>
                <div class="col-sm-5">
                  <input name=local type="text" class="form-control" placeholder="">
                </div>
                <label class="col-sm-1 col-form-label">Profissional</label>
                <div class="col-sm-5">
                  <input name=profissional type="text" class="form-control" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label">Prioridade</label>
                <div class="col-sm-5">
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Não especificada</option>
                    <option>Colo Uterino</option>

                  </select>
                </div>
                <label class="col-sm-1 col-form-label">Laboratório</label>
                <div class="col-sm-5">
                  <input name=laboratorio type="text" class="form-control" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label">Tipo de Laudo</label>
                <div class="col-sm-5">
                  <input name=tipoLaudo type="text" class="form-control" placeholder="">
                </div>
                <label class="col-sm-1 col-form-label">Período</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                    <input name=periodo type="text" class="form-control pull-right" id="reservationtime">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12" style="text-align: center;">
                  <button id="btnBuscar" class="btn btn-primary btn-lg"><i class="fa fa-search"></i> Buscar</button>
                </div>
              </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover" style="display: none">
                  <thead>
                  <tr>
                    <th>Local</th>
                    <th>Profissional</th>
                    <th>Prioridade(s)</th>
                    <th>Laboratório</th>
                    <th>Tipo de Laudo</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Matriz</td>
                      <td>Antônio Santos</td>
                      <td>Alta</td>
                      <td>Xlab</td>
                      <td>Raio-X</td>
                    </tr>
                    <tr>
                      <td>Filial</td>
                      <td>Maria Barbosa</td>
                      <td>Normal</td>
                      <td>Ylab</td>
                      <td>Exame de Urina</td>
                    </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Local</th>
                    <th>Profissional</th>
                    <th>Prioridade(s)</th>
                    <th>Laboratório</th>
                    <th>Tipo de Laudo</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
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
