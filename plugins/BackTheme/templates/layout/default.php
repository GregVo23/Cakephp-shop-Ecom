<!DOCTYPE html>
<html lang="en">

<head>

    <?= $this->Html->charset('utf-8'); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administrtion du site E-commerce</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!--Back Office-->
    <!-- CSS -->
    <?= $this->Html->css([
      'BackTheme./css/sb-admin-2.min',
      'BackTheme./css/fontawesome.all.min',
      'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css',
      'style',
    ]); ?> 
    <script src="https://kit.fontawesome.com/b52d20dcce.js" crossorigin="anonymous"></script>

</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!--Menu-->
            <?= $this->Element('BackTheme.layout/menu') ?>
       <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
          <div id="content">
            <!--Topbar-->
                <?= $this->Element('BackTheme.layout/topbar') ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                <!--Contenu page-->
                    <?= $this->Flash->Render() ?>
                    <?= $this->fetch('content'); ?>
                
                    <!-- layout tableau a supprimer ou modifier -->
                    //<?= $this->Element('BackTheme.layout/content') ?>
                    
                </div>
            <!-- End of Content Wrapper -->
           </div> 
           <!-- End of Page Wrapper -->
           <!--Footer-->
            <?= $this->Element('BackTheme.layout/footer') ?>  
        </div>
    <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <?= $this->Html->script([
        'BackTheme./js/bootstrap.bundle.min',
        'BackTheme./js/jquery.min',
        'BackTheme./js/bootstrap.bundle.min',
        'BackTheme./js/jquery.easing.min',
        'BackTheme./js/sb-admin-2.min',
        'BackTheme./js/Chart.min',
        'BackTheme./js/chart-area-demo',
        'BackTheme./js/chart-pie-demo',
        'BackTheme./js/test',
        'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js',
        'BackTheme./js/select',
    ]); ?>
    
    <!-- Bootstrap core JavaScript-->
    <!-- Core plugin JavaScript-->
    <!-- Custom scripts for all pages-->
    <!-- Pas nécessaire pour le projet-->
    <!-- Page level plugins -->
    <!-- Page level custom scripts -->

</body>
</html>
