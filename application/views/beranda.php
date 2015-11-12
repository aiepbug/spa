<link rel="stylesheet" href="asset/css/simple-sidebar.css" type="text/css" />

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="javascript:void(0)">
                        Beranda SPA
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" onclick="kasir()">Kasir</a>
                </li>
                <li>
                    <a href="javascript:void(0)" onclick="member()">Member</a>
                </li>
                <li>
                    <a href="javascript:void(0)" onclick="produk()">Produk</a>
                </li>
                <li>
                    <a href="javascript:void(0)" onclick="pengeluaran()">Pengeluaran</a>
                </li>
                <li>
                    <a href="javascript:void(0)" onclick="admin()">Admin</a>
                </li>
                <li>
                     <a href="javascript:void(0)" onclick="laporan()">Laporan</a>
                </li>
            </ul>
            <p class="banner label label-danger"><a target="_blank" href="http://banuaintegrasi.com">www.banuaintegrasi.com</a></p>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <nav class="navbar fixed-top">
		  <p class="navbar-text navbar-right">Login sebagai <a id="profil" onclick="profil()" 
		  data-trigger="focus"	
		  href="#"  data-toggle="popover" title="Pengaturan Akun" 
		  data-placement="left" data-html="true" data-content="
			<p><span class='fa fa-user'></span> <a href='#' onclick='logout()'>Ubah Password</a></p>
			<p><span class='fa fa-lock'></span> <a href='#' onclick='logout()'>Logout</a></p>" 
		  class="navbar-link"> <?php echo $this->session->userdata('nama')?></a></p>
		</nav>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
						<div id="konten">
							<h1>Simple Sidebar</h1>
							<p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
							<p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
							<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
	});
	function kasir()
	{
		$('#loading').html('<span class="fa fa-spinner fa-pulse fa-2x"></span>');
		$.ajax({
				url      : 'index.php/kasir/',
				type     : 'POST',
				dataType : 'html',
				success  : function(respon){				
							$('#konten').html(respon);
							$('#loading').html('');
							},
				})	
	}
	function member()
	{
		$('#loading').html('<span class="fa fa-spinner fa-pulse fa-2x"></span>');
		$.ajax({
				url      : 'index.php/member/',
				type     : 'POST',
				dataType : 'html',
				success  : function(respon){				
							$('#konten').html(respon);
							$('#loading').html('');
							},
				})	
	}
	function produk()
	{
		$('#loading').html('<span class="fa fa-spinner fa-pulse fa-2x"></span>');
		$.ajax({
				url      : 'index.php/produk/',
				type     : 'POST',
				dataType : 'html',
				success  : function(respon){				
							$('#konten').html(respon);
							$('#loading').html('');
							},
				})	
	}
	function pengeluaran()
	{
		$('#loading').html('<span class="fa fa-spinner fa-pulse fa-2x"></span>');
		$.ajax({
				url      : 'index.php/pengeluaran/',
				type     : 'POST',
				dataType : 'html',
				success  : function(respon){				
							$('#konten').html(respon);
							$('#loading').html('');
							},
				})	
	}
	function admin	()
	{
		$('#loading').html('<span class="fa fa-spinner fa-pulse fa-2x"></span>');
		$.ajax({
				url      : 'index.php/admin/',
				type     : 'POST',
				dataType : 'html',
				success  : function(respon){				
							$('#konten').html(respon);
							$('#loading').html('');
							},
				})	
	}
	function laporan()
	{
		$('#loading').html('<span class="fa fa-spinner fa-pulse fa-2x"></span>');
		$.ajax({
				url      : 'index.php/laporan/',
				type     : 'POST',
				dataType : 'html',
				success  : function(respon){				
							$('#konten').html(respon);
							$('#loading').html('');
							},
				})	
	}
	function logout()
	{
		$('#loading').html('<span class="fa fa-spinner fa-pulse fa-2x"></span>');
		$.ajax({
				url      : 'index.php/login/logout',
				type     : 'POST',
				dataType : 'html',
				success  : function(respon){		
							$('#loading').html('');		
							$('#isi').html(respon);
							
							},
				})	
	}
    </script>
<style>
.banner a:link { color:#000; text-decoration:none; font-weight:normal; }
.banner a:visited { color: #000; text-decoration:none; font-weight:normal; }
.banner a:hover { color: #000; text-decoration:none; font-weight:normal; }
.banner a:active { color: #000; text-decoration:none; font-weight:normal; }
.banner
{
	font-family:"Ubuntu",tahoma;
	position: fixed;
	bottom: 5%;
	left: 1%;
	text-shadow: 0.3px 0.3px #fff;
}
</style>
