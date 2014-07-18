$(document).ready(function() {


  $(".infraction-date").inputmask("dd/mm/yyyy", {"placeholder": "dd-mm-yyyy"});

  $("button.add-infraction").click(function(){
  
    $('input.infraction-user-id').val($(this).prop("id")); 
  
  }); 
  
  $('#add-infraction-dialog .btn-primary').click(function(){

		var user_id = $.trim( $('.infraction-user-id').val());
		var date = $.trim( $('.infraction-date').val());
		var infraction_type = $.trim( $('.infraction-type').val());
		var details = $.trim( $('.infraction-details').val());

		var err = "";
		if (!user_id) 			err += '<p>No User ID Error. Please contact OSNET developer! :)</p>';
		if (!date) 	err += '<p>There should be a Date</p>';
		if (infraction_type == 0) 	err += '<p>Select Infraction Type</p>';
		$("#add_infraction_errors").html(err);

		if(user_id && date && infraction_type){
			$.ajax({
				type: "POST",
				url: site_url + 'index.php/ajax/infractions_ajax/add',
				data: {user_id:user_id, date:date, infraction_type:infraction_type, details:details}, 
				success:function(data) {
					window.location.href= site_url + 'home/infraction_list';
				}
			});
		}

	});
});