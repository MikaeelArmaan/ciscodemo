<?php include('includes/header.php') ?>

<section class="content">

    <!-- Default box -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <form name="frm-router" id="frm-router" role="form" class="form-horizontal" action="<?php echo site_url($frm_url); ?>" method="post" enctype="multipart/form-data">
                    <div class="card card-primary">
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="sapid">SAP ID</label>
                                <div class=" col-sm-9">
                                    <input type="text" class="form-control" id="sapid" name="sapid" placeholder="sapid " value="<?php echo ($router_info['sapid']) ?? set_value('sapid'); ?>" <?= $readonly; ?>>
                                    <span class="text-danger"></span>
                                    <?php echo form_error('sapid', '<label for="sapid" class="error">', '</label>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="hostname">HOST NAME</label>
                                <div class=" col-sm-9">
                                    <input type="text" class="form-control" id="hostname" name="hostname" placeholder="hostname" value="<?php echo ($router_info['hostname']) ?? set_value('hostname'); ?>" <?= $readonly; ?>>
                                    <span class=".text-danger"></span>
                                    <?php echo form_error('hostname', '<label for="hostname" class="error">', '</label>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="loopback">LoopBack</label>
                                <div class=" col-sm-9">
                                    <input type="text" class="form-control" id="loopback" name="loopback" placeholder="LoopBack" value="<?php echo ($router_info['loopback']) ?? set_value('loopback');  ?>">
                                    <span class="text-danger"></span>
                                    <?php echo form_error('loopback', '<label for="loopback" class="error">', '</label>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="mac">Mac Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="mac" name="mac" placeholder="mac" value="<?php echo ($router_info['mac_address']) ?? set_value('mac'); ?>">
                                    <?php echo form_error('mac', '<label for="mac" class="error">', '</label>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="type">Type</label>
                                <div class=" col-sm-9"> <select name="type" id="type" class="form-control">
                                        <option value="">Select Type</option>
                                        <option value="AG1" <?php echo ($router_info['type'] == 'AG1') ? "selected='selected'" : ""; ?>>AG1</option>
                                        <option value="CSS" <?php echo ($router_info['type'] == 'CSS') ? "selected='selected'" : ""; ?>>CSS</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="status">Status</label>
                                <div class=" col-sm-9"> <select name="status" id="status" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="1" <?php echo ($router_info['flg_status'] == 1) ? "selected='selected'" : ""; ?>>Active</option>
                                        <option value="0" <?php echo ($router_info['flg_status'] == 0) ? "selected='selected'" : ""; ?>>Inactive</option>

                                    </select>
                                </div>
                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button><button type="button" onClick="goBack()" class="btn btn-outline-danger">Go Back</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>

    <script src='<?php echo plugin_url('jquery-validation/jquery.validate.min.js'); ?>'></script>
    <script src='<?php echo plugin_url('jquery-validation/additional-methods.js'); ?>'></script>
    <script>
        jQuery(document).ready(function() {
            jQuery("#frm-router").validate({
                ignore: 'input[type="hidden"]',
                rules: {
                    loopback: {
                        required: true,
                        IP4Checker: true
                    },

                },
                messages: {
                    loopback: {
                        required: "Please provide loopback",
                        IP4Checker: "Invalid loopback Address"
                    },

                },
                errorPlacement: function(error, element) {
                    error.appendTo(element.next('.text-danger'));
                }
            });

            jQuery.validator.addMethod('IP4Checker', function(value) {
                var ip = /\b(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\b/;
                return value.match(ip);
            }, 'Invalid IP address');
        });
    </script>
    <script type="text/javascript">
        function goBack() {
            window.history.back();
        }
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>