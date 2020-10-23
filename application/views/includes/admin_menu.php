<?php
defined('BASEPATH') or exit('No direct script access allowed');
$user_crm_role_id  = $this->crm_auth->get_role_id();

$arrRoleWiseMenu  = $this->crm_auth->get_nav_menu();
$html        = $this->crm_auth->generate_nav_menu(0, $arrRoleWiseMenu, $arrRoleWiseMenu, $container_class = 'nav navbar-nav subnav');
print_r($html);
/*switch($user_crm_role_id)
{
	case 1:
		include('admin_top_menu.php');
		break;
	case 2:
		include('marketing_top_menu.php');
		break;
	case 3:
		include('floor_top_menu.php');
		break;
	case 4:
		include('agent_top_menu.php');
		break;
	case 6:
		include('tl_top_menu.php');
		break;
	default;
		include('admin_other_menu.php');
		break;
}*/
?>
<nav class="navbar navbar-inverse navbar-fixed-top nav-main">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-home ehome"></i></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <?php echo $html; ?>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $this->crm_auth->get_name(); ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo site_url('admin/myaccount'); ?>">My Account</a></li>
            <li><a href="<?php echo site_url('auth/logout'); ?>">Logout</a></li>
          </ul>
        </li>
        <?php /*?><li><a href="#"><i class="fa fa-cog"></i></a></li><?php */ ?>

      </ul>
    </div>
  </div>

</nav>