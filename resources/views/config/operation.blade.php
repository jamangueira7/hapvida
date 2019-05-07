@extends("templates.master")


@section('css-view')

@stop

@section('conteudo-view')
<section class="content-header">
    <h1>
      Operação
      <small>Visualizar/Editar</small>
    </h1>
    <ol class="breadcrumb">
      <li><a class="lnkList" href=""><i class="fa fa-pencil-square-o"></i> Visualizar/Editar</a></li>
      <li class="active"><i class="fa fa-sliders"></i> Operação</li>
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
            <h3 class="box-title">Visualizar/Editar Operação</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form id="frmParametrizacaoServicoConsumo" name="frmParametrizacaoServicoConsumo" method="post">
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="box box-solid">
                    <div class="box-header with-border">
                      <h3 class="box-title">Agendamentos</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="form-group row">
                          <br>&nbsp;&nbsp;&nbsp;
                          <div class="col-sm-2"><label class="algr">Rotina</label></div>
                          <div class="col-sm-8">
                            <select class="form-control select2" style="width: 100%;">
                              <option selected="selected">Não especificada</option>
                              <option>Robo 1</option>
                              <option>Robo 2</option>
                              <option>Robo 3</option>
                            </select>
                            <p class="help-block">Informe a rotina a ser agendada.</p>
                          </div>
                        </div>
                      <div class="box-group">
                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                        <div class="panel box box-primary">
                          <div class="box-header with-border">
                            <h4 class="box-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                <i class="fa fa-minus-square-o"></i> Status
                              </a>
                            </h4>
                          </div>
                          <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="box-body">
                              <div class="form-group row">
                                <div class="col-sm-12 radioab">
                                  <input type="radio" name="r1" class="flat-red" checked="checked">
                                  <label class="col-form-label rotradio">Ativo</label>
                                </div>
                                <div class="col-sm-12 radioab">
                                  <input type="radio" name="r1" class="flat-red">
                                  <label class="col-form-label rotradio">Inativo</label>
                                </div>
                                <div class="col-sm-12 radioab">
                                  <input type="radio" name="r1" class="flat-red">
                                  <label class="col-form-label rotradio">Ativo para o período</label>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label class="pos">
                                    <input type="checkbox" class="minimal">
                                    <input id="ativo" name="ativo" type="hidden" value="0">
                                  </label>
                                  <label class="col-form-label">Iniciando</label>
                                </div>
                                <div class="col-sm-9">
                                  <div class="col-sm-1">
                                    <label class="col-form-label">Data:</label>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" class="form-control pull-right" id="datepicker-ini">
                                    </div>
                                  </div>
                                  <div class="col-sm-1">
                                    <label class="col-form-label">Hora:</label>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                      </div>
                                      <input type="text" class="form-control timepicker">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label class="pos">
                                    <input type="checkbox" class="minimal">
                                    <input id="ativo" name="ativo" type="hidden" value="0">
                                  </label>
                                  <label class="col-form-label">Finalizando</label>
                                </div>
                                <div class="col-sm-9">
                                  <div class="col-sm-1">
                                    <label class="col-form-label">Data:</label>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" class="form-control pull-right" id="datepicker-fim">
                                    </div>
                                  </div>
                                  <div class="col-sm-1">
                                    <label class="col-form-label">Hora:</label>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                      </div>
                                      <input type="text" class="form-control timepicker">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label class="pos">
                                    <input type="checkbox" class="minimal">
                                    <input id="ativo" name="ativo" type="hidden" value="0">
                                  </label>
                                  <label class="col-form-label">Todos os dias entre</label>
                                </div>
                                <div class="col-sm-9">
                                  <div class="col-sm-1">
                                    <label class="col-form-label">De:</label>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                      </div>
                                      <input type="text" class="form-control timepicker">
                                    </div>
                                  </div>
                                  <div class="col-sm-1">
                                    <label class="col-form-label">Para:</label>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                      </div>
                                      <input type="text" class="form-control timepicker">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label class="pos">
                                    <input type="checkbox" class="minimal">
                                    <input id="ativo" name="ativo" type="hidden" value="0">
                                  </label>
                                  <label class="col-form-label">Exceto estes dias do mês</label>
                                </div>
                                <div class="col-sm-9">
                                  <div class="col-sm-8">
                                    <input class="form-control" type="text" name="diames">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label class="pos">
                                    <input type="checkbox" class="minimal">
                                    <input id="ativo" name="ativo" type="hidden" value="0">
                                  </label>
                                  <label class="col-form-label">Exceto esses dias da semana</label>
                                </div>
                                <div class="col-sm-9">
                                  <div class="col-sm-8">
                                    <label class="pos" style="margin-left: 0px;">
                                      <input type="checkbox" class="minimal">
                                      <input id="ativo" name="ativo" type="hidden" value="0">
                                    </label>
                                    <label class="col-form-label tm">Segunda-Feira</label>
                                    <label class="pos">
                                      <input type="checkbox" class="minimal">
                                      <input id="ativo" name="ativo" type="hidden" value="0">
                                    </label>
                                    <label class="col-form-label tm">Terça-Feira</label>
                                    <label class="pos">
                                      <input type="checkbox" class="minimal">
                                      <input id="ativo" name="ativo" type="hidden" value="0">
                                    </label>
                                    <label class="col-form-label tm">Quarta-Feira</label>

                                  </div>
                                  <div class="col-sm-8">
                                    <label class="pos" style="margin-left: 0px;">
                                      <input type="checkbox" class="minimal">
                                      <input id="ativo" name="ativo" type="hidden" value="0">
                                    </label>
                                    <label class="col-form-label tm">Quinta-Feira</label>
                                    <label class="pos">
                                      <input type="checkbox" class="minimal">
                                      <input id="ativo" name="ativo" type="hidden" value="0">
                                    </label>
                                    <label class="col-form-label tm">Sexta-Feira</label>
                                    <label class="pos">
                                      <input type="checkbox" class="minimal">
                                      <input id="ativo" name="ativo" type="hidden" value="0">
                                    </label>
                                    <label class="col-form-label tm">Sábado</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="pos" style="margin-left: 0px;">
                                      <input type="checkbox" class="minimal">
                                      <input id="ativo" name="ativo" type="hidden" value="0">
                                    </label>
                                    <label class="col-form-label tm">Domingo</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="panel box box-success">
                          <div class="box-header with-border">
                            <h4 class="box-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                <i class="fa fa-minus-square-o"></i> Execução
                              </a>
                            </h4>
                          </div>
                          <div id="collapseTwo" class="panel-collapse collapse in">
                            <div class="box-body">
                              <div class="col-sm-3">
                                <div class="form-group row">
                                  <input type="radio" name="r1" class="flat-red">
                                  <label class="col-form-label rotradio">No carregamento</label>
                                </div>
                                <div class="form-group row">
                                  <input type="radio" name="r1" class="flat-red">
                                  <label class="col-form-label rotradio">De hora em hora</label>
                                </div>
                                <div class="form-group row">
                                  <input type="radio" name="r1" class="flat-red">
                                  <label class="col-form-label rotradio">Diariamente</label>
                                </div>
                                <div class="form-group row">
                                  <input type="radio" name="r1" class="flat-red" checked="checked">
                                  <label class="col-form-label rotradio">Semanal</label>
                                </div>
                                <div class="form-group row">
                                  <input type="radio" name="r1" class="flat-red">
                                  <label class="col-form-label rotradio">Mensal (dia do mês)</label>
                                </div>
                                <div class="form-group row">
                                  <input type="radio" name="r1" class="flat-red">
                                  <label class="col-form-label rotradio">Mensalmente (dia da semana)</label>
                                </div>
                                <div class="form-group row">
                                  <input type="radio" name="r1" class="flat-red">
                                  <label class="col-form-label rotradio">Anual</label>
                                </div>
                              </div>
                              <div class="col-sm-9">
                                <div class="col-sm-3">
                                  <label class="pos" style="margin-left: 0px;">
                                    <input type="checkbox" class="minimal">
                                    <input id="ativo" name="ativo" type="hidden" value="0">
                                  </label>
                                  <label class="col-form-label tm">Segunda-Feira</label>
                                </div>
                                <div class="col-sm-3">
                                  <label class="pos">
                                    <input type="checkbox" class="minimal">
                                    <input id="ativo" name="ativo" type="hidden" value="0">
                                  </label>
                                  <label class="col-form-label tm">Terça-Feira</label>
                                </div>
                                <div class="col-sm-3">
                                  <label class="pos">
                                    <input type="checkbox" class="minimal">
                                    <input id="ativo" name="ativo" type="hidden" value="0">
                                  </label>
                                  <label class="col-form-label tm">Quarta-Feira</label>
                                </div>
                                <div class="col-sm-3">
                                  <label class="pos">
                                    <input type="checkbox" class="minimal">
                                    <input id="ativo" name="ativo" type="hidden" value="0">
                                  </label>
                                  <label class="col-form-label tm">Quinta-Feira</label>
                                </div>
                                <div class="col-sm-3">
                                  <label class="pos" style="margin-left: 0px;">
                                    <input type="checkbox" class="minimal">
                                    <input id="ativo" name="ativo" type="hidden" value="0">
                                  </label>
                                  <label class="col-form-label tm">Sexta-Feira</label>
                                </div>
                                <div class="col-sm-3">
                                  <label class="pos">
                                    <input type="checkbox" class="minimal">
                                    <input id="ativo" name="ativo" type="hidden" value="0">
                                  </label>
                                  <label class="col-form-label tm">Sábado</label>
                                </div>
                                <div class="col-sm-3">
                                  <label class="pos">
                                    <input type="checkbox" class="minimal">
                                    <input id="ativo" name="ativo" type="hidden" value="0">
                                  </label>
                                  <label class="col-form-label tm">Domingo</label>
                                </div>
                                <div class="col-sm-12">
                                  <div>&nbsp;</div>
                                  <div class="col-sm-1" style="padding-left: 0px;">
                                    <label class="col-form-label">Hora</label>
                                  </div>
                                  <div class="col-sm-3" style="padding-left: 0px;">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                      </div>
                                      <input type="text" class="form-control timepicker">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- END CUSTOM TABS -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Agendar</button>
              <!-- <a class="lnkList btn btn-info" href=""><i class="fa  fa-list-alt"></i> Lista</a> -->
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
