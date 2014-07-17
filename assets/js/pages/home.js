$(document).ready(function() {
    $('#calendar').fullCalendar({
        events:"https://www.google.com/calendar/feeds/en.philippines%23holiday%40group.v.calendar.google.com/public/basic"
    });
    
    //Initialize WYSIHTML5 - text editor
    $("#announcement_message").wysihtml5();
	
	$("#edit_announcement_message").wysihtml5();
    
    //Date range picker
    $('#announcement-duration').daterangepicker();
	
    $('#edit_announcement-duration').daterangepicker();
	
	/*
		Branch: JEFFREY-announcements_table_db_change_07/11/2014
		Added:  click function announcement_list, save_announcement_butt
	*/    
		

	$('.announcement_list').click(function(){
		var rowid = $(this).data('id');
		$.ajax({
			type: "POST",
			url: site_url + 'index.php/ajax/announcement_ajax/view',
			data: {row_id:rowid}, 
			success:function(data) {
				$("#ann_div").html(data);
				$('#edit_announcement_butt').data('id', rowid);
			}
		});
		
	});
	
	
	 
	$('#save_announcement_butt').click(function(){

		var title = $.trim( $('#announcement_title').val());
		var duration = $.trim( $('#announcement-duration').val());
		var message = $.trim( $('#announcement_message').val());
								
		var err = "";
		if (!title) 			err += '<p>Title Required</p>';
		if (!duration) 	err += '<p>Duration Required</p>';
		if (!message) 	err += '<p>Message Required</p>';
		$("#add_announcement_errors").html(err);
		
		if(title && duration && message){
			$.ajax({
				type: "POST",
				url: site_url + 'index.php/ajax/announcement_ajax/add',
				data: {title:title, duration:duration, message:message}, 
				success:function(data) {
					window.location.href= site_url;
				}
			});
		}

	});
	
	$('#saveedit_announcement_butt').click(function(){
		var title = $.trim( $('#edit_announcement_title').val());
		var duration = $.trim( $('#edit_announcement-duration').val());
		var message = $.trim( $('#edit_announcement_message').val());
		var id = $('#edit_announcement_butt').data('id');
		
		var err = "";
		if (!title) 			err += '<p>Title Required</p>';
		if (!duration) 	err += '<p>Duration Required</p>';
		if (!message) 	err += '<p>Message Required</p>';
		$("#edit_announcement_errors").html(err);
		
		if(title && duration && message){
			$.ajax({
				type: "POST",
				url: site_url + 'index.php/ajax/announcement_ajax/add',
				data: {title:title, duration:duration, message:message, id:id}, 
				success:function(data) {
					window.location.href= site_url;
				}
			});
		}
	});
	
	
	$('#edit_announcement_butt').click(function(){
		$('#announcement-item-modal').modal('hide');
		var rowid = $('#edit_announcement_butt').data('id');
		$.ajax({
			type: "POST",
			url: site_url + 'index.php/ajax/announcement_ajax/edit',
			data: {row_id:rowid}, 
			success:function(data) {
				var parsedata = jQuery.parseJSON( data );
				$("#edit_announcement_title") . val (parsedata.announcement_title);
				$("#edit_announcement-duration") . val (parsedata.announcement_duration);
				editor.setValue(parsedata.announcement_message);
			}
		});
	});
	
	
	$('#delete_announcement_butt').click(function(){
		var rowid = $('#edit_announcement_butt').data('id');
		alert(rowid);
		$.ajax({
			type: "POST",
			url: site_url + 'index.php/ajax/announcement_ajax/delete',
			data: {row_id:rowid}, 
			success:function(data) {
				window.location.href= site_url;
			}
		});

	});
		
		
});