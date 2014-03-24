<div class="header" style="height: 180px;">

</div>
<nav class="navbar navbar-default" role="navigation" style="padding-bottom: 0; margin-bottom: 0;">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
		<a class="navbar-brand" href="<?php echo site_url();?>"><?php echo $this->config->item('company_name');?></a>
		
	</div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php if(isset($this->categories[0])):?>
		<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo lang('catalog');?> <b class="caret"></b></a>
			<ul class="dropdown-menu">
				<?php foreach($this->categories[0] as $cat_menu):?>
						<li <?php echo $cat_menu->active ? 'class="active"' : false; ?>><a href="<?php echo site_url($cat_menu->slug);?>"><?php echo $cat_menu->name;?></a></li>
				<?php endforeach;?>
			</ul>
		</li>	
		<?php
		endif;
		
		if(isset($this->pages[0]))
		{
			foreach($this->pages[0] as $menu_page):?>
				<li>
					<?php if(empty($menu_page->content)):?>
					<a href="<?php echo $menu_page->url;?>" <?php if($menu_page->new_window ==1){echo 'target="_blank"';} ?>><?php echo $menu_page->menu_title;?></a>
					<?php else:?>
					<a href="<?php echo site_url($menu_page->slug);?>"><?php echo $menu_page->menu_title;?></a>
					<?php endif;?>
				</li>	
			<?php endforeach;	
		}
		?>
      </ul>
    </div>
  </div>
</nav>

<div class="banner-image">
	<div class="col-lg-4 test"></div>
	<div class="col-lg-4 test"></div>
	<div class="col-lg-4 test"></div>
	<div class="col-lg-12 test"></div>
</div>

<div class="container">
<div class="row">
		<div class="col-lg-4">
			<p>
				<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint obcaecati ipsa nam ducimus incidunt cumque dicta molestias laboriosam minus fugit. Aut, quos hic corporis ad ipsum provident tenetur nam recusandae.</span>
				<span>Fuga, quaerat, corporis totam ipsum tempore placeat laboriosam perferendis blanditiis! Nostrum, voluptate, dolorum similique aperiam cumque nesciunt modi nulla commodi quia officiis corporis excepturi cupiditate optio nam delectus ipsa iure!</span>
				<span>Ducimus, quis, quaerat obcaecati provident esse deleniti ab incidunt ad ipsum voluptates nemo accusantium numquam tempora optio enim error ex. Vel, suscipit corporis doloribus sunt quia est ipsa mollitia reprehenderit.</span>
			</p>
		</div>
		<div class="col-lg-4">
			<p>
				<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint obcaecati ipsa nam ducimus incidunt cumque dicta molestias laboriosam minus fugit. Aut, quos hic corporis ad ipsum provident tenetur nam recusandae.</span>
				<span>Fuga, quaerat, corporis totam ipsum tempore placeat laboriosam perferendis blanditiis! Nostrum, voluptate, dolorum similique aperiam cumque nesciunt modi nulla commodi quia officiis corporis excepturi cupiditate optio nam delectus ipsa iure!</span>
				<span>Ducimus, quis, quaerat obcaecati provident esse deleniti ab incidunt ad ipsum voluptates nemo accusantium numquam tempora optio enim error ex. Vel, suscipit corporis doloribus sunt quia est ipsa mollitia reprehenderit.</span>
			</p>
		</div>
		<div class="col-lg-4">
			<p>
				<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint obcaecati ipsa nam ducimus incidunt cumque dicta molestias laboriosam minus fugit. Aut, quos hic corporis ad ipsum provident tenetur nam recusandae.</span>
				<span>Fuga, quaerat, corporis totam ipsum tempore placeat laboriosam perferendis blanditiis! Nostrum, voluptate, dolorum similique aperiam cumque nesciunt modi nulla commodi quia officiis corporis excepturi cupiditate optio nam delectus ipsa iure!</span>
				<span>Ducimus, quis, quaerat obcaecati provident esse deleniti ab incidunt ad ipsum voluptates nemo accusantium numquam tempora optio enim error ex. Vel, suscipit corporis doloribus sunt quia est ipsa mollitia reprehenderit.</span>
			</p>
		</div>
</div>
</div>

<div class="row">
    <div class="span12">
        <?php $this->banners->show_collection(1, 5);?>
    </div>
</div>

<?php $this->banners->show_collection(2, 3, '3_box_row');?>