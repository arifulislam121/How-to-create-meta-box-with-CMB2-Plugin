<?php 



/****************************************************/
/*How to install & use CMB2 Metabox plugin*/
/***************************************************/

/***********


1.Download CMB2 Metabox plugin from wordpress.org
2.create new folder in your Wordpress theme (white folder name metabox) & then past all CMB2 file in Meatbox folder
3.then create new functions.php file in metabox folder
4.and then include (init.php,functions.php) in your theme functions.php 

example:
require_once('metabox/init.php');
require_once('metabox/functions.php');

5.//-----(include all below code in metabox functions.php)------------------



***********/




//-----(include all below code in metabox functions.php)------------------

function amra_metabox_banabo(array $ourmetabox){
	
	
	$prefix="_fiftin_";//create veriable for  remove from custom field list
	
	$ourmetabox[]= array(
			'id'=>'first-selection',
			'title'=>'what is this post all about?',
			'object_types'=>array('post'),
			'fields'=>array(
				array(
					'name'=>'type your opinion',
					'type'=>'text',
					'id'=>$prefix.'opinion',
					'default'=>'write your opinion here'
					
				),
				array(
					'name'=>'type your opinion2',
					'type'=>'text_small',
					'id'=>$prefix.'opinion2',
					'default'=>'write your opinion2 here'
					
				),
				array(
					'name'=>'type your email address',
					'type'=>'text_email',
					'id'=>$prefix.'email',
					'default'=>'write your email here'
					
				),
				array(
					'name'=>'type your currency',
					'type'=>'text_money',
					'id'=>$prefix.'your_currency',
					'before_field'=>'7',//change your currency icon code line------
					'default'=>'write your currency here'
					
				),
				array(
					'name'=>'type your address',
					'type'=>'textarea',
					'id'=>$prefix.'your_address',
					'default'=>'write your adress here'
					
				),
				array(
					'name'=>'select your date',
					'type'=>'text_date',
					'id'=>$prefix.'your_date',
								
					
				),
				array(
					'name'=>'select your time',
					'type'=>'text_time',
					'id'=>$prefix.'your_time',					
					
				),
				array(
					'name'=>'select your timezome',
					'type'=>'select_timezone',
					'id'=>$prefix.'your_timezone',					
					
				),
				array(
					'name'=>'select your color',
					'type'=>'colorpicker',
					'id'=>$prefix.'your_color',					
					
				),
				array(
					'name'=>'select your gender',
					'type'=>'radio',
					'id'=>$prefix.'your_gender',					
					'options'=>array(
						'male'=>'Male',
						'female'=>'Female'
					
					),
					'default'=>'female'
				),
				
				array(
					'name'=>'show your textnomy item',
					'type'=>'taxonomy_radio',
					'id'=>$prefix.'your_categoryy',	///no working this item code				
					'taxonomy'=>'category',
					'default'=>'1'
				),
					array(
					'name'=>'select your item',
					'type'=>'select',
					'id'=>$prefix.'your_selection2',	
					'options'=>array(
						'one'=>'first',
						'two'=>'second',
						'three'=>'third',
						'four'=>'fourth',
						'six'=>'fifth'
					)
				),
					array(
					'name'=>'select your tag',
					'type'=>'taxonomy_select',
					'id'=>$prefix.'your_tagselect',		///no working this item code
					'taxonomy'=>'post_tag'
				),
					
			array(
					'name'=>'select your favourite foods',
					'type'=>'multicheck',
					'id'=>$prefix.'your_foods',	
					'options'=>array(
						'chocklet'=>'CHOCKLET',
						'cocacola'=>'COCACOLA',
						'milk'=>'MILK',
						'ponir'=>'PONIR'
					)
				),
			
				array(
					'name'=>'write content from here',
					'type'=>'wysiwyg',
					'id'=>$prefix.'your_content',
					'options'=>array(
						'textarea_rows'=>get_option('default_post_edit_rows',2)
					)
				),
				array(
					'name'=>'upload your image from here',
					'type'=>'file',
					'id'=>$prefix.'your_image',
				),
					array(
					'name'=>'upload your Galary image from here',
					'type'=>'file_list',
					'id'=>$prefix.'your_galaryimage',
				),
				
			)
	
	);
	
	
	return $ourmetabox;
}

add_filter('cmb2_meta_boxes','amra_metabox_banabo');


?>

<!--To show meata boxes keyword in any page.php---------
-------------------------------------------------------->
		
		
		<?php if(is_single()) :?>  <!---to show singlrpost----->
		
		
		<?php $prefix="_fiftin_";?> <!--variable create------->
		
			<h1><?php echo get_post_meta(get_the_ID(),$prefix.'opinion',true); ?></h1>
			<h1><?php echo get_post_meta(get_the_ID(),$prefix.'opinion2',true); ?></h1>
			<h1><?php echo get_post_meta(get_the_ID(),$prefix.'email',true); ?></h1>
			<h1><?php echo get_post_meta(get_the_ID(),$prefix.'your_money',true); ?></h1>
			<h1><?php echo get_post_meta(get_the_ID(),$prefix.'your_currency',true); ?></h1>
			<p><?php echo get_post_meta(get_the_ID(),$prefix.'your_address',true); ?></p>
			<p><?php echo get_post_meta(get_the_ID(),$prefix.'your_date',true); ?></p>
			<p><?php echo get_post_meta(get_the_ID(),$prefix.'your_time',true); ?></p>
			<p><?php echo get_post_meta(get_the_ID(),$prefix.'your_timezone',true); ?></p>
			<p style="color:<?php echo get_post_meta(get_the_ID(),$prefix.'your_color',true);?>">my color</p>
			<h2>I am :<?php echo get_post_meta(get_the_ID(),$prefix.'your_gender',true);?></h2>
			<h2>our category :<?php 
				$our_category=get_post_meta(get_the_ID(),$prefix.'your_categoryy',true);
				
				
				if($our_category[0]){
					echo get_the_category_by_id($our_category[0]);
					
				}
				else{
					
					
				}
			
			?>
			</h2>
			<h2>select options :<?php echo get_post_meta(get_the_ID(),$prefix.'your_selection2',true);?></h2>
			<h2>select tag :
			<?php 
				$something = get_post_meta(get_the_ID(),$prefix.'your_tagselect',true);
				
				$tagid = get_tag($something[0]);
				
				echo $tagid->name;
			
			?>
			</h2>
			
			<h1>our favourite foods:<?php 
			
			$foods= get_post_meta(get_the_ID(),$prefix.'your_foods',true);
			
			foreach($foods as $foodlist){
				
				echo '<br>'.$foodlist;
			}
			
			
			?>
			
			</h1>
			
			<h1><?php echo get_post_meta(get_the_ID(),$prefix.'your_content',true);?></h1>
			
			<h1>My profile picture:<br><img src="<?php echo get_post_meta(get_the_ID(),$prefix.'your_image',true);?>" alt="" /></h1>
			
			<h1>my Galary image:<br>
			
			<?php 
			
			$filelist= get_post_meta(get_the_ID(),$prefix.'your_galaryimage',true);
			
			
			echo "<ul>";
			foreach($filelist as $files){
				
				
				echo '<li><img src="'.$files.'" alt="" /></li>';
			}
			echo "</ul>";
			?>
			
			</h1>
			
			<?php endif;?>
	
			
			
		
			
<!----------------------------end----------------
------------------------------------------------->



