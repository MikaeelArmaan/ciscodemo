<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo ($page_title) ?? $this->config->item('page_title'); ?></h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo admin_url(); ?>">Home</a></li>
                    <?php
                    if (isset($breadcrumbs) && is_array($breadcrumbs) && count($breadcrumbs) > 0) {
                        foreach ($breadcrumbs as $bdata) {
                    ?>
                            <li class="breadcrumb-item <?php echo ($bdata['url'] == '#') ? 'active' : ''; ?>">
                                <?php echo ($bdata['url'] !== '#') ? '<a href="' . admin_url($bdata['url']) . '">' . $bdata['name'] . '</a>' : $bdata['name']; ?> </li>
                    <?php
                        }
                    }
                    ?>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->