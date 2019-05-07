@extends("templates.master")


@section('css-view')

@stop

@section('conteudo-view')
<section class="content-header">
    <h1>
      Resultados
      <small>Visualizar</small>
    </h1>
    <ol class="breadcrumb">
      <li><a class="lnkList" href=""><i class="fa fa-binoculars"></i> Visualizar</a></li>
      <li class="active"><i class="fa fa-th"></i> Resultados</li>
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
            <h3 class="box-title">Visualizar Resultados</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <!-- <form id="frmRelatorio" name="frmRelatorio" method="post"> -->
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
                  <button id="btnBuscar2" class="btn btn-primary btn-lg"><i class="fa fa-search"></i> Buscar</button>
                </div>
              </div>
            </div>
            <div id='rlaudo' class="box-body" style="display: none">
              <div style="text-align: right;"><strong>Legenda :: </strong> ST - Sem Tumor | NC - Nada Consta</div>
              <br>
              <div>PLN - Processamento de Linguagem Natural</div>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Laudo</th>
                  <th>Resultado</th>
                  <th>Severidade</th>
                  <th>Orgão</th>
                  <th>Laudo Filtrado</th>
                  <th>Aprovado</th>
                  <th>Cometário</th>
                  <th>...</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>_37_13418064000159_00000384_000059.TXT.utf8</td>
                    <td>TUMOR BENIGNO</td>
                    <td>NC</td>
                    <td>ovario</td>
                    <td>
                      <span class="txtRotulo" onmouseover="verLaudo(this)"></span>
                      <div class='txtFull'>numero do exame d271847 tipo de exame peca cirurgica complexa data recepcao 21112018 dados clinicos cid c56 exame macroscopico recebido em formol identificados separadamente os seguintes especimens tumor de ovario direito porcao de tecido previamente seccionado medindo 70x53x40cm exibe superficie externa parda lisa superficie interna parda fasciculada aos cortes tecido esbranquicado firme superficie de corte corada em preto seccoes 09 3c tumor de ovario esquerdo porcao de tecido irregular de consistencia elastica de cor parda medindo 37x30x15cm aos cortes observase cavidade cistica de supeficie interna medindo 20x18cm de conteudo liquido translucido aderido trompa uterina medindo 50cm de comprimento 10cm em seu maior diametro serosa parda lisa aos cortes lumen esta preenchido por tecido pardo parede mede 02cm de espessura maxima seccoes porcao cavidade cistica 02 2c outras areas 02 1c trompa uterina 05 1c exame microscopico tumor de ovario direito as seccoes mostram formacao nodular com proliferacao fusocelular constituida por celulas alongadas sem atipias com arranjos fasciculados tumor de ovario esquerdo seccoes revelam tecido ovariano exibindo formacao cistica revestida por celulas luteinizadas com centro hemorragico sem atipias ao lado de foliculos ovarianos cistificados formacao cistica forrada por epitelio achatados simples sem atipias aderido trompa uterina sem alteracoes histologicas dignas de nota conclusao tumor de ovario direito proliferacao fusocelular ver nota tumor de ovario esquerdo foliculos ovarianos cistificados cisto de corpo luteo hemorragico cisto seroso simples trompa uterina sem alteracoes histologicas nota os aspectos morfologicos sao sugestivos de um leiomioma esta sendo realizado estudo imunohistoquimico para melhor definicao da histogenese</div>
                    </td>
                    <td class="tcenter">
                      <label>
                        <input type="checkbox" class="minimal">
                        <input id="ativo" name="ativo" type="hidden" value="0">
                      </label>
                    </td>
                    <td><textarea rows="3"></textarea></td>
                    <td><button type="button" class="btn" title="Gerar PDF" onclick="print()"><i class="fa fa-download"></i></button></td>
                  </tr>
                  <tr>
                    <td>_58_13418064000159_00000404_000054.TXT.utf8</td>
                    <td>ST</td>
                    <td>NC</td>
                    <td>epitelio</td>
                    <td>
                      <span class="txtRotulo" onmouseover="verLaudo(this)"></span>
                      <div class='txtFull'>numero do exame d275147 tipo de exame biopsia simples data recepcao 19122018 dados clinicos cid k30 exame macroscopico recebido em formol dois fragmentos irregulares de tecido pardo aderidos retalho de papel de filtro medindo em conjunto 04x03x01cm seccoes 02 tm 1c exame microscopico biopsia de corpo gastrico as seccoes revelam mucosa gastrica de padrao corpofundo com epitelio de revestimento integro algumas glandulas exibem exocitose neutrofilica epitelio de aspecto reacional lamina propria apresenta moderado infiltrado inflamatorio linfoplasmocitario neutrofilico muscular da mucosa nao esta representada pesquisa de pylori pela tecnica do giemsa foi positiva biopsia de antro gastrico as seccoes revelam mucosa gastrica de padrao antral com epitelio de revestimento integro algumas glandulas exibem exocitose neutrofilica epitelio de aspecto reacional ha metaplasia intestinal completa lamina propria apresenta moderado infiltrado inflamatorio linfoplasmocitario neutrofilico muscular da mucosa esta representada pesquisa de pylori pela tecnica do giemsa foi positiva conclusao ibiopsia de corpo gastrico gastrite cronica moderada em atividade associada ao pylori iibiopsia de antro gastrico gastrite cronica moderada em atividade associada ao pylori metaplasia intestinal completa discreta</div>
                    </td>
                    <td class="tcenter">
                      <label>
                        <input type="checkbox" class="minimal">
                        <input id="ativo" name="ativo" type="hidden" value="0">
                      </label>
                    </td>
                    <td><textarea rows="3"></textarea></td>
                    <td><button type="button" class="btn" title="Gerar PDF" onclick="print()"><i class="fa fa-download"></i></button></td>
                  </tr>
                  <tr>
                    <td>16918321000100_00000834_000412.TXT.utf8</td>
                    <td>ST</td>
                    <td>NC</td>
                    <td>estomago</td>
                    <td>
                      <span class="txtRotulo" onmouseover="verLaudo(this)"></span>
                      <div class='txtFull'>numero do exame 19b001903 tipo de exame biopsia data recepcao 19012019 dados clinicos giemsa exame macroscopico identificacao do frasco biopsia gastrica fixador formalina numero de fragmentos medidas dos fragmentos entre 02 05 cm caracteristicas irregulares esbranquicados macios material submetido ao processamento histologico em sua totalidade 4f1csr legenda ffragmento ccassete rreserva de material conclusao estomago biopsia gastrite cronica moderada ativa em mucosas de padrao antral corpal gastrite cronica moderada em mucosas de padrao antral corpal atividade inflamatoria leve em mucosas de padrao antral corpal metaplasia intestinal ausente displasia ausente atrofia ausente outros achados agregados linfoides pesquisa de helicobacter pylori positiva coloracao especial giemsa referencia sipponen price ab 2011 the sydney system for classification of gastritis 20 years ago gastroenterol hepatol vol26 suppl pp3141</div>
                    </td>
                    <td class="tcenter">
                      <label>
                        <input type="checkbox" class="minimal">
                        <input id="ativo" name="ativo" type="hidden" value="0">
                      </label>
                    </td>
                    <td><textarea rows="3"></textarea></td>
                    <td><button type="button" class="btn" title="Gerar PDF" onclick="print()"><i class="fa fa-download"></i></button></td>
                  </tr>
                  <tr>
                    <td>_80_26644607000289_00000011_000510.TXT.utf8</td>
                    <td>ST</td>
                    <td>NC</td>
                    <td>estomago</td>
                    <td>
                      <span class="txtRotulo" onmouseover="verLaudo(this)"></span>
                      <div class='txtFull'>numero do exame 18b003341 tipo de exame biopsia data recepcao 22122018 exame macroscopico fixador formalina numero de fragmentos 01 caracteristicas pardacento macio dimensoes do fragmento 05 03 01 cm 1f 1c sr legenda ffragmento ccassete rreserva de material conclusao estomago biopsia gastrite cronica inativa inflamacao cronica presente leve atividade inflamatoria ausente atrofia ausente metaplasia intestinal ausente displasia ausente pesquisa de helicobacter pylori negativa giemsa referencia sipponen price ab 2011 the sydney system for classification of gastritis 20 years ago gastroenterol hepatol vol26 suppl pp3141</div>
                    </td>
                    <td class="tcenter">
                      <label>
                        <input type="checkbox" class="minimal">
                        <input id="ativo" name="ativo" type="hidden" value="0">
                      </label>
                    </td>
                    <td><textarea rows="3"></textarea></td>
                    <td><button type="button" class="btn" title="Gerar PDF" onclick="print()"><i class="fa fa-download"></i></button></td>
                  </tr>
                  <tr>
                    <td>_25_03217520000149_00000001_000187.txt.utf8</td>
                    <td>ST</td>
                    <td>NC</td>
                    <td>capilares</td>
                    <td>
                      <span class="txtRotulo" onmouseover="verLaudo(this)"></span>
                      <div class='txtFull'>c92469791 r18023816 medico dra gabriela cabral serrano 14054 laboratorio 6841 hap vida recife data de entrada 05122018 anatomopatologico informacao recebida polipo gastrico epigastralgia exame macroscopico material recebido para exame consta de 02 frascos enviados separados identificados como sendo produto de polipectomia constituida por tecido macio de coloracao castanho acinzentada todo material enviado inclusao 01f 02 fragmentos irregulares medindo maior 04 02 01 cm constituidos por tecido de consistencia macia de coloracao castanhoacinzentada todo material enviado inclusao 02f exame microscopico os cortes de mostram fragmentos de mucosa gastrica exibindo fossetas revestidas por epitelio cilindrico simples em certos trechos de aspecto regenerativo ao lado de glandulas dilatadas corion frouxo dissociado por edema com pequeno numero de neutrofilos de permeio ao infiltrado linfoplasmocitario difuso os vasos sanguineos mostramse ectasiados congestos pesquisa para helicobacter pylori resultou negativa os cortes de mostram fragmentos de mucosa gastrica apresentando fossetas revestidas por epitelio cilindrico simples com nucleos dispostos no polo basal as glandulas exibem arquitetura preservada observase no corion discreto infiltrado linfocitario difusamente distribuido alem de capilares sanguineos congestos pesquisa para helicobacter pylori resultou negativa nao ha evidencias de malignidade no material analisado histologicamente continua laudo de exame anatomo ou citopatologico resultado de uma analise interpretativa da observacao medica de informacoes clinicas laboratoriais podendo eventualmente apresentar discordancia entre diferentes examinadores havendo divergencias quanto ao resultado emitido quaisquer condutas em relacao ao paciente deverao ser postergadas ate que uma conclusao diagnostica seja encontrada assinaturaeletronica c92469791 r18023816 medico dra gabriela cabral serrano 14054 laboratorio 6841 hap vida recife data de entrada 05122018 anatomopatologico diagnostico polipo hiperplasico gastrite cronica inespecifica laudo de exame anatomo ou citopatologico resultado de uma analise interpretativa da observacao medica de informacoes clinicas laboratoriais podendo eventualmente apresentar discordancia entre diferentes examinadores havendo divergencias quanto ao resultado emitido quaisquer condutas em relacao ao paciente deverao ser postergadas ate que uma conclusao diagnostica seja encontrada assinaturaeletronica</div>
                    </td>
                    <td class="tcenter">
                      <label>
                        <input type="checkbox" class="minimal">
                        <input id="ativo" name="ativo" type="hidden" value="0">
                      </label>
                    </td>
                    <td><textarea rows="3"></textarea></td>
                    <td><button type="button" class="btn" title="Gerar PDF" onclick="print()"><i class="fa fa-download"></i></button></td>
                  </tr>
                  <tr>
                    <td>_64_13418064000159_00000404_000086.TXT.utf8</td>
                    <td>ST</td>
                    <td>NC</td>
                    <td>epitelio</td>
                    <td>
                      <span class="txtRotulo" onmouseover="verLaudo(this)"></span>
                      <div class='txtFull'>numero do exame d276167 tipo de exame biopsia simples data recepcao 03012019 dados clinicos exame macroscopico recebido em formol quatro fragmentos irregulares de tecido pardo aderidos retalho de papel de filtro medindo em conjunto 06x05x02cm seccoes 04 tm 1c exame microscopico biopsia de corpo gastrico as seccoes revelam mucosa gastrica de padrao corpofundo com epitelio de revestimento integro as glandulas sao bem diferenciadas lamina propria apresenta escassos linfocitos muscular da mucosa nao esta representada pesquisa de pylori pela tecnica do giemsa foi negativa biopsia de antro gastrico as seccoes revelam mucosa gastrica de padrao antral com epitelio de revestimento integro as glandulas sao bem diferenciadas lamina propria apresenta escassos linfocitos muscular da mucosa esta representada pesquisa de pylori pela tecnica do giemsa foi negativa conclusao ibiopsia de corpo gastrico mucosa gastrica dentro dos limites histologicos da normalidade pesquisa de pylori negativa iibiopsia de antro gastrico mucosa gastrica dentro dos limites histologicos da normalidade pesquisa de pylori negativa</div>
                    </td>
                    <td class="tcenter">
                      <label>
                        <input type="checkbox" class="minimal">
                        <input id="ativo" name="ativo" type="hidden" value="0">
                      </label>
                    </td>
                    <td><textarea rows="3"></textarea></td>
                    <td><button type="button" class="btn" title="Gerar PDF" onclick="print()"><i class="fa fa-download"></i></button></td>
                  </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Laudo</th>
                  <th>Resultado</th>
                  <th>Severidade</th>
                  <th>Orgão</th>
                  <th>Laudo Filtrado</th>
                  <th>Aprovado</th>
                  <th>Cometário</th>
                  <th>...</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          <!-- </form> -->
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
