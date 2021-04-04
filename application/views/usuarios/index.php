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

		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">

				<!-- Botão -->
				<a title="Cadastrar Novo Usuário" href="<?php echo base_url('usuarios/add'); ?>" class="btn btn-success btn-sm float-right"><i
							class="fas fa-user-plus"></i>&nbsp;Novo</a>

				<!-- Botão -->

			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered dataTable " width="100%" cellspacing="0">
						<thead>
						<tr>
							<th>#</th>
							<th>Usuário</th>
							<th>Login</th>
							<th>Perfil</th>
							<th class="text-center">Ativo</th>
							<th class="text-right no-sort pr-2">Operações</th>
						</tr>
						</thead>

						<tbody>
						<!-- Percorrer um ciclo -->
						<?php foreach ($usuarios as $user): ?>

							<tr>

								<!-- Mostrando informações de cada usuários-->

								<td> <?php echo $user->id ?></td>
								<td> <?php echo $user->username ?></td>
								<td> <?php echo $user->email ?></td>
								<td> <?php echo($this->ion_auth->is_admin($user->id) ? 'Administrador' : 'Vendedor'); ?></td>
								<td class="text-center pr-4"> <?php echo ($user->active == 1 ? '<span class="badge badge-info btn-sm">Sim</span>' : '<span class="badge badge-warning btn-sm">Não</span>') ?></td>

								<!-- Operações -->
								<td class="text-right">
									<a title="Editar" href="<?php echo base_url('usuarios/edit/' . $user->id); ?>"
									   class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i></a>
									<a title="Excluir " href="javascript(void)" data-toggle="modal" data-target="#user-<?php echo $user->id;?>" class="btn btn-sm btn-danger"><i
												class="fas fa-user-times"></i></a>
								</td>

							</tr>

							<!-- Logout Modal-->
							<div class="modal fade" id="user-<?php echo $user->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
								 aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Tem certeza da deleção</h5>
											<button class="close" type="button" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>
										<div class="modal-body">Para excluir o registro clique em <strong>Sim</strong></div>
										<div class="modal-footer">
											<button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Não</button>
											<a class="btn btn-danger btn-sm" href="<?php echo base_url('usuarios/del/' . $user->id) ;?>">Sim</a>
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
