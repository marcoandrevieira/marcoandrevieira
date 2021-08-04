<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
    .dataTables_filter {
        text-align: end;
    }

    .dataTables_paginate.paging_bootstrap_number {
        text-align: end;
    }
</style>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo base_url(); ?>">Faturação</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> Faturação dos movimentos a clientes</h3>

<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="row">

    <div class="col-md-12">
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light ">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Faturação</span>
                            </div>
                            <ul class="nav nav-tabs">

                                <li class="active">
                                    <a href="#tab_1_2" data-toggle="tab">Faturação</a>
                                </li>

                            </ul>
                        </div>

                        <div class="portlet-body">
                            <div class="tab-content">

                                <div class="tab-pane active" id="tab_1_2">

                                    <table class="table table-striped table-bordered table-hover order-column" id="table_faturacao">
                                        <thead>
                                            <tr>
                                                <th>Projeto</th>
                                                <th>Cliente</th>
                                                <th>Instalação</th>
                                                <th>PDF Entrega</th>
                                                <th>Armazem Saída</th>
                                                <th>Data</th>
                                                <th>Fechado por</th>
                                                <th>Valor total</th>
                                                <th>Fatura</th>
                                                <th>Valor da Fatura</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="text" class="form-control" id="projeto">
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" id="cliente">
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" id="instalacao">
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" id="pdf_entrega">
                                                </th>
                                                <th>
                                                    <select class="form-control" id="armazem_saida">
                                                        <option selected value="">Todos</option>
                                                        <?php foreach ($armazens as $armz_s) : ?>
                                                            <option value="<?= $armz_s['id_armazem'] ?>"><?= $armz_s['armazem'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </th>
                                                <th>
                                                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                                        <i class="fa fa-calendar"></i>&nbsp;
                                                        <span></span> <i class="fa fa-caret-down"></i>
                                                    </div>
                                                </th>
                                                <th>
                                                    <select class="form-control" id="fechado_por">
                                                        <option selected value="">Todos</option>
                                                        <?php foreach ($utilizadores as $utilizador) : ?>
                                                            <option value="<?= $utilizador['id_utilizador'] ?>"><?= $utilizador['nome'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" id="valor_total">
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" id="fatura">
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" id="valor_fatura">
                                                </th>
                                                <th>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button id="pesquisar_fatura" class="btn btn-outline green-jungle btn-sm"><i class="fa fa-search"></i> Pesquisar</button>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button id="limpar_fatura" class="btn btn-outline red btn-sm"><i class="fa fa-times"></i> Limpar</button>
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>
                                    </table>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>



<div id="nova_fatura" class="modal  fade in" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Nova Fatura</h4>
            </div>
            <div class="modal-body">
                <form action="#" class="form-horizontal" id="form_nova_fatura" method="post" enctype="multipart/form-data">


                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Fatura</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" required name="fatura" id="edita_fatura">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Valor da Fatura</label>
                            <div class="col-md-9">
                                <input class="form-control valor_fatura" required type="text" name="valor_fatura" id="edita_valor_fatura">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Imagem/PDF</label>
                            <div class="col-md-9">
                                <input class="form-control" type="file" name="imagem_fatura" id="edita_imagem_fatura">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-9">
                                <div id="mostrar_fatura"></div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Observações</label>
                            <div class="col-md-9">

                                <textarea class="form-control" name="observacoes" id="edita_observacoes" cols="30" rows="3"></textarea>

                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id_fornecimento" id="id_forncecimento_adicionar_fatura">
            </div>
            <div class="modal-footer">

                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                <button type="submit" class="btn green">Adicionar</button>

                </form>
            </div>
        </div>
    </div>
</div>

<div id="editar_entrada_stock" class="modal  fade in" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Editar Entrada Stock</h4>
            </div>
            <div class="modal-body">
                <form action="#" class="form-horizontal" id="form_editar_entrada_stock" method="post" enctype="multipart/form-data">

                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nº Fatura</label>
                            <div class="col-md-9">
                                <input type="text" id="editar_fatura" name="fatura" class="form-control" placeholder="Nº da fatura" required>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-md-3 control-label">Fornecedor</label>
                            <div class="col-md-9">
                                <div class="input-icon">
                                    <i class="fa fa-shopping-cart"></i>
                                    <input type="text" name="fornecedor" id="editar_fornecedor" placeholder="Fornecedor" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Data </label>
                            <div class="col-md-9">
                                <div class="input-icon">
                                    <i class="fa fa-calendar"></i>
                                    <input type="date" name="data" placeholder="Data fatura" id="editar_data" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Valor Fatura</label>
                            <div class="col-md-9">
                                <input type="text" name="valor" id="editar_valor" class="form-control touchspin_1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Observações</label>
                            <div class="col-md-9">

                                <textarea class="form-control" name="observacoes" id="editar_observacoes_entradas" cols="30" rows="3"></textarea>

                            </div>
                        </div>
                        <input type="hidden" id="entrada_selecionada" name="id_entrada">

                    </div>
                    <div class="modal-footer">

                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                        <button type="submit" class="btn green">Editar</button>

                </form>
            </div>
        </div>
    </div>
</div>