<!DOCTYPE html>
<html lang="en">
	
<?php $this->load->view('templates/link_rel.php')?>
	
<body>
<!--PreLoader-->
<div class="loader">
    <div class="loader-inner">
        <div class="cssload-loader"></div>
    </div>
</div>
<!--PreLoader Ends-->
<?php $this->load->view('templates/header.php')?>
	
<?php $this->load->view($container)?>	

<?php $this->load->view('templates/footer.php')?>
	
<?php $this->load->view('templates/script_src.php')?>
</body>
</html>