<?php 

$menu			= $this->crm_auth->get_nav_menu();

$current_uri	= uri_string();

$ctrler			= isset($ctrler	)?$ctrler:'';

?>

<div class="leftpanel">

    	

        <div class="logopanel">

        	<h1><a href="<?php echo site_url();?>" target="_blank"><?php echo site_name();?></a></h1>

        </div><!--logopanel-->

        

        <div class="datewidget">Today is <?php echo date('l, M d, Y h:i a');?></div>

    

    	<div class="leftmenu">        

            <ul class="nav nav-tabs nav-stacked">

            	<li class="nav-header">Main Navigation</li>

                <li <?php echo ($this->uri->segments[2] == 'dashboard')?'class="active"':'';?>><a href="<?php echo site_url('admin/dashboard');?>"><span class="icon-align-justify"></span> Dashboard</a></li>

				<?php

				foreach ($menu as $parent => $parent_params)

				{

					if (empty($parent_params['children']))

					{

						$active = ($current_uri==$parent_params['url'] || $ctrler==$parent);

						?>

						<li class='<?php if ($active) echo 'active'; ?>'>

							<a href='<?php echo $parent_params['url']; ?>'>

								<span class="<?php echo $parent_params['icon']; ?>"></span> <span><?php echo $parent_params['name']; ?></span>

							</a>

						</li>



						<?php

					}	 

					else

					{

						$parent_active = ($ctrler==$parent); 

						if($parent_params['link'])

						{

							/*<ul class="scroll-box-menu">*/

							?>

							<li class='dropdown <?php if ($parent_active) echo 'active'; ?>'>

								<a href='#'><span class="<?php echo $parent_params['icon']; ?>"></span> <span><?php echo $parent_params['name']; ?></span></a>

								<ul style="<?php echo ($parent_active)?'display:block;':''?>">

									<?php 

									foreach ($parent_params['children'] as $key => $childData)

									{	

										if($childData['link'])

										{

											$child_active = ($current_uri==$childData['url']); 

											?>

											<li <?php if ($child_active) echo 'class="active"'; ?>>

												<a href='<?php echo $childData['url']; ?>'><span class="icon-th-list"></span> <?php echo humanize($childData['name']);?></a>

											</li>

											<?php 

										}

									}//foreach ($parent_params['children'] as $key => $childData) 

									?>

								</ul>

							</li>

							<?php

						}

					}

				}

				?>

            </ul>

        </div><!--leftmenu-->

        

    </div>

                        

