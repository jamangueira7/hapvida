var localDB = null;
var arrTitle = ['Editar/Ver','Apagar'];

function colunaStatus(valor){
	if(valor == 1)
		return '<i class="fa fa-circle text-green"></i> on';
	else if(valor == 0)
		return '<i class="fa fa-circle text-red"></i> off';
	else
		return '-';
}

function colunaTipo(valor){
    if(valor == 1)
        return 'Maligno';
    else if(valor == 2)
        return 'Benigno';
    else
        return '-';
}

function loadConfTable()
{
	$('#lst-table').DataTable({
		"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "Todos"]],
		"language": {
		    "sEmptyTable": "Nenhum registro encontrado",
		    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
		    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
		    "sInfoPostFix": "",
		    "sInfoThousands": ".",
		    "sLengthMenu": "_MENU_ resultados por página",
		    "sLoadingRecords": "Carregando...",
		    "sProcessing": "Processando...",
		    "sZeroRecords": "Nenhum registro encontrado",
		    "sSearch": "Pesquisar",
		    "oPaginate": {
		        "sNext": "Próximo",
		        "sPrevious": "Anterior",
		        "sFirst": "Primeiro",
		        "sLast": "Último"
		    },
		    "oAria": {
		        "sSortAscending": ": Ordenar colunas de forma ascendente",
		        "sSortDescending": ": Ordenar colunas de forma descendente"
		    }
		}
	});
}

function onInit(){
    try {
        if (!window.openDatabase) {
            updateStatus("Erro: Seu navegador não permite banco de dados.");
        }
        else {
            initDB();
            createTables();
            // queryAndUpdateOverview();
        }
    } 
    catch (e) {
        if (e == 2) {
            updateStatus("Erro: Versão de banco de dados inválida.");
        }
        else {
            updateStatus("Erro: Erro desconhecido: " + e + ".");
        }
        return;
    }
}

function initDB(){
    var shortName = 'dbHapVida';
    var version = '1.0';
    var displayName = 'bcoHapVidaDB';
    var maxSize = 65536; // Em bytes
    localDB = window.openDatabase(shortName, version, displayName, maxSize);
}

function createTables(){
    var arrQuery = [];
    arrQuery = [
        [
            's_orgaos',
            'CREATE TABLE IF NOT EXISTS s_orgaos(id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, nome VARCHAR NOT NULL, ativo VARCHAR NOT NULL);'
        ],
        [
            's_busca_zero',
            'CREATE TABLE IF NOT EXISTS s_busca_zero(id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, nome VARCHAR NOT NULL, ativo VARCHAR NOT NULL);'
        ],
        [
            's_busca_negacao',
            'CREATE TABLE IF NOT EXISTS s_busca_negacao(id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, nome VARCHAR NOT NULL, ativo VARCHAR NOT NULL);'
        ],
        [
            's_termo_descritivo',
            'CREATE TABLE IF NOT EXISTS s_termo_descritivo(id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, codigo_doenca VARCHAR NOT NULL, nome VARCHAR NOT NULL, tipo VARCHAR NOT NULL, ativo VARCHAR NOT NULL, s_busca_zero_i_id VARCHAR NOT NULL);'
        ],
        [
            's_severidade',
            'CREATE TABLE IF NOT EXISTS s_severidade(id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, nome VARCHAR NOT NULL, ativo VARCHAR NOT NULL);'
        ],
    ];
    // var query = '';
    var tot_tab = arrQuery.length;
    try {
        localDB.transaction(function(transaction){
            for(i=0;i<tot_tab;i++)
            {
                transaction.executeSql(arrQuery[i][1], [], nullDataHandler, errorHandler);
                updateStatus("Tabela "+arrQuery[i][0]+" status: OK.");
            }
        });
    } 
    catch (e) {
        updateStatus("Erro: Data base 'Tabela' não criada " + e + ".");
        return;
    }
}

// CRUD da APP

/* Orgãos */
function onloadImportar(){

	var arquivoSelecionado = document.querySelector('input[type=file]').files;
	var objFileReader = new FileReader();
	var file = arquivoSelecionado[0];
	objFileReader.readAsText(file); 
	objFileReader.onload = function(e) { 
		// console.log(e.target.result);
		var arrFile = e.target.result.split(';');
		var flag   = false;
		var _ativo = 1;
		
		try {			
	        localDB.transaction(function(transaction){
	        	var query = "insert into s_orgaos (nome, ativo) VALUES (?, ?);";
	        	for(i=0; i < arrFile.length; i++)
	        	{
	        		console.log(i);
					console.log(arrFile[i]);
	        		var _termo = '';
					var _termo = arrFile[i].trim();
					if(_termo != "")
					{
						transaction.executeSql(query, [_termo, _ativo], function(transaction, results){
		                    if (!results.rowsAffected) {
		                        updateStatus("Erro: Inserção não realizada");
		                        flag = true;
		                    }
		                    else {
		                        updateStatus("Inserção realizada, linha id: " + results.insertId);
		                    }
		                }, errorHandler);
					}
	            }
	        });            
	    } 
	    catch (e) {
	        updateStatus("Erro: INSERT não realizado " + e + ".");
	        flag = true;
	    }

	    return (flag) ? true : false;		
	};
}

function onCreateOrgaos(_termos, _ativo){
    var tot  = _termos.length;
    if (_termos == "" || _ativo == "") {
        updateStatus("Erro: 'Termo' e 'Ativo' são campos obrigatórios!");
    }
    else {  
		var flag = false;		
        try {			
            localDB.transaction(function(transaction){
            	var query = "insert into s_orgaos (nome, ativo) VALUES (?, ?);";
            	for(i=0; i < tot; i++)
            	{
            		var _termo = '';
					var _termo = $(_termos[i]).val();
	                transaction.executeSql(query, [_termo, _ativo], function(transaction, results){
	                    if (!results.rowsAffected) {
	                        updateStatus("Erro: Inserção não realizada");
	                        flag = true;
	                    }
	                    else {
	                        updateStatus("Inserção realizada, linha id: " + results.insertId);
	                    }
	                }, errorHandler);
	            }
            });            
        } 
        catch (e) {
            updateStatus("Erro: INSERT não realizado " + e + ".");
            flag = true;
        }

        return (!flag) ? true : false;
    }
}

function onEditOrgaos(_termos, _ativo, _id){
	initDB();

    var tot  = _termos.length;
    if (_termos == "" || _ativo == "") {
        updateStatus("Erro: 'Termo' e 'Ativo' são campos obrigatórios!");
    }
    else {  
		var flag = false;		
        try {			
            localDB.transaction(function(transaction){
            	var query = "update s_orgaos set nome=?, ativo=? where id=?;";
            	for(i=0; i < tot; i++)
            	{
            		var _termo = '';
					var _termo = $(_termos[i]).val();
	                transaction.executeSql(query, [_termo, _ativo, _id], function(transaction, results){
	                    if (!results.rowsAffected) {
	                        updateStatus("Erro: Edição não realizada");
	                        flag = true;
	                    }
	                    else {
	                        updateStatus("Edição realizada, linha id: " + results.rowsAffected);
	                    }
	                }, errorHandler);
	            }
            });            
        } 
        catch (e) {
            updateStatus("Erro: INSERT não realizado " + e + ".");
            flag = true;
        }

        return (!flag) ? true : false;
    }
}

function onViewOrgaos(id){
	initDB();
    query = "SELECT * FROM s_orgaos WHERE id=?;";
    try {
        localDB.transaction(function(transaction){
            transaction.executeSql(query, [id], function(transaction, results){
                for (var i = 0; i < results.rows.length; i++) {
                	var row = results.rows.item(i);

                    $('input[name="termos[]"]').val(row['nome']);
                    $('input[name="ativo"]').val(row['ativo']);
                    
                    if(row['ativo'] == 1)
                    	$("input[type='checkbox']").iCheck('check');
                    
                }
            }, function(transaction, error){
                updateStatus("Erro: " + error.code + "<br>Mensagem: " + error.message);
            });
        });
    } 
    catch (e) {
        updateStatus("Error: SELECT não realizado " + e + ".");
    }
}

function onDeleteOrgaos(id){
	initDB();
    var query = "DELETE FROM s_orgaos where id=?;";
    try {
        localDB.transaction(function(transaction){
        
            transaction.executeSql(query, [id], function(transaction, results){
                if (!results.rowsAffected) {
                    updateStatus("Erro: Delete não realizado.");
                }
                else {
                	$("#ln_"+id).remove();
                    updateStatus("Linhas deletadas:" + results.rowsAffected);
                    location.reload(true);
                }
            }, errorHandler);
        });
    } 
    catch (e) {
        updateStatus("Erro: DELETE não realizado " + e + ".");
    } 
}

function onListOrgaos(){
    initDB();
    var query = "SELECT * FROM s_orgaos;";
    try {
        localDB.transaction(function(transaction){
            transaction.executeSql(query, [], function(transaction, results){
            	if(results.rows.length == 0)
            	{
            		$("#lst-table tbody").append("<tr><td>Não há dados para exibição</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>");
            	}
                for (var i = 0; i < results.rows.length; i++) {
                
                    var row = results.rows.item(i);
                    $("#lst-table tbody").append("<tr id=ln_"+row['id']+"><td>"+row['id']+"</td><td>"+row['nome']+"</td><td>"+colunaStatus(row['ativo'])+"</td><td><a class='opc' href='edit_orgaos.html?"+row['id']+"' title="+arrTitle[0]+"><i class='fa fa-edit'></i></a><a class='opc' href='#' onclick='onDeleteOrgaos("+row['id']+")' title="+arrTitle[1]+"><i class='fa fa-trash-o'></i></a></td></tr>");
                }
                loadConfTable();
            }, function(transaction, error){
                updateStatus("Erro: " + error.code + "<br>Mensagem: " + error.message);
            });
        });
    } 
    catch (e) {
        updateStatus("Error: SELECT não realizado " + e + ".");
    }
}
/* Busca Zero */
function onloadImportarBuscaZero(){

    var arquivoSelecionado = document.querySelector('input[type=file]').files;
    var objFileReader = new FileReader();
    var file = arquivoSelecionado[0];
    objFileReader.readAsText(file); 
    objFileReader.onload = function(e) { 
        // console.log(e.target.result);
        var arrFile = e.target.result.split(';');
        var flag   = false;
        var _ativo = 1;
        
        try {           
            localDB.transaction(function(transaction){
                var query = "insert into s_busca_zero (nome, ativo) VALUES (?, ?);";
                for(i=0; i < arrFile.length; i++)
                {
                    console.log(i);
                    console.log(arrFile[i]);
                    var _termo = '';
                    var _termo = arrFile[i].trim();
                    if(_termo != "")
                    {
                        transaction.executeSql(query, [_termo, _ativo], function(transaction, results){
                            if (!results.rowsAffected) {
                                updateStatus("Erro: Inserção não realizada");
                                flag = true;
                            }
                            else {
                                updateStatus("Inserção realizada, linha id: " + results.insertId);
                            }
                        }, errorHandler);
                    }
                }
            });            
        } 
        catch (e) {
            updateStatus("Erro: INSERT não realizado " + e + ".");
            flag = true;
        }

        return (flag) ? true : false;       
    };
}

function onCreateBuscaZero(_termos, _ativo){
    var tot  = _termos.length;
    if (_termos == "" || _ativo == "") {
        updateStatus("Erro: 'Termo' e 'Ativo' são campos obrigatórios!");
    }
    else {  
        var flag = false;       
        try {           
            localDB.transaction(function(transaction){
                var query = "insert into s_busca_zero (nome, ativo) VALUES (?, ?);";
                for(i=0; i < tot; i++)
                {
                    var _termo = '';
                    var _termo = $(_termos[i]).val();
                    transaction.executeSql(query, [_termo, _ativo], function(transaction, results){
                        if (!results.rowsAffected) {
                            updateStatus("Erro: Inserção não realizada");
                            flag = true;
                        }
                        else {
                            updateStatus("Inserção realizada, linha id: " + results.insertId);
                        }
                    }, errorHandler);
                }
            });            
        } 
        catch (e) {
            updateStatus("Erro: INSERT não realizado " + e + ".");
            flag = true;
        }

        return (!flag) ? true : false;
    }
}

function onEditBuscaZero(_termos, _ativo, _id){
    initDB();

    var tot  = _termos.length;
    if (_termos == "" || _ativo == "") {
        updateStatus("Erro: 'Termo' e 'Ativo' são campos obrigatórios!");
    }
    else {  
        var flag = false;       
        try {           
            localDB.transaction(function(transaction){
                var query = "update s_busca_zero set nome=?, ativo=? where id=?;";
                for(i=0; i < tot; i++)
                {
                    var _termo = '';
                    var _termo = $(_termos[i]).val();
                    transaction.executeSql(query, [_termo, _ativo, _id], function(transaction, results){
                        if (!results.rowsAffected) {
                            updateStatus("Erro: Edição não realizada");
                            flag = true;
                        }
                        else {
                            updateStatus("Edição realizada, linha id: " + results.rowsAffected);
                        }
                    }, errorHandler);
                }
            });            
        } 
        catch (e) {
            updateStatus("Erro: INSERT não realizado " + e + ".");
            flag = true;
        }

        return (!flag) ? true : false;
    }
}

function onViewBuscaZero(id){
    initDB();
    query = "SELECT * FROM s_busca_zero WHERE id=?;";
    try {
        localDB.transaction(function(transaction){
            transaction.executeSql(query, [id], function(transaction, results){
                for (var i = 0; i < results.rows.length; i++) {
                    var row = results.rows.item(i);

                    $('input[name="termos[]"]').val(row['nome']);
                    $('input[name="ativo"]').val(row['ativo']);
                    
                    if(row['ativo'] == 1)
                        $("input[type='checkbox']").iCheck('check');
                    
                }
            }, function(transaction, error){
                updateStatus("Erro: " + error.code + "<br>Mensagem: " + error.message);
            });
        });
    } 
    catch (e) {
        updateStatus("Error: SELECT não realizado " + e + ".");
    }
}

function onDeleteBuscaZero(id){
    initDB();
    var query = "DELETE FROM s_busca_zero where id=?;";
    try {
        localDB.transaction(function(transaction){
        
            transaction.executeSql(query, [id], function(transaction, results){
                if (!results.rowsAffected) {
                    updateStatus("Erro: Delete não realizado.");
                }
                else {
                    $("#ln_"+id).remove();
                    updateStatus("Linhas deletadas:" + results.rowsAffected);
                    location.reload(true);
                }
            }, errorHandler);
        });
    } 
    catch (e) {
        updateStatus("Erro: DELETE não realizado " + e + ".");
    } 
}

function onListBuscaZero(){
    initDB();
    var query = "SELECT * FROM s_busca_zero;";
    try {
        localDB.transaction(function(transaction){
            transaction.executeSql(query, [], function(transaction, results){
                if(results.rows.length == 0)
                {
                    $("#lst-table tbody").append("<tr><td>Não há dados para exibição</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>");
                }
                for (var i = 0; i < results.rows.length; i++) {
                
                    var row = results.rows.item(i);
                    $("#lst-table tbody").append("<tr id=ln_"+row['id']+"><td>"+row['id']+"</td><td>"+row['nome']+"</td><td>"+colunaStatus(row['ativo'])+"</td><td><a class='opc' href='edit_busca_zero.html?"+row['id']+"' title="+arrTitle[0]+"><i class='fa fa-edit'></i></a><a class='opc' href='#' onclick='onDeleteBuscaZero("+row['id']+")' title="+arrTitle[1]+"><i class='fa fa-trash-o'></i></a></td></tr>");
                }
                loadConfTable();
            }, function(transaction, error){
                updateStatus("Erro: " + error.code + "<br>Mensagem: " + error.message);
            });
        });
    } 
    catch (e) {
        updateStatus("Error: SELECT não realizado " + e + ".");
    }
}

/* Busca Negação */
function onloadImportarBuscaNegacao(){

    var arquivoSelecionado = document.querySelector('input[type=file]').files;
    var objFileReader = new FileReader();
    var file = arquivoSelecionado[0];
    objFileReader.readAsText(file); 
    objFileReader.onload = function(e) { 
        // console.log(e.target.result);
        var arrFile = e.target.result.split(';');
        var flag   = false;
        var _ativo = 1;
        
        try {           
            localDB.transaction(function(transaction){
                var query = "insert into s_busca_negacao (nome, ativo) VALUES (?, ?);";
                for(i=0; i < arrFile.length; i++)
                {
                    console.log(i);
                    console.log(arrFile[i]);
                    var _termo = '';
                    var _termo = arrFile[i].trim();
                    if(_termo != "")
                    {
                        transaction.executeSql(query, [_termo, _ativo], function(transaction, results){
                            if (!results.rowsAffected) {
                                updateStatus("Erro: Inserção não realizada");
                                flag = true;
                            }
                            else {
                                updateStatus("Inserção realizada, linha id: " + results.insertId);
                            }
                        }, errorHandler);
                    }
                }
            });            
        } 
        catch (e) {
            updateStatus("Erro: INSERT não realizado " + e + ".");
            flag = true;
        }

        return (flag) ? true : false;       
    };
}

function onCreateBuscaNegacao(_termos, _ativo){
    var tot  = _termos.length;
    if (_termos == "" || _ativo == "") {
        updateStatus("Erro: 'Termo' e 'Ativo' são campos obrigatórios!");
    }
    else {  
        var flag = false;       
        try {           
            localDB.transaction(function(transaction){
                var query = "insert into s_busca_negacao (nome, ativo) VALUES (?, ?);";
                for(i=0; i < tot; i++)
                {
                    var _termo = '';
                    var _termo = $(_termos[i]).val();
                    transaction.executeSql(query, [_termo, _ativo], function(transaction, results){
                        if (!results.rowsAffected) {
                            updateStatus("Erro: Inserção não realizada");
                            flag = true;
                        }
                        else {
                            updateStatus("Inserção realizada, linha id: " + results.insertId);
                        }
                    }, errorHandler);
                }
            });            
        } 
        catch (e) {
            updateStatus("Erro: INSERT não realizado " + e + ".");
            flag = true;
        }

        return (!flag) ? true : false;
    }
}

function onEditBuscaNegacao(_termos, _ativo, _id){
    initDB();

    var tot  = _termos.length;
    if (_termos == "" || _ativo == "") {
        updateStatus("Erro: 'Termo' e 'Ativo' são campos obrigatórios!");
    }
    else {  
        var flag = false;       
        try {           
            localDB.transaction(function(transaction){
                var query = "update s_busca_negacao set nome=?, ativo=? where id=?;";
                for(i=0; i < tot; i++)
                {
                    var _termo = '';
                    var _termo = $(_termos[i]).val();
                    transaction.executeSql(query, [_termo, _ativo, _id], function(transaction, results){
                        if (!results.rowsAffected) {
                            updateStatus("Erro: Edição não realizada");
                            flag = true;
                        }
                        else {
                            updateStatus("Edição realizada, linha id: " + results.rowsAffected);
                        }
                    }, errorHandler);
                }
            });            
        } 
        catch (e) {
            updateStatus("Erro: INSERT não realizado " + e + ".");
            flag = true;
        }

        return (!flag) ? true : false;
    }
}

function onViewBuscaNegacao(id){
    initDB();
    query = "SELECT * FROM s_busca_negacao WHERE id=?;";
    try {
        localDB.transaction(function(transaction){
            transaction.executeSql(query, [id], function(transaction, results){
                for (var i = 0; i < results.rows.length; i++) {
                    var row = results.rows.item(i);

                    $('textarea[name="termos[]"]').val(row['nome']);
                    $('input[name="ativo"]').val(row['ativo']);
                    
                    if(row['ativo'] == 1)
                        $("input[type='checkbox']").iCheck('check');
                    
                }
            }, function(transaction, error){
                updateStatus("Erro: " + error.code + "<br>Mensagem: " + error.message);
            });
        });
    } 
    catch (e) {
        updateStatus("Error: SELECT não realizado " + e + ".");
    }
}

function onDeleteBuscaNegacao(id){
    initDB();
    var query = "DELETE FROM s_busca_negacao where id=?;";
    try {
        localDB.transaction(function(transaction){
        
            transaction.executeSql(query, [id], function(transaction, results){
                if (!results.rowsAffected) {
                    updateStatus("Erro: Delete não realizado.");
                }
                else {
                    $("#ln_"+id).remove();
                    updateStatus("Linhas deletadas:" + results.rowsAffected);
                    location.reload(true);
                }
            }, errorHandler);
        });
    } 
    catch (e) {
        updateStatus("Erro: DELETE não realizado " + e + ".");
    } 
}

function onListBuscaNegacao(){
    initDB();
    var query = "SELECT * FROM s_busca_negacao;";
    try {
        localDB.transaction(function(transaction){
            transaction.executeSql(query, [], function(transaction, results){
                if(results.rows.length == 0)
                {
                    $("#lst-table tbody").append("<tr><td>Não há dados para exibição</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>");
                }
                for (var i = 0; i < results.rows.length; i++) {
                
                    var row = results.rows.item(i);
                    $("#lst-table tbody").append("<tr id=ln_"+row['id']+"><td>"+row['id']+"</td><td>"+row['nome']+"</td><td>"+colunaStatus(row['ativo'])+"</td><td><a class='opc' href='edit_busca_negacao.html?"+row['id']+"' title="+arrTitle[0]+"><i class='fa fa-edit'></i></a><a class='opc' href='#' onclick='onDeleteBuscaNegacao("+row['id']+")' title="+arrTitle[1]+"><i class='fa fa-trash-o'></i></a></td></tr>");
                }
                loadConfTable();
            }, function(transaction, error){
                updateStatus("Erro: " + error.code + "<br>Mensagem: " + error.message);
            });
        });
    } 
    catch (e) {
        updateStatus("Error: SELECT não realizado " + e + ".");
    }
}

/* Termo Descritivo */
function onloadImportarTermoDescritivo(){

    var arquivoSelecionado = document.querySelector('input[type=file]').files;
    var objFileReader = new FileReader();
    var file = arquivoSelecionado[0];
    objFileReader.readAsText(file); 
    objFileReader.onload = function(e) { 
        // console.log(e.target.result);
        var arrFile = e.target.result.split(';');
        var flag   = false;
        var _ativo = 1;
        
        try {           
            localDB.transaction(function(transaction){
                var query = "insert into s_termo_descritivo (nome, ativo) VALUES (?, ?);";
                for(i=0; i < arrFile.length; i++)
                {
                    console.log(i);
                    console.log(arrFile[i]);
                    var _termo = '';
                    var _termo = arrFile[i].trim();
                    if(_termo != "")
                    {
                        transaction.executeSql(query, [_termo, _ativo], function(transaction, results){
                            if (!results.rowsAffected) {
                                updateStatus("Erro: Inserção não realizada");
                                flag = true;
                            }
                            else {
                                updateStatus("Inserção realizada, linha id: " + results.insertId);
                            }
                        }, errorHandler);
                    }
                }
            });            
        } 
        catch (e) {
            updateStatus("Erro: INSERT não realizado " + e + ".");
            flag = true;
        }

        return (flag) ? true : false;       
    };
}

function onCreateTermoDescritivo(_arrDados){
    
    if (_arrDados['descricao'] == "" || _arrDados['palavrachave'] == "") {
        updateStatus("Erro: 'Descrição do termo', 'Palavra Chave' são campos obrigatórios!");
    } 
    else {  
        var flag = false;       
        try {           
            localDB.transaction(function(transaction){

                // Inserindo palavra chave
                var _query = "select id, nome from s_busca_zero where nome = ?;";
                var palavra = _arrDados['palavrachave'];
                palavra = palavra.trim();

                var id_palavra = '';

                transaction.executeSql(_query, [palavra], function(_transaction, _results){

                    if(_results.rows.length == 0)
                    {
                        var __query = "insert into s_busca_zero (nome, ativo) VALUES (?, ?);";
                        _transaction.executeSql(__query, [palavra, '1'], function(__transaction, __results){
                            if (!__results.rowsAffected) {
                                updateStatus("Erro: Inserção palavra chave não realizada");
                            }
                            else {
                                updateStatus("Inserção palavra chave realizada, linha id: " + __results.insertId);
                                id_palavra = __results.insertId;
                                onInsertTermoDescritivo(__transaction, __results, _arrDados, id_palavra);
                            }
                        }, errorHandler);
                    }
                    else
                    {
                        id_palavra = ''+_results.rows[0]['id']+'';
                        onInsertTermoDescritivo(_transaction, _results, _arrDados, id_palavra);
                    }
                }, function(transaction, error){
                    updateStatus("Erro: " + error.code + "<br>Mensagem: " + error.message);
                });
            });  
        } 
        catch (e) {
            updateStatus("Erro: INSERT não realizado " + e + ".");
            flag = true;
        }

        return (!flag) ? true : false;
    }
}

function onInsertTermoDescritivo(_transaction, _results, _arrDados, id_palavra)
{
    flag_ = true;
    id_palavra = ''+id_palavra+'';
    var query = "insert into s_termo_descritivo (codigo_doenca, nome, tipo, ativo, s_busca_zero_i_id) VALUES (?, ?, ?, ?, ?);";

    _transaction.executeSql(query, [_arrDados['codigodoenca'], _arrDados['descricao'], _arrDados['tipo'], _arrDados['ativo'], id_palavra ], function(transaction, results){
        if (!results.rowsAffected) {
            updateStatus("Erro: Inserção não realizada");
            flag_ = false;
        }
        else {
            updateStatus("Inserção realizada, linha id: " + results.insertId);
        }
    }, errorHandler);

    return (flag_) ? true : false;
}


function onEditTermoDescritivo(_cod_doenca, _termos, _palavra, _tipo, _ativo, _palavra_id, _id){
    initDB();

    // tratando os dados para caixa baixa
    _palavra = _palavra.toLowerCase();

    if (_termos == "" || _palavra == "" || _ativo == "") {
        updateStatus("Erro: 'Descrição do termo', 'Palavra Chave' são campos obrigatórios!");
    }
    else {  
        var flag = false;       
        try {           
            localDB.transaction(function(transaction){
                var query = "update s_termo_descritivo set codigo_doenca=?, nome=?, tipo=?, ativo=?, s_busca_zero_i_id=? where id=?;"; 
                
                transaction.executeSql(query, [_cod_doenca, _termos, _tipo, _ativo, _palavra_id, _id], function(_transaction, _results){
                    if (!_results.rowsAffected) {
                        updateStatus("Erro: Edição não realizada");
                        flag = true;
                    }
                    else {
                        var _query = "select id, nome from s_busca_zero where nome=?;";

                        _transaction.executeSql(_query, [_palavra], function(__transaction, __results){
                            if(__results.rows.length == 0){
                                console.log('não');
                                
                                // Inserir termo de busca
                                localDB.transaction(function(__transaction){
                                    var query_ = "insert into s_busca_zero (nome, ativo) VALUES (?, ?);";
                                    
                                    __transaction.executeSql(query_, [_palavra, '1'], function(transaction_, results_){
                                        if (!results_.rowsAffected) {
                                            updateStatus("Erro: Inserção não realizada");
                                            flag = true;
                                        }
                                        else {
                                            // Atualizar o termo descritivo
                                            // updateStatus("Inserção realizada, linha id: " + results_.insertId);
                                            var query__ = "update s_termo_descritivo set s_busca_zero_i_id=? where id=?;";

                                            transaction_.executeSql(query__, [results_.insertId, _id], function(transaction__, results__){
                                                if (!results__.rowsAffected) {
                                                    updateStatus("Erro: Inserção não realizada");
                                                    flag = true;
                                                } else {
                                                    updateStatus("Atulização realizada, linha id: " + _id);
                                                }
                                            }, errorHandler);
                                        }
                                    }, errorHandler);
                                });
                            }
                            else {
                                // Pegar o ID
                                id_ant = __results.rows[0]['id'];
                                // Atualizar o termo descritivo
                                var query___ = "update s_termo_descritivo set s_busca_zero_i_id=? where id=?;";
                                __transaction.executeSql(query___, [id_ant, _id], function(___transaction, ___results){
                                    if (!___results.rowsAffected) {
                                        updateStatus("Erro: Edição não realizada");
                                        flag = true;
                                    } 
                                    else 
                                    {
                                        updateStatus("Edição realizada, linha id: " + ___results.rowsAffected);
                                    }
                                });
                            }
                        }, errorHandler);
                    }
                }, errorHandler);
            });            
        } 
        catch (e) {
            updateStatus("Erro: UPDATE não realizado " + e + ".");
            flag = true;
        }

        return (!flag) ? true : false;
    }
}

function onViewTermoDescritivo(id){
    initDB();
    query = "SELECT t.id, t.codigo_doenca, t.nome, t.tipo, t.ativo, t.s_busca_zero_i_id, b.id as bid, b.nome as bnome FROM s_termo_descritivo t INNER JOIN s_busca_zero b ON (b.id = t.s_busca_zero_i_id) WHERE t.id=?;";
    try {
        localDB.transaction(function(transaction){
            transaction.executeSql(query, [id], function(transaction, results){
                for (var i = 0; i < results.rows.length; i++) {
                    var row = results.rows.item(i);

                    $('input[name="codigodoenca"]').val(row['codigo_doenca']);
                    $('textarea[name="termos[]"]').val(row['nome']);
                    $('input[name="palavrachave"]').val(row['bnome']);
                    $('input[name="palavrachave"]').attr('ref',row['bid']);
                    $('input[id="tipo"]').val(row['tipo']);
                    $('input[name="ativo"]').val(row['ativo']);

                    
                    if(row['ativo'] == 1)
                        $("input[type='checkbox']").iCheck('check');

                    if(row['tipo'] == 2)
                        $("input[ref='tipo_off']").parent().click();
                    
                }
            }, function(transaction, error){
                updateStatus("Erro: " + error.code + "<br>Mensagem: " + error.message);
            });
        });
    } 
    catch (e) {
        updateStatus("Error: SELECT não realizado " + e + ".");
    }
}

function onDeleteTermoDescritivo(id){
    initDB();
    var query = "DELETE FROM s_termo_descritivo where id=?;";
    try {
        localDB.transaction(function(transaction){
        
            transaction.executeSql(query, [id], function(transaction, results){
                if (!results.rowsAffected) {
                    updateStatus("Erro: Delete não realizado.");
                }
                else {
                    $("#ln_"+id).remove();
                    updateStatus("Linhas deletadas:" + results.rowsAffected);
                    location.reload(true);
                }
            }, errorHandler);
        });
    } 
    catch (e) {
        updateStatus("Erro: DELETE não realizado " + e + ".");
    } 
}

function onListTermoDescritivo(){
    initDB();
    var query = "SELECT * FROM s_termo_descritivo;";
    try {
        localDB.transaction(function(transaction){
            transaction.executeSql(query, [], function(transaction, results){
                if(results.rows.length == 0)
                {
                    $("#lst-table tbody").append("<tr><td>Não há dados para exibição</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>");
                }
                for (var i = 0; i < results.rows.length; i++) {
                
                    var row = results.rows.item(i);
                    $("#lst-table tbody").append("<tr id=ln_"+row['id']+"><td>"+row['id']+"</td><td>"+row['codigo_doenca']+"</td><td>"+row['nome']+"</td><td>"+colunaTipo(row['tipo'])+"</td><td>"+colunaStatus(row['ativo'])+"</td><td><a class='opc' href='edit_termo_descritivo.html?"+row['id']+"' title="+arrTitle[0]+"><i class='fa fa-edit'></i></a><a class='opc' href='#' onclick='onDeleteTermoDescritivo("+row['id']+")' title="+arrTitle[1]+"><i class='fa fa-trash-o'></i></a></td></tr>");
                }
                loadConfTable();
            }, function(transaction, error){
                updateStatus("Erro: " + error.code + "<br>Mensagem: " + error.message);
            });
        });
    } 
    catch (e) {
        updateStatus("Error: SELECT não realizado " + e + ".");
    }
}

function onViewSeveridade(){
    initDB();
    query = "SELECT * FROM s_orgaos WHERE ativo=1 OR ativo=1.0;";
    try {
        localDB.transaction(function(transaction){
            transaction.executeSql(query, [], function(transaction, results){
                for (var i = 0; i < results.rows.length; i++) {
                    var row = results.rows.item(i);

                    var txtOrgao = (row.id == 1) ? 'Termo' : '';
                    var tag = '';
                    tag += '<div class="form-group row" ref="'+row.id+'">';
                        tag += '<label class="col-sm-2 col-form-label">'+txtOrgao+'</label>';
                        tag += '<div class="col-sm-6">';
                            tag += '<span>'+row.nome+'</span>';
                        tag += '</div>';
                        tag += '<div class="col-sm-1">';
                            tag += '<label>';
                                tag += '<input type="checkbox" class="minimal">';
                                tag += '<input name="orgaositensativo[]" type="hidden" value="0">';
                            tag += '</label>';
                        tag += '</div>';
                        tag += '<div class="col-sm-1">';
                            tag += '<label class="col-sm-1 col-form-label">Nota</label>';
                        tag += '</div>';
                        tag += '<div class="col-sm-2">';
                            tag += '<input name=notasitens[] type="number" min=0 max=100 class="form-control" placeholder="">';
                        tag += '</div>';
                    tag += '</div>';
                    $('.listaseveridade').append(tag);
                    
                    /*
                    $('input[name="termos[]"]').val(row['nome']);
                    $('input[name="ativo"]').val(row['ativo']);
                    
                    if(row['ativo'] == 1)
                        $("input[type='checkbox']").iCheck('check');
                    */                    
                }

                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass   : 'iradio_minimal-blue'
                });
            }, function(transaction, error){
                updateStatus("Erro: " + error.code + "<br>Mensagem: " + error.message);
            });
        });
    } 
    catch (e) {
        updateStatus("Error: SELECT não realizado " + e + ".");
    }
}

// Tratando erros
errorHandler = function(transaction, error){
    updateStatus("Erro: " + error.message);
    return true;
}

nullDataHandler = function(transaction, results){
}

function updateStatus(status){
    console.log(status);
}