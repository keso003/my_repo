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
<div class="container">
<?php if(!empty($category->description)): ?>
<div class="row">
    <div class="col-lg-12"><?php echo $category->description; ?></div>
</div>
<?php endif; ?>

<div class="row">
    <?php
    $cols = 4;
    if(isset($category)):?>
        <?php if(isset($this->categories[$category->id] ) && count($this->categories[$category->id]) > 0): $cols=3; ?>
            <div class="col-lg-3">
                <ul class="nav nav-list well">
                    <li class="nav-header">
                    <?php echo lang('subcategories'); ?>
                    </li>
            
                    <?php foreach($this->categories[$category->id] as $subcategory):?>
                        <li><a href="<?php echo site_url(implode('/', $base_url).'/'.$subcategory->slug); ?>"><?php echo $subcategory->name;?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
        
            <div class="col-lg-9">
        <?php endif;?>
    <?php endif;?>
    
    <?php if($cols == 4):?>
        <div class="col-lg-12">
    <?php endif;?>
    
    <?php if(count($products) == 0):?>
        <h2 style="margin:50px 0px; text-align:center;">
            <?php echo lang('no_products');?>
        </h2>
    <?php elseif(count($products) > 0):?>
        
        <div class="row" style="margin-top:20px; margin-bottom:15px">
            <div class="<?php echo ($cols == 4)?'col-lg-9':'col-lg-6';?>">
                <?php echo $this->pagination->create_links();?>&nbsp;
            </div>
            <div class="col-lg-3 pull-right">
                <select class="col-lg-12" id="sort_products" onchange="window.location='<?php echo site_url(uri_string());?>/'+$(this).val();">
                    <option value=''><?php echo lang('default');?></option>
                    <option<?php echo(!empty($_GET['by']) && $_GET['by']=='name/asc')?' selected="selected"':'';?> value="?by=name/asc"><?php echo lang('sort_by_name_asc');?></option>
                    <option<?php echo(!empty($_GET['by']) && $_GET['by']=='name/desc')?' selected="selected"':'';?>  value="?by=name/desc"><?php echo lang('sort_by_name_desc');?></option>
                    <option<?php echo(!empty($_GET['by']) && $_GET['by']=='price/asc')?' selected="selected"':'';?>  value="?by=price/asc"><?php echo lang('sort_by_price_asc');?></option>
                    <option<?php echo(!empty($_GET['by']) && $_GET['by']=='price/desc')?' selected="selected"':'';?>  value="?by=price/desc"><?php echo lang('sort_by_price_desc');?></option>
                </select>
            </div>
        </div>

        <div class="category_container">
            <?php
            
            $itm_cnt = 1;
            foreach($products as $product):
                if($itm_cnt == 1):?>
                    <div class="row">
                <?php endif;?>

                <div class="col-lg-3 product">
                    <div>
                        <?php
                        $photo  = theme_img('no_picture.png', lang('no_image_available'));
                        $product->images    = array_values($product->images);
            
                        if(!empty($product->images[0]))
                        {
                            $primary    = $product->images[0];
                            foreach($product->images as $photo)
                            {
                                if(isset($photo->primary))
                                {
                                    $primary    = $photo;
                                }
                            }

                            $photo  = '<img src="'.base_url('uploads/images/thumbnails/'.$primary->filename).'" alt="'.$product->seo_title.'"/>';
                        }
                        ?>
                        <div class="product-image">
                            <a class="thumbnail" href="<?php echo site_url(implode('/', $base_url).'/'.$product->slug); ?>">
                                <?php echo $photo; ?>
                            </a>
                        </div>
                        <h5 style="margin-top:5px;">
                            <a href="<?php echo site_url(implode('/', $base_url).'/'.$product->slug); ?>"><?php echo $product->name;?></a>
                            <?php if($this->session->userdata('admin')): ?>
                                <a class="btn btn-default btn-sm" title="<?php echo lang('edit_product'); ?>" href="<?php echo  site_url($this->config->item('admin_folder').'/products/form/'.$product->id); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                            <?php endif; ?>
                        </h5>

                        <?php if($product->excerpt != ''): ?>
                            <div class="excerpt"><?php echo $product->excerpt; ?></div>
                        <?php endif; ?>
                    
                        <div>
                            <?php if($product->saleprice > 0):?>
                                <span class="price-slash"><?php echo lang('product_reg');?> <?php echo format_currency($product->price); ?></span>
                                <span class="price-sale"><?php echo lang('product_sale');?> <?php echo format_currency($product->saleprice); ?></span>
                            <?php else: ?>
                                <span class="price-reg"><?php echo lang('product_price');?> <?php echo format_currency($product->price); ?></span>
                            <?php endif; ?>
                        </div>
                    
                        <?php if((bool)$product->track_stock && $product->quantity < 1 && config_item('inventory_enabled')) { ?>
                            <div class="stock_msg"><?php echo lang('out_of_stock');?></div>
                        <?php } ?>
                    </div>
                </div>
                <?php if($itm_cnt == $cols) {
                    $itm_cnt = 1;
                    echo '</div>';
                }
                else
                {
                    $itm_cnt++;
                }?>
            <?php endforeach; ?>
            <?php if($itm_cnt != 1){
                echo '</div>';
            }?>
        </div>
    <?php endif;?>
    </div>
</div>
</div>