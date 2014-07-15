<?php $this->load->view('home/header_home'); ?>


            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Home
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content"> 
                    
                    <!-- Announcement -->
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Calendar Box/Container -->
                            <div class="box box-primary">                                
                                <div class="box-body no-padding">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div><!-- /.box-body -->
                            </div><!-- /. box -->
                            <!-- End Calendar Box/Container -->
                        </div><!-- /.col -->
                        <div class="col-md-4">
                            <!-- TO DO List -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="ion ion-clipboard"></i>
                                    <h3 class="box-title">Announcements</h3>
                                    <div class="box-tools pull-right">
                                        <ul class="pagination pagination-sm inline">
                                            <li><a href="#">&laquo;</a></li>
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">&raquo;</a></li>
                                        </ul>
                                    </div>
                                </div><!-- /.box-header -->
								<?php
									/*
									Branch: JEFFREY-announcements_table_db_change_07/11/2014
									Changes in:  div    
									*/
									?>
                                <div class="box-body">
                                    <ul class="announcement-list">
                                        <?php if($announcement):?>
											<?php foreach($announcement as $ann => $values):?>
												<li>
													<a class="text announcement_list" href="" data-toggle="modal" data-id="<?php echo $announcement[$ann]['announcement_id'];?>" data-target="#announcement-item-modal">
														<?php print $announcement[$ann]['announcement_title'];?>
													</a>
													<?php print $announcement[$ann]['announcement_duration'];?>
												</li>
											<?php endforeach ?>
										<?php else:?>
											<li>No New Announcement</li>
										<?php endif?>
                                    </ul>
                                </div><!-- /.box-body -->
                                <div class="box-footer clearfix no-border">
                                    <button class="btn btn-default pull-right" data-toggle="modal" data-target="#announcement-modal">
                                      <i class="fa fa-plus"></i> Add Announcement
                                    </button>
                                </div>
                            </div><!-- /.box -->
                            <!-- End Announcement -->
                        </div>
                    </div><!-- /.row -->  
                    

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
            
        </div><!-- ./wrapper -->
        
		<script>
			var site_url = '<?php echo site_url();?>';
		</script>
		
        <!-- ADD ANNOUNCEMENT MODAL -->
        <div class="modal fade" id="announcement-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-thumb-tack"></i> Add Announcement</h4>
                    </div>
					 
					
					
                    
                        <div class="modal-body">
							<div id="add_announcement_errors" class="text-danger"></div>
						
							<?php echo form_open(); ?>
							
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Title:</span>
                                    <input name="announcement_title" id="announcement_title" type="text" class="form-control" placeholder="Title">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                      Duration:
                                    </span>
                                    <input type="text" name="announcement_duration" class="form-control pull-right" id="announcement-duration"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <textarea name="announcement_message" id="announcement_message" class="form-control" placeholder="Message" style="height: 120px;"></textarea>
                                </div>
                            </div>
                        </div>
						<?php echo form_close(); ?>
                        <div class="modal-footer clearfix">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>
                            <button id="save_announcement_butt" class="btn btn-primary pull-left"><i class="fa fa-thumb-tack"></i> Save Announcement</button>
							<?php //echo form_submit('submit', 'Save Announcement', 'class="btn btn-primary pull-left"'); ?>
                        </div>
                    
					
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
		
		
		
		
		
		
        <!-- VIEW ANNOUNCEMENT MODAL -->
        <div class="modal fade" id="announcement-item-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-thumb-tack"></i> Announcement</h4>
                    </div>
                    <form action="#" method="post">
                        <div class="modal-body">
                            <div class="form-group" id="ann_div">
                            </div>
                        </div>
                        <div class="modal-footer clearfix">

                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            <!-- normal users can't see this -->
                            <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-thumb-tack"></i> Edit Annoucement</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

