<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?php echo base_url() ?>assets/js/jquery-3.4.1.min.js"></script>
<!--Bootstrap Core-->
<script src="<?php echo base_url() ?>assets/js/propper.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<!--to view items on reach-->
<script src="<?php echo base_url() ?>assets/js/jquery.appear.js"></script>
<!--Owl Slider-->
<script src="<?php echo base_url() ?>assets/js/owl.carousel.min.js"></script>
<!--number counters-->
<script src="<?php echo base_url() ?>assets/js/jquery-countTo.js"></script>
<!--Parallax Background-->
<script src="<?php echo base_url() ?>assets/js/parallaxie.js"></script>
<!--Cubefolio Gallery-->
<script src="<?php echo base_url() ?>assets/js/jquery.cubeportfolio.min.js"></script>
<!--Fancybox js-->
<script src="<?php echo base_url() ?>assets/js/jquery.fancybox.min.js"></script>
<!--tooltip js-->
<script src="<?php echo base_url() ?>assets/js/tooltipster.min.js"></script>
<!--wow js-->
<script src="<?php echo base_url() ?>assets/js/wow.js"></script>
<!--particles js-->
<script src="<?php echo base_url() ?>assets/js/particles.min.js"></script>
<!--morph text js-->
<script src="<?php echo base_url() ?>assets/js/morphext.min.js"></script>
<!--Revolution SLider-->
<script src="<?php echo base_url() ?>assets/js/revolution/jquery.themepunch.tools.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/revolution/jquery.themepunch.revolution.min.js"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
<script src="<?php echo base_url() ?>assets/js/revolution/extensions/revolution.extension.actions.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/revolution/extensions/revolution.extension.carousel.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/revolution/extensions/revolution.extension.kenburn.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/revolution/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/revolution/extensions/revolution.extension.migration.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/revolution/extensions/revolution.extension.navigation.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/revolution/extensions/revolution.extension.parallax.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/revolution/extensions/revolution.extension.slideanims.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/revolution/extensions/revolution.extension.video.min.js"></script>
<!--custom functions and script-->
<script src="<?php echo base_url() ?>assets/js/functions.js"></script>
<!-- Jquery- FileInput -->
<script src="<?= base_url()?>node_modules/bootstrap-fileinput/js/plugins/piexif.js" type="text/javascript"></script>
<script src="<?= base_url()?>node_modules/bootstrap-fileinput/js/plugins/sortable.js" type="text/javascript"></script>
<script src="<?= base_url()?>node_modules/bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>
<script src="<?= base_url()?>node_modules/bootstrap-fileinput/js/locales/id.js" type="text/javascript"></script>
<script src="<?= base_url()?>node_modules/bootstrap-fileinput/js/locales/es.js" type="text/javascript"></script>
<script src="<?= base_url()?>node_modules/bootstrap-fileinput/themes/fas/theme.js" type="text/javascript"></script>
<script src="<?= base_url()?>node_modules/bootstrap-fileinput/themes/explorer-fas/theme.js" type="text/javascript"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url()?>node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<!-- Jquery Toast -->
<script src="<?= base_url()?>node_modules/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<!-- Jquery Confirm -->
<script src="<?= base_url()?>vendor/jquery-confirm/jquery-confirm.min.js"></script>

<script type="text/javascript">
	class Contact {
		isEmail(email) {
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			return regex.test(email);
		}

	  	fnSendEmailToAdmin(){
			var name    = $("#name1").val(); 
			var email   = $("#email1").val(); 
			var message = $("#message1").val(); 

			if(name==""){
				$("#name1").focus();
				return false;
			}

			if(email==""){
				$("#email1").focus();
				return false;
			}

			if(message==""){
				$("#message1").focus();
				return false;
			}

			if( !this.isEmail(email)) {
				alert("Please Enter a Valid Email Address");
				$("#email1").focus();
				return false;
			}

			$.ajax({
				url  : "<?php echo base_url().'contact/send_mail_to_admin'?>",
				type : "POST",
				data : {
					name    : name,
					email   : email,
					message   : message
				},
				beforeSend: function() {
			        $("#btn-send-email").prop('disabled', true);
			    },
				success : function(data){
					$("#name1").val("");
					$("#email1").val("");
					$("#message1").val("");
					if(data=="1"){
						Swal.fire({
						  	icon: 'success',
						  	title: 'Successfully!',
						  	text: 'Your message has been sent.',
							timer: 5000
						});

					} else {
						Swal.fire({
						  	icon: 'error',
						  	title: 'Oops...',
						  	text: 'Cannot Send Email',
							timer: 5000
						});
					}
				},
				complete: function() {
			        $("#btn-send-email").prop('disabled', false);
			    },

			});
		}

		fnSendSubscribeRequest(){
			let subUserName    = $('#userName').val();
	        let subCompanyName = $('#companyName').val();
	        let subUserEmail   = $('#email').val();
	        
	        if(subUserName==""){
	            $("#userName").focus();
	            return false;
	        }

	        if(subCompanyName==""){
	            $("#companyName").focus();
	            return false;
	        }

	        if(subUserEmail==""){
	            $("#email").focus();
	            return false;
	        }

	        if( !this.isEmail(subUserEmail)) {
	            alert("Please Enter a Valid Email Address");
	            $("#email").focus();
	            return false;
	        }

	        $.ajax({
	            url  : "<?php echo base_url().'contact/send_subscribe_request'?>",
	            type : "POST",
	            data : {
	                subUserName    : subUserName,
	                subCompanyName   : subCompanyName,
	                subUserEmail   : subUserEmail
	            },
	            beforeSend: function() {
	                $("#submit_btn").prop('disabled', true);
	            },
	            success : function(data){
	                $("#userName").val("");
	                $("#companyName").val("");
	                $("#email").val("");
	                if(data=="1"){
	                    Swal.fire({
	                        icon: 'success',
	                        title: 'Successfully!',
	                        text: 'Your Subscribe Request has been sent.',
	                        timer: 5000
	                    });

	                } else {
	                    Swal.fire({
	                        icon: 'error',
	                        title: 'Oops...',
	                        text: 'Cannot Send Subscribe Request',
	                        timer: 5000
	                    });
	                }
	            },
	            complete: function() {
	                $("#submit_btn").prop('disabled', false);
	            },

	        });
		}
	}

	contact = new Contact();

	function fnUpdateEvent(){
		alert("bb")
	}

	function fnDeleteEvent(RunNo){
		$.confirm({
	    title: 'Delete Event',
	    content: 'Are you sure want to delete event?',
	    type: 'red',
	    typeAnimated: true,
	    buttons: {
	        tryAgain: {
	            text: 'Delete',
	            btnClass: 'btn-red',
	            action: function(){
	            	$.ajax({
						url  : "<?= base_url().'event/delete_event'?>",
						type : "POST",
						data : {RunNo : RunNo},
						success : function(data){
							if(data=="1"){
								Swal.fire({
			                        icon: 'success',
			                        title: 'Successfully!',
			                        text: 'Delete Event Successfully!',
			                    }).then((result) => {
								  if (result.value) {
								    window.location.replace("<?= base_url().'event'?>");
								  }
								});
							} else {
							  	Swal.fire({
			                        icon: 'error',
			                        title: 'Oops...',
			                        text: 'Delete Event Failure.',
			                        timer: 5000
			                    });
							}
						}
					});
	            }
	        },
	        close: {
	            text: 'Cancel',
	            action: function(){
	            }
	        }
	    }
	});
	}

	// Upload Image
	$("#Attachment").fileinput({
        showUpload: false,
        dropZoneEnabled: true,
        maxFileCount: 1,
        mainClass: "input-group-md",
        'theme': 'explorer-fas',
    });

    // ALERT NEW EVENT -------------------------------------------------------------------------------
	let msgnewevent = "<?= $this->session->flashdata('msgnewevent')?>";
	if(msgnewevent=="1"){
	  	$.toast({
			heading: 'Success',
			text: 'Create Event Successfully',
			showHideTransition: 'slide',
			icon: 'success',
			position: 'bottom-right',
			hideAfter: 7000
	  	});
	} else if(msgnewevent=="0"){
		$.toast({
			heading: 'Error',
			text: "Create Event Failed",
			showHideTransition: 'slide',
			icon: 'error',
			position: 'top-right',
			hideAfter: 3000
		});
	}
	// --------------------------------------------------------------------------------------------------

	// ALERT UPDATE EVENT -------------------------------------------------------------------------------
	let msgupdateevent = "<?= $this->session->flashdata('msgupdateevent')?>";
	if(msgupdateevent=="1"){
	  $.toast({
	      heading: 'Success',
	      text: 'Update Event Successfully',
	      showHideTransition: 'slide',
	      icon: 'success',
	      position: 'bottom-right',
	      hideAfter: 7000
	  });
	} else if(msgupdateevent=="0"){
		$.toast({
	      heading: 'Error',
	      text: "Update Event Failed",
	      showHideTransition: 'slide',
	      icon: 'error',
	      position: 'top-right',
	      hideAfter: 3000
	  	});
	}
	// ALERT UPDATE EVENT -------------------------------------------------------------------------------
	
</script>