<!-- Right side column. Contains the navbar and content of the page -->
<?php $this->load->view('infraction/infraction_assets'); ?>
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header"> 
                    <h1>
                      <?php if(isset($title)): ?>
                        <?php echo $title; ?>
                      <?php endif; ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    
                    <div class="row-condensed">
                        <div class="col-md-12">

                          <div class="row">
                        <div class="col-md-12">
                            <!-- TO DO List -->
                            <div class="box box-primary">
                                <div class="box-header">
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <div class="form-inline">
                                        <div class="row">                                      
                                            <div class="col-xs-12">
                                                <div>

                                                    <label class="pull-right">Search:  <input id="search" type="text" ></label>

                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-bordered table-striped">
                                          <thead>
                                            <tr role="row">
                                              <th>Department</th>
                                              <th>Name</th>
                                              <th>Infractions</th>
                                              <th>Unexcused Absences</th>
                                              <th>Excused Absences</th>
                                              <th>NCNS</th>
                                              <th>No Notifications</th>
                                              <th>Lates</th>
                                              <th>Action</th>
                                            </tr>
                                          </thead>
                                          <tbody role="alert" aria-live="polite" aria-relevant="all">
                                            <?php foreach($infraction_list as $value): ?>
                                              <tr>
                                                <td><?php echo $value->department; ?></td>
                                                <td><?php echo $value->name; ?></td>
                                                <td><?php echo $value->infractions_count ?></td>
                                                <td><?php echo $value->unexcused_absence_count ?></td>
                                                <td><?php echo $value->excused_absence_count ?></td>
                                                <td><?php echo $value->ncns_count ?></td>
                                                <td><?php echo $value->no_notification_count ?></td>
                                                <td><?php echo $value->late_count ?></td>
                                                <td>
                                                  <button id="<?php echo $value->u_id ?>" class="btn btn-success btn-flat add-infraction" data-toggle="modal" data-target="#add-infraction-dialog" data-id=""><i class="fa fa-plus" data-toggle="tooltip" data-placement="right" title="Add Infraction"></i></button>
                                                  <button class="btn btn-danger btn-flat view-infraction" data-toggle="modal" data-target="#add-infraction-dialog"><i class="fa fa-search" data-toggle="tooltip" data-placement="right" title="View Infractions"></i></button>
                                                </td>
                                              </tr>
                                            <?php endforeach; ?>
                                          </tbody>
                                    
                                        </table>
                                    </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            <!-- End Announcement -->
                        </div>
                    </div><!-- /.row -->  

                        </div><!-- /.col -->
                    </div><!-- /.row -->  
                    

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
            
        </div><!-- ./wrapper -->
        
        <!-- ADD INFRACTION MODAL -->
        <div id="add-infraction-dialog" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-gavel"></i> Add Infraction</h4>
              </div>
              <div class="modal-body">
                <div id="add_infraction_errors" class="text-danger"></div>
                <?php echo form_open(); ?>
                <input type="hidden" class="infraction-user-id form-control"/>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Date: </span>
                    <input type="text" class="infraction-date form-control"/>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Infraction Type: </span>
                    <select class="infraction-type form-control">
                      <option value="0" disabled selected>Select Infraction Type</option>
                      <?php foreach($infraction_type as $value): ?>
                        <option value="<?php echo $value->infraction_type_id; ?>"><?php echo $value->name; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Details: </span>
                    <input type="text" class="infraction-details form-control"/>
                  </div>
                </div>
                <?php echo form_close(); ?>
              </div>
              <div class="modal-footer clearfix">
                <button class="btn btn-primary pull-left"><i class="fa fa-gavel"></i> Save Infraction</button>
                <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- VIEW INFRACTION MODAL -->
        <div id="add-infraction-dialog" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-gavel"></i> Add Infraction</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Date: </span>
                    <input type="text" class="infraction-date form-control"/>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Infraction Type: </span>
                    <select class="infraction-type form-control">
                        <option value="0" selected>Select Infraction Type</option>
                      <?php foreach($infraction_type as $value): ?>
                        <option value="<?php echo $value->infraction_type_id; ?>"><?php echo $value->name; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="modal-footer clearfix">
                <button class="btn btn-primary pull-left"><i class="fa fa-gavel"></i> Save Infraction</button>
                <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>
              </div>
            </div>
          </div>
        </div>