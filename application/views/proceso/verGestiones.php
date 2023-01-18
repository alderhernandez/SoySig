<main class="default-transition" style="opacity: 1;">
<div class="container-fluid">
	<div class="row app-row">
		<div class="col-12 survey-app">
			<div class="mb-2">
				<h1>Developer Survey</h1>
				<div class="text-zero top-right-button-container"><button type="button"
						class="btn btn-lg btn-outline-primary dropdown-toggle dropdown-toggle-split top-right-button top-right-button-single"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ACTIONS</button>
					<div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a> <a
							class="dropdown-item" href="#">Another action</a></div>
				</div>
			</div>
			<ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">
				<li class="nav-item"><a class="nav-link active" id="first-tab" data-toggle="tab" href="#first"
						role="tab" aria-controls="first" aria-selected="true">DETALLE DE GESTION: <?php echo $proceso[0]["Descripcion"]?></a></li>				
			</ul>
			<div class="tab-content mb-4">
				<div class="tab-pane show active" id="first" role="tabpanel" aria-labelledby="first-tab">
					<div class="row">
						<div class="col-lg-4 col-12 mb-4">
							<div class="card mb-4">
								<div class="position-absolute card-top-buttons"><button
										class="btn btn-header-light icon-button"><i
											class="simple-icon-pencil"></i></button></div>
								<div class="card-body">
									<p class="list-item-heading mb-4">Resumen</p>
									<p class="text-muted text-small mb-2">Descripción</p>
									<p class="mb-3"><?php echo $proceso[0]["Descripcion"]?></p>
									<p class="text-muted text-small mb-2">Creado por:</p>
									<p class="mb-3"><?php echo $proceso[0]["Nombres"]?></p>
									<p class="text-muted text-small mb-2">Fecha de Creación</p>
									<p class="mb-3">12.05.2018 - 18.05.2018</p>
									<p class="text-muted text-small mb-2">Labels</p>
									<div>
										<p class="d-sm-inline-block mb-1"><a href="#"><span
													class="badge badge-pill badge-outline-theme-3 mb-1">Proceso</span></a>
										</p>										
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-8">
							<div class="sortable-survey">
                                <?php foreach ($gestiones as $key ) {
                                    echo 
                                } ?>
								<div draggable="false" class="" style="">
									<div class="card question d-flex mb-4 edit-quesiton">
										<div class="d-flex flex-grow-1 min-width-zero">
											<div
												class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
												<div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1"><span
														class="heading-number d-inline-block">1 </span>Age</div>
											</div>
											<div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
												<button class="btn btn-outline-theme-3 icon-button edit-button"><i
														class="simple-icon-pencil"></i></button> <button
													class="btn btn-outline-theme-3 icon-button view-button"><i
														class="simple-icon-eye"></i></button> <button
													class="btn btn-outline-theme-3 icon-button rotate-icon-click collapsed"
													type="button" data-toggle="collapse" data-target="#q1"
													aria-expanded="false" aria-controls="q1"><i
														class="simple-icon-arrow-down with-rotate-icon"></i></button>
											</div>
										</div>
										<div class="question-collapse collapse" id="q1" style="">
											<div class="card-body pt-0">
												<div class="edit-mode">
													<div class="form-group mb-3"><label>Title</label> <input
															class="form-control" type="text" value="Age"></div>
													<div class="form-group mb-5"><label>Question</label> <input
															class="form-control" type="text" value="How old are you?">
													</div>
													<div class="separator mb-4"></div>
													<div class="form-group"><label class="d-block">Answer Type</label>
														<select
															class="form-control select2-single select2-hidden-accessible"
															data-width="100%" tabindex="-1" aria-hidden="true">
															<option label="&nbsp;">&nbsp;</option>
															<option value="0">Text Input</option>
															<option value="1" selected="selected">Single Select</option>
															<option value="2">Multiple Select</option>
															<option value="3">Checkbox</option>
															<option value="4">Radiobutton</option>
														</select><span
															class="select2 select2-container select2-container--bootstrap"
															dir="ltr" style="width: 100%;"><span class="selection"><span
																	class="select2-selection select2-selection--single form-control"
																	role="combobox" aria-haspopup="true"
																	aria-expanded="false" tabindex="0"
																	aria-labelledby="select2-e5i7-container"><span
																		class="select2-selection__rendered"
																		id="select2-e5i7-container"
																		title="Single Select">Single Select</span><span
																		class="select2-selection__arrow"
																		role="presentation"><b
																			role="presentation"></b></span></span></span><span
																class="dropdown-wrapper"
																aria-hidden="true"></span></span></div>
													<div class="form-group"><label class="d-block">Answers</label>
														<div class="answers mb-3 sortable">
															<div class="mb-1 position-relative"><input
																	class="form-control" type="text" value="18-24">
																<div class="input-icons"><span
																		class="badge badge-pill handle pr-0 mr-0"><i
																			class="simple-icon-cursor-move"></i>
																	</span><span class="badge badge-pill"><i
																			class="simple-icon-ban"></i></span></div>
															</div>
															<div class="mb-1 position-relative"><input
																	class="form-control" type="text" value="24-30">
																<div class="input-icons"><span
																		class="badge badge-pill handle pr-0 mr-0"><i
																			class="simple-icon-cursor-move"></i>
																	</span><span class="badge badge-pill"><i
																			class="simple-icon-ban"></i></span></div>
															</div>
															<div class="mb-1 position-relative"><input
																	class="form-control" type="text" value="30-40">
																<div class="input-icons"><span
																		class="badge badge-pill handle pr-0 mr-0"><i
																			class="simple-icon-cursor-move"></i>
																	</span><span class="badge badge-pill"><i
																			class="simple-icon-ban"></i></span></div>
															</div>
															<div class="mb-1 position-relative"><input
																	class="form-control" type="text" value="40-50">
																<div class="input-icons"><span
																		class="badge badge-pill handle pr-0 mr-0"><i
																			class="simple-icon-cursor-move"></i>
																	</span><span class="badge badge-pill"><i
																			class="simple-icon-ban"></i></span></div>
															</div>
															<div class="mb-1 position-relative"><input
																	class="form-control" type="text" value="50+">
																<div class="input-icons"><span
																		class="badge badge-pill handle pr-0 mr-0"><i
																			class="simple-icon-cursor-move"></i>
																	</span><span class="badge badge-pill"><i
																			class="simple-icon-ban"></i></span></div>
															</div>
														</div>
														<div class="text-center"><button type="button"
																class="btn btn-outline-primary btn-sm mb-2"><i
																	class="simple-icon-plus btn-group-icon"></i> Add
																Answer</button></div>
													</div>
												</div>
												<div class="view-mode"><label>How old are you?</label> <select
														class="form-control select2-single select2-hidden-accessible"
														data-width="100%" tabindex="-1" aria-hidden="true">
														<option label="&nbsp;">&nbsp;</option>
														<option value="0">18-24</option>
														<option value="1">24-30</option>
														<option value="2">30-40</option>
														<option value="3">40-50</option>
														<option value="4">50+</option>
													</select><span
														class="select2 select2-container select2-container--bootstrap"
														dir="ltr" style="width: 100%;"><span class="selection"><span
																class="select2-selection select2-selection--single form-control"
																role="combobox" aria-haspopup="true"
																aria-expanded="false" tabindex="0"
																aria-labelledby="select2-prrs-container"><span
																	class="select2-selection__rendered"
																	id="select2-prrs-container"
																	title="&nbsp;">&nbsp;</span><span
																	class="select2-selection__arrow"
																	role="presentation"><b
																		role="presentation"></b></span></span></span><span
															class="dropdown-wrapper" aria-hidden="true"></span></span>
												</div>
											</div>
										</div>
									</div>
								</div>								
							</div>
							<div class="text-center"><button type="button"
									class="btn btn-outline-primary btn-sm mb-2"><i
										class="simple-icon-plus btn-group-icon"></i> Agregar más gestiones</button></div>
						</div>
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>
</main>