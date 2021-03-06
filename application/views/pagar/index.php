<!-- header  -->

<!-- Fim header  -->

<!-- Sidebar -->
<?php
$this->load->view('layout/sidebar');
?>
<!-- Fim, Sidebar -->


<!-- Main Content -->
<div id="content">

	<!-- Topbar -->
	<?php
	$this->load->view('layout/navbar');
	?>
	<!-- Fim, Topbar -->


	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- *** Tabela de usuário - MENUS BREADCRUMB -->

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">

				<!-- **** Permite voltar para página Home -->
				<li class="breadcrumb-item"><a href="<?php echo base_url('/'); ?>">Home</a></li>

				<!-- **** Título -->
				<li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
			</ol>
		</nav>

<!--		--><?php //echo date('Y-m-d H:i:s'); ?>

		<!-- Fim, Tabela de usuário - MENUS BREADCRUMB -->

		<!-- Printar mensagem de sucesso -->
		<?php if ($message = $this->session->flashdata('sucesso')): ?>

			<!-- Div para limitar uma determinada linha -->
			<div class="row">

				<!-- Div para preencher a informação em toda tela -->
				<div class="col-md-12">

					<!-- Alert -->
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong><i class="far fa-smile-wink"></i>&nbsp;&nbsp;<?php echo $message ?></strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

				</div>

			</div>

		<?php endif; ?>
		<!-- Fim, Printar mensagem de sucesso-->


		<!-- Printar mensagem de erro -->
		<?php if ($message = $this->session->flashdata('error')): ?>

			<!-- Div para limitar uma determinada linha -->
			<div class="row">

				<!-- Div para preencher a informação em toda tela -->
				<div class="col-md-12">

					<!-- Alert -->
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?php echo $message ?></strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

				</div>

			</div>

		<?php endif; ?>

		<!-- Fim, Printar mensagem de erro -->

		<!-- Printar mensagem de informação -->
		<?php if ($message = $this->session->flashdata('info')): ?>

		<!-- Div para limitar uma determinada linha -->
		<div class="row">

			<!-- Div para preencher a informação em toda tela -->
			<div class="col-md-12">

				<!-- Alert -->
				<div class="alert alert-warning alert-dismissible fade show text-gray-900" role="alert">
					<strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?php echo $message ?></strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

			</div>

		</div>

		<?php endif; ?>

		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">

				<!-- Botão -->
				<a title="Cadastrar nova conta" href="<?php echo base_url('pagar/add'); ?>"
				   class="btn btn-success btn-sm float-right"><i
							class="fas fa-plus"></i>&nbsp;Nova</a>

				<!-- Botão -->
				<!--==========================================================================================================-->
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered dataTable " width="100%" cellspacing="0">
						<thead>
						<tr>
							<th>#</th>
							<th>Fornecedor</th>
							<th>Valor da conta</th>
							<th>Data de vencimento</th>
							<th>Data de pagamento</th>
							<th class="text-center">Situação</th>
							<th class="text-right no-sort pr-2">Operações</th>
						</tr>
						</thead>

						<tbody>
						<!-- Percorrer um ciclo -->
						<?php foreach ($contas_pagar as $conta): ?>

							<tr>

								<!-- Mostrando informações de cada usuários-->

								<td> <?php echo $conta->conta_pagar_id; ?></td>
								<td> <?php echo $conta->fornecedor; ?></td>
								<td> <?php echo 'AKZ&nbsp;' . $conta->conta_pagar_valor; ?></td>
								<td> <?php echo formata_data_banco_sem_hora($conta->conta_pagar_data_vencimento); ?></td>
								<td> <?php echo($conta->conta_pagar_status == 1 ? formata_data_banco_com_hora($conta->conta_pagar_data_pagamento) : 'Aguardando pagamento'); ?></td>

								<td class="text-center pr-4">

									<?php

									if ($conta->conta_pagar_status == 1) {
										echo '<span class="badge badge-success btn-sm">Paga</span>';
									} else if (strtotime($conta->conta_pagar_data_vencimento) > strtotime(date('y-m-d'))) {
										echo '<span class="badge badge-secondary btn-sm">A pagar</span>';
									} else if (strtotime($conta->conta_pagar_data_vencimento) == strtotime(date('y-m-d'))) {
										echo '<span class="badge badge-warning btn-sm">Vence hoje</span>';
									} else {
										echo '<span class="badge badge-danger btn-sm">Vencida</span>';
									}
									?>


								</td>

								<!--***********************************************************************************************************************************-->
								<!-- Operações -->
								<td class="text-right">
									<a title="Editar"
									   href="<?php echo base_url('pagar/edit/' . $conta->conta_pagar_id); ?>"
									   class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
									<a title="Excluir " href="javascript(void)" data-toggle="modal"
									   data-target="#conta-<?php echo $conta->conta_pagar_id; ?>"
									   class="btn btn-sm btn-danger"><i
												class="fas fa-trash"></i></a>
								</td>

							</tr>

							<!-- Logout Modal-->
							<div class="modal fade" id="conta-<?php echo $conta->conta_pagar_id; ?>" tabindex="-1"
								 role="dialog" aria-labelledby="exampleModalLabel"
								 aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Tem certeza da deleção</h5>
											<button class="close" type="button" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>
										<div class="modal-body">Para excluir o registro clique em <strong>Sim</strong>
										</div>
										<div class="modal-footer">
											<button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">
												Não
											</button>
											<a class="btn btn-danger btn-sm"
											   href="<?php echo base_url('pagar/del/' . $conta->conta_pagar_id); ?>">Sim</a>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>


						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>

	<!-- Fim, tabela de usuário -->

</div>
<!-- /.container-fluid -->
