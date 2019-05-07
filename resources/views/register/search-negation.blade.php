@extends("templates.master")


@section('css-view')

@stop

@section('conteudo-view')
<section class="content-header">
    <h1>
      Busca Negação
      <small>Listagem</small>
    </h1>
    <ol class="breadcrumb">
      <li><a class="lnkList" href=""><i class="fa fa-pencil-square-o"></i> Cadastro</a></li>
      <li class="active"><i class="fa fa-search"></i> Listagem Busca Negação</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Lista de Busca Negação</h3>
            <a class="lnkAdd btn btn-success pull-right" href=""><i class="fa fa-plus"></i> Adicionar</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="lst-table" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID</th>
                <th>Termo</th>
                <th>Status</th>
                <th>Opções</th>
              </tr>
              </thead>
              <tbody>
              </tbody>
              <tfoot>
              <tr>
                <th>ID</th>
                <th>Termo</th>
                <th>Status</th>
                <th>Opções</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
@stop

@section('js-view')
@stop
