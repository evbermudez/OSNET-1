<style type="text/css">
  .employee-form-field {
    margin-bottom:5px;
    width:450px;
  }

  span.input-group-addon {
    width:180px;
  }

</style>

<div id="add-new-employee-success-dialog" class="modal-dialog" title="Info">
  <span class="input-group-addon"><strong><h4>New Employee Successfully Created.</h4></strong></span>
</div>

<div id="add-new-employee-dialog" class="modal-dialog" title="New Employee">

  <div class="form-group">
    <fieldset>
      <legend>Personal Info</legend>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Full Name</strong></span>
        <input type="text" id="full_name" class="form-control" placeholder="" disabled/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Last Name</strong></span>
        <input type="text" id="last_name" class="form-control" placeholder="- Required -" autocomplete="off"/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>First Name</strong></span>
        <input type="text" id="first_name" class="form-control" placeholder="- Required -" autocomplete="off"/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Middle Name</strong></span>
        <input type="text" id="middle_name" class="form-control" placeholder="- Required -" autocomplete="off"/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Suffix</strong></span>
        <input type="text" id="suffix" class="form-control" placeholder="" autocomplete="off"/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Registered Address</strong></span>
        <textarea class="form-control" id="registered_address" style="resize:none; height:100px;" placeholder="- Required -" autocomplete="off"></textarea>
      </div>
      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Zip Code</strong></span>
        <input type="text" id="zip_code" class="form-control" placeholder="" autocomplete="off"/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Birthdate</strong></span>
        <input type="text" id="birth_date" class="form-control datepick" placeholder="00/00/0000" autocomplete="off"/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Gender</strong></span>
        <select class="form-control" id="gender"><option>Male</option><option>Female</option></select>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Marital Status</strong></span>
        <select class="form-control" id="marital_status"><option>Single</option><option>Married</option></select>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Tax Code</strong></span>
        <input type="text" id="tax_code" class="form-control" placeholder="" autocomplete="off"/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>SSS</strong></span>
        <input type="text" id="sss" class="form-control" placeholder="" autocomplete="off"/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>PHIC</strong></span>
        <input type="text" id="phic" class="form-control" placeholder="" autocomplete="off"/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>TIN</strong></span>
        <input type="text" id="tin" class="form-control" placeholder="" autocomplete="off"/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>HDMF</strong></span>
        <input type="text" id="hdmf" class="form-control" placeholder="" autocomplete="off"/>
      </div>
    </fieldset>

    <fieldset>
      <legend>Spouse</legend>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Last Name</strong></span>
        <input type="text" id="spouse_last_name" class="form-control" placeholder="" autocomplete="off"/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>First Name</strong></span>
        <input type="text" id="spouse_first_name" class="form-control" placeholder=""/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Middle Name</strong></span>
        <input type="text" id="spouse_middle_name" class="form-control" placeholder=""/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Suffix</strong></span>
        <input type="text" id="spouse_suffix" class="form-control" placeholder=""/>
      </div>

    </fieldset>

    <fieldset>
      <legend>Previous Employer Info</legend>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Previous Employer</strong></span>
        <input type="text" id="previous_employer" class="form-control" placeholder=""/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Date Ended</strong></span>
        <input type="text" id="date_ended" class="form-control datepick" placeholder="00/00/0000"/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Address</strong></span>
        <textarea class="form-control" id="address" style="resize:none; height:100px;"></textarea>
      </div>

    </fieldset>

    <fieldset>
      <legend>Work Info</legend>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Employment #</strong></span>
        <input type="text" id="employment_number" class="form-control" placeholder=""/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Date Started</strong></span>
        <input type="text" id="date_started" class="form-control datepick" placeholder="00/00/0000"/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Employment Type</strong></span>
        <input type="text" id="employment_type" class="form-control" placeholder=""/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Contract Period</strong></span>
        <input type="text" id="contract_period" class="form-control" placeholder=""/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Email</strong></span>
        <input type="text" id="email" class="form-control" placeholder=""/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Facebook URL</strong></span>
        <input type="text" id="facebook_url" class="form-control" placeholder=""/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Branch / Site</strong></span>
        <input type="text" id="branch_site" class="form-control" placeholder=""/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Department</strong></span>
        <!--<input type="text" class="form-control" id="" placeholder=""/>-->
        <select id="department" class="form-control">
          <?php foreach($department_list as $key): ?>
            <option><?php echo $key->department_name; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Immediate Superior</strong></span>
        <input type="text" id="immediate_superior" class="form-control" placeholder=""/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Position</strong></span>
        <input type="text" id="position" class="form-control" placeholder=""/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Salary Type</strong></span>
        <input type="text" id="salary_type" class="form-control" placeholder=""/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Payreg Names</strong></span>
        <input type="text" id="payreg_names" class="form-control" placeholder=""/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Bank Account #</strong></span>
        <input type="text" id="bank_account_number" class="form-control" placeholder=""/>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Status</strong></span>
        <!--<input type="text" class="form-control" id="" placeholder=""/>-->
        <select id="status" class="form-control">
          <option>Active</option>
          <option>Resigned</option>
        </select>
      </div>

      <div class="input-group employee-form-field">
        <span class="input-group-addon"><strong>Change Password</strong></span>
        <input type="text" id="password" class="form-control" placeholder=""/>
      </div>

    </fieldset>

      <!-- 

      ALTER TABLE `user_information`  ADD `last_name` VARCHAR(255) NOT NULL  AFTER `role_id`,  
      ADD `first_name` VARCHAR(255) NOT NULL  AFTER `last_name`,  ADD `middle_name` VARCHAR(255) 
      NOT NULL  AFTER `first_name`,  ADD `suffix` VARCHAR(255) NOT NULL  AFTER `middle_name`,  
      ADD `registered_address` TEXT NOT NULL  AFTER `suffix`,  ADD `zip_code` VARCHAR(50) 
      NOT NULL  AFTER `registered_address`,  ADD `birth_date` DATETIME NOT NULL  AFTER `zip_code`,  
      ADD `gender` VARCHAR(50) NOT NULL  AFTER `birth_date`,  ADD `marital_status` VARCHAR(50) 
      NOT NULL  AFTER `gender`,  ADD `tax_code` VARCHAR(255) NOT NULL  AFTER `marital_status`,  
      ADD `sss` VARCHAR(100) NOT NULL  AFTER `tax_code`,  ADD `phic` VARCHAR(50) NOT NULL  AFTER `sss`,  
      ADD `tin` VARCHAR(50) NOT NULL  AFTER `phic`,  ADD `hdmf` VARCHAR(50) NOT NULL  AFTER `tin`,  
      ADD `spouse_last_name` VARCHAR(255) NOT NULL  AFTER `hdmf`,  ADD `spouse_first_name` VARCHAR(255) 
      NOT NULL  AFTER `spouse_last_name`,  ADD `spouse_middle_name` VARCHAR(255) NOT NULL  
      AFTER `spouse_first_name`,  ADD `spouse_suffix` VARCHAR(255) NOT NULL  AFTER `spouse_middle_name`,  
      ADD `previous_employer` VARCHAR(255) NOT NULL  AFTER `spouse_suffix`,  ADD `date_ended` DATETIME 
      NOT NULL  AFTER `previous_employer`,  ADD `address` TEXT NOT NULL  AFTER `date_ended`,  
      ADD `employment_number` VARCHAR(25) NOT NULL  AFTER `address`,  ADD `date_started` DATETIME NOT NULL  
      AFTER `employment_number`,  ADD `employment_type` VARCHAR(255) NOT NULL  AFTER `date_started`,  
      ADD `contract_period` VARCHAR(155) NOT NULL  AFTER `employment_type`,  ADD `email` VARCHAR(255) 
      NOT NULL  AFTER `contract_period`,  ADD `facebook_url` VARCHAR(455) NOT NULL  AFTER `email`,  
      ADD `branch_site` VARCHAR(255) NOT NULL  AFTER `facebook_url`,  ADD `department` VARCHAR(155) 
      NOT NULL  AFTER `branch_site`,  ADD `immediate_superior` VARCHAR(255) NOT NULL  AFTER `department`,  
      ADD `position` VARCHAR(255) NOT NULL  AFTER `immediate_superior`,  ADD `salary_type` VARCHAR(155) 
      NOT NULL  AFTER `position`,  ADD `payreg_names` VARCHAR(255) NOT NULL  AFTER `salary_type`,  
      ADD `bank_account_number` VARCHAR(255) NOT NULL  AFTER `payreg_names`,  ADD `status` VARCHAR(55) 
      NOT NULL  AFTER `bank_account_number`,  ADD `password` VARCHAR(40) NOT NULL  AFTER `status`;

      -->
    
  </div>
</div>

<script type="text/javascript">
  var base_path = "<?php echo site_url(). 'index.php/ajax/employee_ajax/'; ?>";

    var fName = '';
    var mName = '';
    var lName = '';

    function popUpDialog() {
      $("#add-new-employee-success-dialog").dialog({
          modal:true,
          resizable:false,
          width:330,
          buttons: {
            Continue: function() {
              location.reload();
              $(this).dialog("close");
            }
          }
      });
    }

    function performSearch() {
      var department = $(".department-type").val();
      var employee = $(".search").val();

      //console.log(person + " / " + department);

      $.post(base_path + "ajax_employee_search_by_department", {employee: employee, department: department}, function(response) {
        $("#employee-table").html("");
        $("#employee-table").append(response);
        //console.log(response);
      });
    }

    $(document).on("keyup keydown", "#first_name", function() {
      fName = $("#first_name").val();

      $("#full_name").val(fName + " " + mName + " " + lName);
    });

    $(document).on("keyup keydown", "#middle_name", function() {
      mName = $("#middle_name").val();

      $("#full_name").val(fName + " " + mName + " " + lName);
    });

    $(document).on("keyup keydown", "#last_name", function() {
      lName = $("#last_name").val();

      $("#full_name").val(fName + " " + mName + " " + lName);
    });

    $(document).on("change", ".department-type", function() {
      performSearch();
    });

    // Search for a person based on department
    $(document).on("keyup keydown", ".search", function() {
      performSearch();
    });

    $(document).on("click", "#edit", function() {
      var user_id = $(this).prop("class");
      alert(user_id);
    });

    // Instantiate Datepickers
    $(document).ready(function() {
      $(".datepick").each(function() {
        $(this).datepicker();
    });

    // Add Click Event to Pop-up Add New Employee Modal Dialog
    $(document).on("click", "#add-new-employee", function() {
      $("#add-new-employee-dialog").dialog({
        modal:true,
        width:520,
        height:500,
        resizable:false,
        buttons: {
          Save: function() {

            var first_name = $("#first_name").val();
            var last_name = $("#last_name").val();
            var middle_name = $("#middle_name").val();
            var registered_address = $("#registered_address").val();

            if (first_name.length > 0 && last_name.length > 0 && 
                middle_name.length > 0 && registered_address.length > 0) {

              var values = {};
              $(":input").each(function() {
                values[$(this).prop("id")] = $(this).val();
              });
              alert(JSON.stringify(values, null, 4));

              $.post(base_path + "ajax_add_new_employee", {profile: JSON.stringify(values, null, 4)}, function(response) {
              });

              $(this).dialog("close");
              popUpDialog();
            } else {
              
            }
            /*
            var arr = new Array();
            $(":input").each(function() {
              arr.push($(this).val());
            });
            alert(arr); */
          },
          Cancel: function() {
            $(this).dialog("close");
          }
        }
      });
    });
  });
</script>

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
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <div class="row">                                      
                                    <div class="col-xs-12">
                                        <div class="dataTables_filter" id="example1_filter">
                                    <label>
                                        <button class="btn btn-primary" id="add-new-employee" data-toggle="modal" data-target="#department-modal">
                                          <i class="fa fa-sitemap"></i> Add Employee
                                        </button>
                                    </label>

                                    <label class="pull-right">
                                      Department:   
                                      <!--id="department-type"-->
                                      <select class="form-control department-type" style="width:200px;">
                                        <option>All</option>
                                        <?php foreach($department_list as $list): ?>
                                          <option><?php echo $list->department_name; ?></option>
                                        <?php endforeach; ?>
                                      </select> 
                                      <!-- id="search" -->
                                      <input class="form-control search" placeholder="Employee Name" style="width:200px;" type="text" aria-controls="example1"></label>
                                    <!--<button id="add-new-dept">Add New Department</button>-->

                                        </div>
                                    </div>
                                </div>
                                    <table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                                

                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" role="columnheader" tabindex="0" 
                                        aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" 
                                        aria-label="Rendering engine: activate to sort column descending" 
                                        style="width: 232px;">Name</th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" 
                                        rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" 
                                        style="width: 348px;">Department</th><th class="sorting" role="columnheader" 
                                        tabindex="0" aria-controls="example1" rowspan="1" colspan="1" 
                                        aria-label="Platform(s): activate to sort column ascending" 
                                        style="width: 301px;">Email</th><th class="sorting" role="columnheader" 
                                        tabindex="0" aria-controls="example1" rowspan="1" colspan="1" 
                                        aria-label="Engine version: activate to sort column ascending" 
                                        style="width: 200px;">Action</th>
                                </thead>

                            <tbody role="alert" aria-live="polite" aria-relevant="all" id="employee-table">
                                    <?php foreach($employee_list as $value): ?>
                                        <tr>
                                            <td><?php echo $value->first_name. ' '. $value->middle_name. ' '. $value->last_name; ?></td>
                                            <td><?php echo $value->department; ?></td>
                                            <td><?php echo $value->email; ?></td>
                                            <td>
                                                <a id="edit" class="<?php echo $value->user_id; ?>" href="#"><img src="<?php echo site_url("assets/img/edit.gif"); ?>"></a>
                                                <a id="archieve" class="<?php echo $value->user_id; ?>" href="#"><img src="<?php echo site_url("assets/img/delete.gif"); ?>"></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                            </tbody></table><!--<div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example1_info">Showing 1 to 10 of 57 entries</div></div><div class="col-xs-6"><div class="dataTables_paginate paging_bootstrap"><ul class="pagination"><li class="prev disabled"><a href="#">← Previous</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li class="next"><a href="#">Next → </a></li></ul></div></div></div></div>-->
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