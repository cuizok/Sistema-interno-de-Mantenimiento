    <?php
include('header.php');  
?>


<div class="wrapper d-flex align-items-stretch">
<?php
include('menu_opc2.php');
?>

<div id="content" class="p-4">
    
<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
<div class="container-fluid">
    <div class="row" style="width:100%; margin:0px; padding:0px;">
    <div class="col-md-1" style="height:100%; padding-top:5px;">
    <button type="button" id="sidebarCollapse" class="btn btn-primary">
    <i class="fa fa-bars"></i>
    <span class="sr-only">Toggle Menu</span>
    </button>
    </div>
    <div class="col-md-11" style="height:100%; margin-bottom:-15px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">app</li>
        <li class="breadcrumb-item active">Escritorio</li>
        <li class="ml-auto"></li>
    </ol>
    </div>  
    </div>
</div>
</nav>

   

<div class="container is-fluid">
	<h1 class="title">Home</h1>
	<h2 class="subtitle">¡Bienvenido <?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?>!</h2>
</div>



    
<style>
    @media (max-width: 768px) {
        #sidebar {
            width: 100%;
            position: fixed;
            top: 56px;
            left: -70%;
            transition: all 0.3s;
            z-index: 1000;
        }
        #sidebar.active {
            left: 0;
        }
        #content {
            transition: all 0.3s;
        }
        #content.shifted {
            margin-left: 15%; 
        }
    }



</style>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const sidebarCollapse = document.getElementById('sidebarCollapse');
        const content = document.getElementById('content');

        sidebar.classList.remove('active');

        sidebarCollapse.addEventListener('click', function() {
            sidebar.classList.toggle('active');
            content.classList.toggle('shifted');
        });
    });

</script>
    
    
    
