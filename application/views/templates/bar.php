<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MAJOO INDONESIA</title>    

    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

	<link href="<?php echo base_url() ?>assets/css/select2/select2.min.css" rel="stylesheet" />

	<link href="<?php echo base_url() ?>assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">

</head>

<body>

	<div id="wrapper">

	    <nav class="navbar-default navbar-static-side" role="navigation">
	        <div class="sidebar-collapse">
	            <ul class="nav metismenu" id="side-menu">
	                <li class="nav-header">
	                    <div class="dropdown profile-element">
	                        <img alt="image" style="width: 100px;" src="<?php echo base_url() ?>assets/images/majoo_logo.png"/>
	                        <span class="block m-t-xs font-bold">as <?= $this->session->userdata('username') ?></span>
	                    </div>
	                    <div class="logo-element">
	                        TrusMedis
	                    </div>
	                </li>
	                <li class="<?= ($this->uri->segment(1) === 'List_produk') ? 'landing_link' : '' ?>">
	                    <a href="<?php echo base_url() ?>List_produk/"><i class="fa fa-address-book"></i> <span class="nav-label">List Produk</span></a>
	                </li>
	                <li class="<?= ($this->uri->segment(1) === 'Produk') ? 'landing_link' : '' ?>">
	                    <a href="<?php echo base_url() ?>Produk/"><i class="fa fa-address-book"></i> <span class="nav-label">Master Produk</span></a>
	                </li>
	                <li class="<?= ($this->uri->segment(1) === 'Kategori') ? 'landing_link' : '' ?>">
	                    <a href="<?php echo base_url() ?>Kategori/"><i class="fa fa-home"></i> <span class="nav-label">Master Kategori</span></a>
	                </li>
	                <li class="<?= ($this->uri->segment(1) === 'Logout') ? 'landing_link' : '' ?>">
	                    <a href="<?php echo base_url() ?>Logout/"><i class="fa fa-sign-out"></i> <span class="nav-label">Logout</span></a>
	                </li>
	            </ul>

	        </div>
	    </nav>

	    <div id="page-wrapper" class="gray-bg">
	        <div class="row border-bottom">
		        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
			        <div class="navbar-header">
			            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>			
			        </div>		            
		        </nav>
	        </div>