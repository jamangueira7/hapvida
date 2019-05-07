@extends("templates.master")


@section('css-view')

@stop

@section('conteudo-view')
<section class="content-header">
    <h1>
      Grupo de Acesso
      <small>Adicionar</small>
    </h1>
    <ol class="breadcrumb">
      <li><a class="lnkList" href=""><i class="fa fa-pencil-square-o"></i> Cadastro</a></li>
      <li class="active"><i class="fa fa-map"></i> Adicionar Grupo de Acesso</li>
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
            <h3 class="box-title">Cadastrar Grupo de Acesso</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form id="frmGrupoAcesso" name="frmGrupoAcesso" method="post">
            <div class="box-body">
              <!-- <button id="btnChamarImportar" type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-upload"></i> Importar
              </button> -->
              <div class="form-group"><br></div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label">Nome</label>
                <div class="col-sm-11">
                  <input name=nomegrupo type="text" class="form-control" placeholder="Informe o grupo">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label">Ativo</label>
                <div class="col-sm-11">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input id="ativo" name="ativo" type="hidden" value="0">
                  </label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <span class="col-sm-3 col-form-label">Orgãos</span>
                <label class="col-sm-1 col-form-label">Adicionar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="add" name="ativo" type="hidden" value="0">
                  </label>
                </div>
                <label class="col-sm-1 col-form-label">Editar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="edit" name="ativo" type="hidden" value="0">
                  </label>
                </div>
                <label class="col-sm-1 col-form-label">Visualizar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="view" name="ativo" type="hidden" value="0">
                  </label>
                </div>
                <label class="col-sm-1 col-form-label">Apagar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="del" name="ativo" type="hidden" value="0">
                  </label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <span class="col-sm-3 col-form-label">Busca Zero</span>
                <label class="col-sm-1 col-form-label">Adicionar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="add" name="ativo" type="hidden" value="0">
                  </label>
                </div>
                <label class="col-sm-1 col-form-label">Editar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="edit" name="ativo" type="hidden" value="0">
                  </label>
                </div>
                <label class="col-sm-1 col-form-label">Visualizar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="view" name="ativo" type="hidden" value="0">
                  </label>
                </div>
                <label class="col-sm-1 col-form-label">Apagar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="del" name="ativo" type="hidden" value="0">
                  </label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <span class="col-sm-3 col-form-label">Termos de Busca de Negação</span>
                <label class="col-sm-1 col-form-label">Adicionar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="add" name="ativo" type="hidden" value="0">
                  </label>
                </div>
                <label class="col-sm-1 col-form-label">Editar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="edit" name="ativo" type="hidden" value="0">
                  </label>
                </div>
                <label class="col-sm-1 col-form-label">Visualizar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="view" name="ativo" type="hidden" value="0">
                  </label>
                </div>
                <label class="col-sm-1 col-form-label">Apagar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="del" name="ativo" type="hidden" value="0">
                  </label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <span class="col-sm-3 col-form-label">Termos Descritivos de Tumores</span>
                <label class="col-sm-1 col-form-label">Adicionar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="add" name="ativo" type="hidden" value="0">
                  </label>
                </div>
                <label class="col-sm-1 col-form-label">Editar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="edit" name="ativo" type="hidden" value="0">
                  </label>
                </div>
                <label class="col-sm-1 col-form-label">Visualizar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="view" name="ativo" type="hidden" value="0">
                  </label>
                </div>
                <label class="col-sm-1 col-form-label">Apagar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="del" name="ativo" type="hidden" value="0">
                  </label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <span class="col-sm-3 col-form-label">Resultados</span>
                <label class="col-sm-1 col-form-label">Adicionar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="add" name="ativo" type="hidden" value="0">
                  </label>
                </div>
                <label class="col-sm-1 col-form-label">Editar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="edit" name="ativo" type="hidden" value="0">
                  </label>
                </div>
                <label class="col-sm-1 col-form-label">Visualizar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="view" name="ativo" type="hidden" value="0">
                  </label>
                </div>
                <label class="col-sm-1 col-form-label">Apagar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="del" name="ativo" type="hidden" value="0">
                  </label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <span class="col-sm-3 col-form-label">Rede Neural</span>
                <label class="col-sm-1 col-form-label">Adicionar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="add" name="ativo" type="hidden" value="0">
                  </label>
                </div>
                <label class="col-sm-1 col-form-label">Editar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="edit" name="ativo" type="hidden" value="0">
                  </label>
                </div>
                <label class="col-sm-1 col-form-label">Visualizar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="view" name="ativo" type="hidden" value="0">
                  </label>
                </div>
                <label class="col-sm-1 col-form-label">Apagar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="del" name="ativo" type="hidden" value="0">
                  </label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <span class="col-sm-3 col-form-label">Rede Termo</span>
                <label class="col-sm-1 col-form-label">Adicionar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="add" name="ativo" type="hidden" value="0">
                  </label>
                </div>
                <label class="col-sm-1 col-form-label">Editar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="edit" name="ativo" type="hidden" value="0">
                  </label>
                </div>
                <label class="col-sm-1 col-form-label">Visualizar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="view" name="ativo" type="hidden" value="0">
                  </label>
                </div>
                <label class="col-sm-1 col-form-label">Apagar</label>
                <div class="col-sm-1">
                  <label>
                    <input type="checkbox" class="minimal">
                    <input class="del" name="ativo" type="hidden" value="0">
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
