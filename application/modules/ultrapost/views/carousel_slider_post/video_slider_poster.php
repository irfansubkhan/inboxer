<?php 
	$this->load->view("include/upload_js"); 

	$image_upload_limit = 1; 
	if($this->config->item('facebook_poster_image_upload_limit') != '')
	$image_upload_limit = $this->config->item('facebook_poster_image_upload_limit'); 

	$video_upload_limit = 10; 
	if($this->config->item('facebook_poster_video_upload_limit') != '')
	$video_upload_limit = $this->config->item('facebook_poster_video_upload_limit');
?>

<style type="text/css">
	::placeholder {
	  color: white !important;
	}
</style>

<div class="row padding-20">
	<div class="col-xs-12 col-md-10 col-md-offset-1 padding-5">
		<div class="box box-primary">
			<div class="box-header ui-sortable-handle" style="cursor: move;">
				<i class="fa fa-paper-plane "></i>
				<h3 class="box-title"><?php echo $this->lang->line('Video Slide Show/Carousel Poster'); ?></h3>
				<!-- tools box -->
				<div class="pull-right box-tools"></div><!-- /. tools -->
			</div>
			<div class="box-body">
				<a href="#" id="slider_post" class="post_type active"><i class="fa fa-file-image-o"></i> <span class="hidden-xs" title="Slider Poster"><?php echo $this->lang->line('Carousel'); ?></span></a>
				<a href="#" id="video_post" class="post_type"><i class="fa fa-video-camera"></i> <span class="hidden-xs" title="Video Poster"><?php echo $this->lang->line('Video Slide Show'); ?></span></a>
				<br/><br/><br/>
				<form action="#" enctype="multipart/form-data" id="video_slider_form" method="post">
					<div class="form-group">
						<label><?php echo $this->lang->line('Campaign Name'); ?></label>
						<input class="form-control" name="campaign_name" id="campaign_name" />
					</div>
					<div id="video_block">
						<div class="form-group">
							<label><?php echo $this->lang->line('Message'); ?></label>
							<textarea class="form-control" name="video_message" id="video_message" placeholder="<?php echo $this->lang->line('Type your message here...'); ?>"></textarea>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group">
									<label><?php echo $this->lang->line('Image Duration (second)'); ?></label>
									<select class="form-control" id="video_image_duration" name="video_image_duration">	
										<option value="1"><?php echo $this->lang->line('1 sec'); ?></option>						
										<option value="2"><?php echo $this->lang->line('2 sec'); ?></option>						
										<option value="3"><?php echo $this->lang->line('3 sec'); ?></option>						
										<option value="4"><?php echo $this->lang->line('4 sec'); ?></option>						
										<option value="5"><?php echo $this->lang->line('5 sec'); ?></option>						
									</select>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group">
									<label><?php echo $this->lang->line('Transition Duration (second)'); ?></label>
									<select class="form-control" id="video_image_transition_duration" name="video_image_transition_duration">	
										<option value="1"><?php echo $this->lang->line('1 sec'); ?></option>						
										<option value="2"><?php echo $this->lang->line('2 sec'); ?></option>						
										<option value="3"><?php echo $this->lang->line('3 sec'); ?></option>						
										<option value="4"><?php echo $this->lang->line('4 sec'); ?></option>						
										<option value="5"><?php echo $this->lang->line('5 sec'); ?></option>						
									</select>
								</div>
							</div>
						</div>
						<div class="row" id="video_image_div_1">
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group">
									<label><?php echo $this->lang->line('Upload Image'); ?></label>
									<div id="video_images_1"><?php echo $this->lang->line('Upload'); ?></div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group">
									<label><?php echo $this->lang->line('Image Link'); ?></label>
									<input type="text" class="form-control" name="video_image_link_1" id="video_image_link_1" placeholder="<?php echo $this->lang->line('Type image link here...'); ?>" />
								</div>
							</div>
						</div>

						<div class="row" id="video_image_div_2" style="display: none;">
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group">
									<label><?php echo $this->lang->line('Upload Image'); ?></label>
									<div id="video_images_2"><?php echo $this->lang->line('Upload'); ?></div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group">
									<label><?php echo $this->lang->line('Image Link'); ?></label>
									<input type="text" class="form-control" name="video_image_link_2" id="video_image_link_2" placeholder="<?php echo $this->lang->line('Type image link here...'); ?>" />
								</div>
							</div>
						</div>

						<div class="row" id="video_image_div_3" style="display: none;">
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group">
									<label><?php echo $this->lang->line('Upload Image'); ?></label>
									<div id="video_images_3"><?php echo $this->lang->line('Upload'); ?></div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group">
									<label><?php echo $this->lang->line('Image Link'); ?></label>
									<input type="text" class="form-control" name="video_image_link_3" id="video_image_link_3" placeholder="<?php echo $this->lang->line('Type image link here...'); ?>" />
								</div>
							</div>
						</div>

						<div class="row" id="video_image_div_4" style="display: none;">
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group">
									<label><?php echo $this->lang->line('Upload Image'); ?></label>
									<div id="video_images_4"><?php echo $this->lang->line('Upload'); ?></div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group">
									<label><?php echo $this->lang->line('Image Link'); ?></label>
									<input type="text" class="form-control" name="video_image_link_4" id="video_image_link_4" placeholder="<?php echo $this->lang->line('Type image link here...'); ?>" />
								</div>
							</div>
						</div>

						<div class="row" id="video_image_div_5" style="display: none;">
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group">
									<label><?php echo $this->lang->line('Upload Image'); ?></label>
									<div id="video_images_5"><?php echo $this->lang->line('Upload'); ?></div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group">
									<label><?php echo $this->lang->line('Image Link'); ?></label>
									<input type="text" class="form-control" name="video_image_link_5" id="video_image_link_5" placeholder="<?php echo $this->lang->line('Type image link here...'); ?>" />
								</div>
							</div>
						</div>

						<div class="row" id="video_image_div_6" style="display: none;">
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group">
									<label><?php echo $this->lang->line('Upload Image'); ?></label>
									<div id="video_images_6"><?php echo $this->lang->line('Upload'); ?></div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group">
									<label><?php echo $this->lang->line('Image Link'); ?></label>
									<input type="text" class="form-control" name="video_image_link_6" id="video_image_link_6" placeholder="<?php echo $this->lang->line('Type image link here...'); ?>" />
								</div>
							</div>
						</div>


						<div class="row" id="video_image_div_7" style="display: none;">
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group">
									<label><?php echo $this->lang->line('Upload Image'); ?></label>
									<div id="video_images_7"><?php echo $this->lang->line('Upload'); ?></div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group">
									<label><?php echo $this->lang->line('Image Link'); ?></label>
									<input type="text" class="form-control" name="video_image_link_7" id="video_image_link_7" placeholder="<?php echo $this->lang->line('Type image link here...'); ?>" />
								</div>
							</div>
						</div>

						<div class="clearfix">
							<p class="btn btn-outline-primary pull-right" id="add_more_video_image"><i class="fa fa-plus"></i> <?php echo $this->lang->line('Add More Image'); ?></p>
						</div>

						<div class="form-group" style="display: none;">
							 <?php 
							 	$facebook_rx_fb_user_info_id=isset($fb_user_info[0]["id"]) ? $fb_user_info[0]["id"] : 0; 
							 	$facebook_rx_fb_user_info_name=isset($fb_user_info[0]["name"]) ? $fb_user_info[0]["name"] : ""; 
							 	$facebook_rx_fb_user_info_access_token=isset($fb_user_info[0]["access_token"]) ? $fb_user_info[0]["access_token"] : ""; 
							 ?>
							<label><?php echo $this->lang->line('Post to timeline/pages'); ?></label><br/>
							<input name="post_to_profile" value="<?php echo $facebook_rx_fb_user_info_id;?>" id="post_to_profile_yes"  type="radio"> <?php echo $this->lang->line('Post to timeline'); ?> (<?php echo $facebook_rx_fb_user_info_name;?>) &nbsp;&nbsp;
							<input name="post_to_profile" value="No" id="post_to_profile_no" type="radio" checked> <?php echo $this->lang->line('No, don\'t post'); ?>
						</div>

					</div>

					<div id="slider_block">
						<div id="slider_content">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6">
									<div class="form-group">
										<label><?php echo $this->lang->line('Message'); ?></label>
										<textarea class="form-control" name="slider_message" id="slider_message" placeholder="<?php echo $this->lang->line('Type your status here...'); ?>"></textarea>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6">
									<div class="form-group">
										<label><?php echo $this->lang->line('Slider Link'); ?></label>
										<input type="text" class="form-control" name="slider_link" id="slider_link" placeholder="<?php echo $this->lang->line('Type link here...'); ?>" />
									</div>
								</div>
							</div>
													
							<div style="border: 1px solid #ccc;" class="well">
								<legend><?php echo $this->lang->line('Slider Content 1:'); ?></legend>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label><?php echo $this->lang->line('Title'); ?></label>
											<input type="text" class="form-control" name="post_title_1" id="post_title_1" placeholder="<?php echo $this->lang->line('Type your post title here...'); ?>" />
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label><?php echo $this->lang->line('Link'); ?></label>
											<input type="text" class="form-control" name="post_link_1" id="post_link_1" placeholder="<?php echo $this->lang->line('Type link here...'); ?>" />
										</div>
									</div>
								</div>								
								<div class="row">									
									<div class="col-xs-12">
										<div class="form-group">
											<label><?php echo $this->lang->line('Description'); ?></label>
											<textarea class="form-control" name="post_description_1" id="post_description_1" placeholder="<?php echo $this->lang->line('Type your description here...'); ?>"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label><?php echo $this->lang->line('Upload image'); ?></label>
											<div id="post_image_1"><?php echo $this->lang->line('Upload'); ?></div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label><?php echo $this->lang->line('Image Link'); ?></label>
											<input type="text" class="form-control" name="post_image_link_1" id="post_image_link_1" placeholder="<?php echo $this->lang->line('Type image link here...'); ?>" />
										</div>
									</div>
								</div>								
							</div>

							<div style="border: 1px solid #ccc;display: none;" class="well" id="slider_conten_2">
								<legend><?php echo $this->lang->line('Slider Content 2:'); ?></legend>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label><?php echo $this->lang->line('Title'); ?></label>
											<input type="text" class="form-control" name="post_title_2" id="post_title_2" placeholder="<?php echo $this->lang->line('Type your post title here...'); ?>" />
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label><?php echo $this->lang->line('Link'); ?></label>
											<input type="text" class="form-control" name="post_link_2" id="post_link_2" placeholder="<?php echo $this->lang->line('Type link here...'); ?>" />
										</div>
									</div>
								</div>								
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label><?php echo $this->lang->line('Description'); ?></label>
											<textarea class="form-control" name="post_description_2" id="post_description_2" placeholder="<?php echo $this->lang->line('Type your description here...'); ?>"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label><?php echo $this->lang->line('Upload image'); ?></label>
											<div id="post_image_2"><?php echo $this->lang->line('Upload'); ?></div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label><?php echo $this->lang->line('Image Link'); ?></label>
											<input type="text" class="form-control" name="post_image_link_2" id="post_image_link_2" placeholder="<?php echo $this->lang->line('Type image link here...'); ?>" />
										</div>
									</div>
								</div>								
							</div>


							<div style="border: 1px solid #ccc;display: none;" class="well" id="slider_conten_3">
								<legend><?php echo $this->lang->line('Slider Content 3:'); ?></legend>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label><?php echo $this->lang->line('Title'); ?></label>
											<input type="text" class="form-control" name="post_title_3" id="post_title_3" placeholder="<?php echo $this->lang->line('Type your post title here...'); ?>" />
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label><?php echo $this->lang->line('Link'); ?></label>
											<input type="text" class="form-control" name="post_link_3" id="post_link_3" placeholder="<?php echo $this->lang->line('Type link here...'); ?>" />
										</div>
									</div>
								</div>								
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label><?php echo $this->lang->line('Description'); ?></label>
											<textarea class="form-control" name="post_description_3" id="post_description_3" placeholder="<?php echo $this->lang->line('Type your description here...'); ?>"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label><?php echo $this->lang->line('Upload image'); ?></label>
											<div id="post_image_3"><?php echo $this->lang->line('Upload'); ?></div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label><?php echo $this->lang->line('Image Link'); ?></label>
											<input type="text" class="form-control" name="post_image_link_3" id="post_image_link_3" placeholder="<?php echo $this->lang->line('Type image link here...'); ?>" />
										</div>
									</div>
								</div>								
							</div>


							<div style="border: 1px solid #ccc;display: none;" class="well" id="slider_conten_4">
								<legend><?php echo $this->lang->line('Slider Content 4:'); ?></legend>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label><?php echo $this->lang->line('Title'); ?></label>
											<input type="text" class="form-control" name="post_title_4" id="post_title_4" placeholder="<?php echo $this->lang->line('Type your post title here...'); ?>" />
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label><?php echo $this->lang->line('Link'); ?></label>
											<input type="text" class="form-control" name="post_link_4" id="post_link_4" placeholder="<?php echo $this->lang->line('Type link here...'); ?>" />
										</div>
									</div>
								</div>								
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label><?php echo $this->lang->line('Description'); ?></label>
											<textarea class="form-control" name="post_description_4" id="post_description_4" placeholder="<?php echo $this->lang->line('Type your description here...'); ?>"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label><?php echo $this->lang->line('Upload image'); ?></label>
											<div id="post_image_4"><?php echo $this->lang->line('Upload'); ?></div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label><?php echo $this->lang->line('Image Link'); ?></label>
											<input type="text" class="form-control" name="post_image_link_4" id="post_image_link_4" placeholder="<?php echo $this->lang->line('Type image link here...'); ?>" />
										</div>
									</div>
								</div>								
							</div>

							<div style="border: 1px solid #ccc;display: none;" class="well" id="slider_conten_5">
								<legend><?php echo $this->lang->line('Slider Content 5:'); ?></legend>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label><?php echo $this->lang->line('Title'); ?></label>
											<input type="text" class="form-control" name="post_title_5" id="post_title_5" placeholder="<?php echo $this->lang->line('Type your post title here...'); ?>" />
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label><?php echo $this->lang->line('Link'); ?></label>
											<input type="text" class="form-control" name="post_link_5" id="post_link_5" placeholder="<?php echo $this->lang->line('Type link here...'); ?>" />
										</div>
									</div>
								</div>								
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label><?php echo $this->lang->line('Description'); ?></label>
											<textarea class="form-control" name="post_description_5" id="post_description_5" placeholder="<?php echo $this->lang->line('Type your description here...'); ?>"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label><?php echo $this->lang->line('Upload image'); ?></label>
											<div id="post_image_5"><?php echo $this->lang->line('Upload'); ?></div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label><?php echo $this->lang->line('Image Link'); ?></label>
											<input type="text" class="form-control" name="post_image_link_5" id="post_image_link_5" placeholder="<?php echo $this->lang->line('Type image link here...'); ?>" />
										</div>
									</div>
								</div>								
							</div>



						</div>

						<div class="clearfix">
							<p class="btn btn-outline-primary pull-right" id="add_more"><i class="fa fa-plus"></i> <?php echo $this->lang->line('Add More Content'); ?></p>
						</div>						
					</div>
					<br/>

					<div class="form-group col-xs-12 col-md-6" style="padding: 0 1px 0 0 ;">
						<label><?php echo $this->lang->line('Post to pages'); ?></label>
						<select multiple="multiple"  class="form-control" id="post_to_pages" name="post_to_pages[]">	
						<?php
							foreach($fb_page_info as $key=>$val)
							{	
								$id=$val['id'];
								$page_name=$val['page_name'];
								echo "<option value='{$id}'>{$page_name}</option>";								
							}
						 ?>						
						</select>
					</div>	

					<div class="form-group col-xs-12 col-md-6" style="padding: 0;">
						<label><?php echo $this->lang->line('Auto Reply Template'); ?></label>
						<select  class="form-control" id="auto_reply_template" name="auto_reply_template">
						<?php
							echo "<option value='0'>{$this->lang->line('Please select a template')}</option>";
							foreach($auto_reply_template as $key=>$val)
							{
								$id=$val['id'];
								$group_name=$val['ultrapost_campaign_name'];
								echo "<option value='{$id}'>{$group_name}</option>";
							}
						 ?>
						</select>
					</div>
		
					
					<div class="clearfix"></div><br>
					<div class="form-group" style="margin-top: 80px;">
						<label><?php echo $this->lang->line('Schedule'); ?></label><br/>
						<input name="schedule_type" value="now" id="schedule_now" checked type="radio"> <?php echo $this->lang->line('Now'); ?> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
						<input name="schedule_type" value="later" id="schedule_later" type="radio"> <?php echo $this->lang->line('Later'); ?> 
					</div>

					<div class="form-group schedule_block_item col-xs-12 col-md-6">
						<label><?php echo $this->lang->line('Schedule time'); ?></label>
						<input placeholder="<?php echo $this->lang->line('Time'); ?>"  name="schedule_time" id="schedule_time" class="form-control datepicker" type="text"/>
					</div>

					<div class="form-group schedule_block_item col-xs-12 col-md-6">
						<label><?php echo $this->lang->line('Time zone'); ?></label>
						<?php
						$time_zone[''] = 'Please Select';
						echo form_dropdown('time_zone',$time_zone,$this->config->item('time_zone'),' class="form-control" id="time_zone" required'); 
						?>
					</div>		


					<input type="hidden" name="content_counter" id="content_counter" />
					<input type="hidden" name="video_content_counter" id="video_content_counter" />
					<input type="hidden" name="content_type" id="content_type" />
				</form>
			</div>
			<div class="box-footer clearfix">
				<button type="button" class="btn btn-primary pull-left btn-lg" submit_type="slider_submit" id="submit_post"><i class="fa fa-send"></i> <?php echo $this->lang->line('Submit Post'); ?> </button>
			</div>
		</div>
	</div>  <!-- end of col-6 left part -->
</div>


<script>
	$j("document").ready(function(){
	
	$j("#video_message, #slider_message").emojioneArea({
        	autocomplete: false,
			pickerPosition: "bottom",
			//hideSource: false,
     	 });
		 

		var base_url = "<?php echo base_url(); ?>";


		var content_counter = 1;
		$("#content_counter").val(content_counter);
		$("#add_more").click(function(){
			content_counter++;
			if(content_counter == 5)
				$("#add_more").hide();
			$("#content_counter").val(content_counter);

			$("#slider_conten_"+content_counter).show();

		});

		var today = new Date();
		var next_date = new Date(today.getFullYear(), today.getMonth() + 1, today.getDate());
		$j('.datepicker').datetimepicker({
			theme:'light',
			format:'Y-m-d H:i:s',
			formatDate:'Y-m-d H:i:s',
			minDate: today,
			maxDate: next_date
		})	

		$j("#post_to_pages").multipleSelect({
            filter: true,
            multiple: true
        });	

        $j("#post_to_groups").multipleSelect({
            filter: true,
            multiple: true
        });	 

        $j("#auto_like_this_post_by_pages").multipleSelect({
            filter: true,
            multiple: true
        });	

 		$j("#auto_share_this_post_by_pages").multipleSelect({
            filter: true,
            multiple: true
        });	

        $("#video_block,.auto_share_post_block_item,.auto_comment_block_item,.auto_reply_block_item,.schedule_block_item,.preview_video_block,.preview_img_block").hide();
 
        $(document.body).on('change','input[name=auto_share_post]',function(){    
        	if($("input[name=auto_share_post]:checked").val()=="1")
        	$(".auto_share_post_block_item").show();
        	else $(".auto_share_post_block_item").hide();
        });  

        $(document.body).on('change','input[name=auto_private_reply]',function(){    
        	if($("input[name=auto_private_reply]:checked").val()=="1")
        	$(".auto_reply_block_item").show();
        	else $(".auto_reply_block_item").hide();
        }); 

        $(document.body).on('change','input[name=schedule_type]',function(){    
        	if($("input[name=schedule_type]:checked").val()=="later")
        	$(".schedule_block_item").show();
        	else 
        	{
        		$("#schedule_time").val("");
        		$("#time_zone").val("");
        		$(".schedule_block_item").hide();
        	}
        }); 

        $(document.body).on('change','input[name=auto_comment]',function(){    
        	if($("input[name=auto_comment]:checked").val()=="1")
        	$(".auto_comment_block_item").show();
        	else $(".auto_comment_block_item").hide();
        });

		

        $(document.body).on('click','.post_type',function(){ 
  
        	var post_type=$(this).attr("id");
        	if(post_type=="video_post")
        	{
        		$("#slider_block").hide();
        		$("#video_block").show();
        		$('.post_type').removeClass("active");
        		$('#submit_post').attr("submit_type","video_submit");
        	}
        	else if(post_type=="slider_post")
        	{
        		$("#video_block").hide();
        		$("#slider_block").show();
        		$('.post_type').removeClass("active");
        		$('#submit_post').attr("submit_type","slider_submit");
        	}
        	$(this).addClass("active");
        });


        $("#submit_post").click(function(){

        	// var campaign_name = $("#campaign_name").val().trim();
        	// if(campaign_name == '')
        	// {
        	// 	alert("Campaign Name is required");
        	// 	return;
        	// }

        	var content_type = $(this).attr('submit_type');
        	$("#content_type").val(content_type);


        	if(content_type == 'slider_submit')
        	{
        		// var slider_message = $("#slider_message").val().trim();
        		// if(slider_message == ''){
        		// 	alert('Message is required for slider posting.');
        		// 	return;
        		// }

        		var image_link_counter = 0;

        		for(var i=1; i<=5; i++)
        		{
        			var slider_image_link = $("#post_image_link_"+i).val().trim();
        			if(slider_image_link != '')
        				image_link_counter++;
        		}

        		if(image_link_counter < 2)
        		{
        			alertify.alert('<?php echo $this->lang->line("Alert");?>',"<?php echo $this->lang->line('Please provide atleast two images and corresponding information.'); ?>",function(){ });
	        		return;
        		}
        	}
        	else
        	{
        		// var video_message = $("#video_message").val().trim();
        		// if(video_message == ''){
        		// 	alert('Message is required for video posting.');
        		// 	return;
        		// }

        		var video_image_counter = 0;

        		for(var i=1; i<=7; i++)
        		{
        			var video_image_link = $("#video_image_link_"+i).val().trim();
        			if(video_image_link != '')
        				video_image_counter++;
        		}

        		if(video_image_counter < 3)
        		{
        			alertify.alert('<?php echo $this->lang->line("Alert");?>',"<?php echo $this->lang->line('Please provide atleast three images and corresponding information.'); ?>",function(){ });
	        		return;
        		}

        	}

        	var post_to_profile = $("input[name=post_to_profile]:checked").val();
        	var post_to_pages = $("#post_to_pages").val();
        	if(post_to_pages==null)
        	{
        		alertify.alert('<?php echo $this->lang->line("Alert");?>',"<?php echo $this->lang->line('Please select pages to publish this post.'); ?>",function(){ });
        		return;
        	}

        	var schedule_type = $("input[name=schedule_type]:checked").val();
        	var schedule_time = $("#schedule_time").val();
        	var time_zone = $("#time_zone").val();
        	if(schedule_type=='later' && (schedule_time=="" || time_zone==""))
        	{
        		alertify.alert('<?php echo $this->lang->line("Alert");?>',"<?php echo $this->lang->line('Please select schedule time/time zone.'); ?>",function(){ });
        		return;
        	}

        	$("#submit_post").html('<?php echo $this->lang->line("Processing..."); ?>');     	
        	$("#submit_post").addClass("disabled"); 
        	$("#slider_response_modal_content").removeClass("alert-danger");
        	$("#slider_response_modal_content").removeClass("alert-success");
        	var loading = '<img src="'+base_url+'assets/pre-loader/Fading squares2.gif" class="center-block">';
        	$("#slider_response_modal_content").html(loading);
        	$("#slider_response_modal").modal();

        	var queryString = new FormData($("#video_slider_form")[0]);
		    $.ajax({
		    	type:'POST' ,
		    	url: base_url+"ultrapost/carousel_slider_add_post_action",
		    	data: queryString,
		    	dataType : 'JSON',
		    	// async: false,
		    	cache: false,
		    	contentType: false,
		    	processData: false,
		    	success:function(response){
		    		// $('#response_show').html(response);
		    		$("#submit_post").removeClass("disabled");
		         	$("#submit_post").html('<i class="fa fa-send"></i> <?php echo $this->lang->line("Submit Post"); ?>');    

		         	if(response.status=="1")
			        {
			         	$("#slider_response_modal_content").removeClass("alert-danger");
			         	$("#slider_response_modal_content").addClass("alert-success");
			         	$("#slider_response_modal_content").html(response.message);
			        }
			        else
			        {
			         	$("#slider_response_modal_content").removeClass("alert-success");
			         	$("#slider_response_modal_content").addClass("alert-danger");
			         	$("#slider_response_modal_content").html(response.message);
			        }
		    	}

		    });
        });

		var image_upload_limit = "<?php echo $image_upload_limit; ?>";
		var video_upload_limit = "<?php echo $video_upload_limit; ?>";

        $("#post_image_1").uploadFile({
	        url:base_url+"ultrapost/carousel_slider_upload_image_only",
	        fileName:"myfile",
	        maxFileSize:image_upload_limit*1024*1024,
	        showPreview:false,
	        returnType: "json",
	        dragDrop: true,
	        showDelete: true,
	        multiple:false,
	        maxFileCount:1, 
	        acceptFiles:".png,.jpg,.jpeg",
	        deleteCallback: function (data, pd) {
	            var delete_url="<?php echo site_url('ultrapost/carousel_slider_delete_uploaded_file');?>";
                $.post(delete_url, {op: "delete",name: data},
                    function (resp,textStatus, jqXHR) {
                    	$("#post_image_link_1").val('');                    
                    });
	           
	         },
	         onSuccess:function(files,data,xhr,pd)
	           {
	               var data_modified = base_url+"upload_caster/carousel_slider/"+data;
	               $("#post_image_link_1").val(data_modified);		
	           }
	    });



	    $("#post_image_2").uploadFile({
	        url:base_url+"ultrapost/carousel_slider_upload_image_only",
	        fileName:"myfile",
	        maxFileSize:image_upload_limit*1024*1024,
	        showPreview:false,
	        returnType: "json",
	        dragDrop: true,
	        showDelete: true,
	        multiple:false,
	        maxFileCount:1, 
	        acceptFiles:".png,.jpg,.jpeg",
	        deleteCallback: function (data, pd) {
	            var delete_url="<?php echo site_url('ultrapost/carousel_slider_delete_uploaded_file');?>";
                $.post(delete_url, {op: "delete",name: data},
                    function (resp,textStatus, jqXHR) {
                    	$("#post_image_link_2").val('');                    
                    });
	           
	         },
	         onSuccess:function(files,data,xhr,pd)
	           {
	               var data_modified = base_url+"upload_caster/carousel_slider/"+data;
	               $("#post_image_link_2").val(data_modified);		
	           }
	    });


	    $("#post_image_3").uploadFile({
	        url:base_url+"ultrapost/carousel_slider_upload_image_only",
	        fileName:"myfile",
	        maxFileSize:image_upload_limit*1024*1024,
	        showPreview:false,
	        returnType: "json",
	        dragDrop: true,
	        showDelete: true,
	        multiple:false,
	        maxFileCount:1, 
	        acceptFiles:".png,.jpg,.jpeg",
	        deleteCallback: function (data, pd) {
	            var delete_url="<?php echo site_url('ultrapost/carousel_slider_delete_uploaded_file');?>";
                $.post(delete_url, {op: "delete",name: data},
                    function (resp,textStatus, jqXHR) {
                    	$("#post_image_link_3").val('');                    
                    });
	           
	         },
	         onSuccess:function(files,data,xhr,pd)
	           {
	               var data_modified = base_url+"upload_caster/carousel_slider/"+data;
	               $("#post_image_link_3").val(data_modified);		
	           }
	    });


	    $("#post_image_4").uploadFile({
	        url:base_url+"ultrapost/carousel_slider_upload_image_only",
	        fileName:"myfile",
	        maxFileSize:image_upload_limit*1024*1024,
	        showPreview:false,
	        returnType: "json",
	        dragDrop: true,
	        showDelete: true,
	        multiple:false,
	        maxFileCount:1, 
	        acceptFiles:".png,.jpg,.jpeg",
	        deleteCallback: function (data, pd) {
	            var delete_url="<?php echo site_url('ultrapost/carousel_slider_delete_uploaded_file');?>";
                $.post(delete_url, {op: "delete",name: data},
                    function (resp,textStatus, jqXHR) {
                    	$("#post_image_link_4").val('');                    
                    });
	           
	         },
	         onSuccess:function(files,data,xhr,pd)
	           {
	               var data_modified = base_url+"upload_caster/carousel_slider/"+data;
	               $("#post_image_link_4").val(data_modified);		
	           }
	    });


	    $("#post_image_5").uploadFile({
	        url:base_url+"ultrapost/carousel_slider_upload_image_only",
	        fileName:"myfile",
	        maxFileSize:image_upload_limit*1024*1024,
	        showPreview:false,
	        returnType: "json",
	        dragDrop: true,
	        showDelete: true,
	        multiple:false,
	        maxFileCount:1, 
	        acceptFiles:".png,.jpg,.jpeg",
	        deleteCallback: function (data, pd) {
	            var delete_url="<?php echo site_url('ultrapost/carousel_slider_delete_uploaded_file');?>";
                $.post(delete_url, {op: "delete",name: data},
                    function (resp,textStatus, jqXHR) {
                    	$("#post_image_link_5").val('');                    
                    });
	           
	         },
	         onSuccess:function(files,data,xhr,pd)
	           {
	               var data_modified = base_url+"upload_caster/carousel_slider/"+data;
	               $("#post_image_link_5").val(data_modified);		
	           }
	    });




	    var video_content_counter = 1;
		$("#video_content_counter").val(video_content_counter);
		$("#add_more_video_image").click(function(){
			video_content_counter++;
			if(video_content_counter == 7)
				$("#add_more_video_image").hide();
			$("#video_content_counter").val(video_content_counter);

			$("#video_image_div_"+video_content_counter).show();

		});



	    $("#video_images_1").uploadFile({
			url:base_url+"ultrapost/carousel_slider_upload_image_only",
			fileName:"myfile",
			maxFileSize:image_upload_limit*1024*1024,
			returnType: "json",
			dragDrop: true,
			showDelete: true,
			multiple:false,
	        maxFileCount:1,
			acceptFiles:".png,.jpg,.jpeg",
			deleteCallback: function (data, pd) {
	            var delete_url="<?php echo site_url('ultrapost/carousel_slider_delete_uploaded_file');?>";
                $.post(delete_url, {op: "delete",name: data},
                    function (resp,textStatus, jqXHR) { 
                    	$("#video_image_link_1").val("");                  
                    });
	           
	        },
	        onSuccess:function(files,data,xhr,pd)
	        {
	        	var data_modified = base_url+"upload_caster/carousel_slider/"+data;
	        	$("#video_image_link_1").val(data_modified);		
	        }

		});

		$("#video_images_2").uploadFile({
			url:base_url+"ultrapost/carousel_slider_upload_image_only",
			fileName:"myfile",
			maxFileSize:image_upload_limit*1024*1024,
			returnType: "json",
			dragDrop: true,
			showDelete: true,
			multiple:false,
	        maxFileCount:1,
			acceptFiles:".png,.jpg,.jpeg",
			deleteCallback: function (data, pd) {
	            var delete_url="<?php echo site_url('ultrapost/carousel_slider_delete_uploaded_file');?>";
                $.post(delete_url, {op: "delete",name: data},
                    function (resp,textStatus, jqXHR) { 
                    	$("#video_image_link_2").val("");                  
                    });
	           
	        },
	        onSuccess:function(files,data,xhr,pd)
	        {
	        	var data_modified = base_url+"upload_caster/carousel_slider/"+data;
	        	$("#video_image_link_2").val(data_modified);		
	        }

		});

		$("#video_images_3").uploadFile({
			url:base_url+"ultrapost/carousel_slider_upload_image_only",
			fileName:"myfile",
			maxFileSize:image_upload_limit*1024*1024,
			returnType: "json",
			dragDrop: true,
			showDelete: true,
			multiple:false,
	        maxFileCount:1,
			acceptFiles:".png,.jpg,.jpeg",
			deleteCallback: function (data, pd) {
	            var delete_url="<?php echo site_url('ultrapost/carousel_slider_delete_uploaded_file');?>";
                $.post(delete_url, {op: "delete",name: data},
                    function (resp,textStatus, jqXHR) { 
                    	$("#video_image_link_3").val("");                  
                    });
	           
	        },
	        onSuccess:function(files,data,xhr,pd)
	        {
	        	var data_modified = base_url+"upload_caster/carousel_slider/"+data;
	        	$("#video_image_link_3").val(data_modified);		
	        }

		});

		$("#video_images_4").uploadFile({
			url:base_url+"ultrapost/carousel_slider_upload_image_only",
			fileName:"myfile",
			maxFileSize:image_upload_limit*1024*1024,
			returnType: "json",
			dragDrop: true,
			showDelete: true,
			multiple:false,
	        maxFileCount:1,
			acceptFiles:".png,.jpg,.jpeg",
			deleteCallback: function (data, pd) {
	            var delete_url="<?php echo site_url('ultrapost/carousel_slider_delete_uploaded_file');?>";
                $.post(delete_url, {op: "delete",name: data},
                    function (resp,textStatus, jqXHR) { 
                    	$("#video_image_link_4").val("");                  
                    });
	           
	        },
	        onSuccess:function(files,data,xhr,pd)
	        {
	        	var data_modified = base_url+"upload_caster/carousel_slider/"+data;
	        	$("#video_image_link_4").val(data_modified);		
	        }

		});

		$("#video_images_5").uploadFile({
			url:base_url+"ultrapost/carousel_slider_upload_image_only",
			fileName:"myfile",
			maxFileSize:image_upload_limit*1024*1024,
			returnType: "json",
			dragDrop: true,
			showDelete: true,
			multiple:false,
	        maxFileCount:1,
			acceptFiles:".png,.jpg,.jpeg",
			deleteCallback: function (data, pd) {
	            var delete_url="<?php echo site_url('ultrapost/carousel_slider_delete_uploaded_file');?>";
                $.post(delete_url, {op: "delete",name: data},
                    function (resp,textStatus, jqXHR) { 
                    	$("#video_image_link_5").val("");                  
                    });
	           
	        },
	        onSuccess:function(files,data,xhr,pd)
	        {
	        	var data_modified = base_url+"upload_caster/carousel_slider/"+data;
	        	$("#video_image_link_5").val(data_modified);		
	        }

		});

		$("#video_images_6").uploadFile({
			url:base_url+"ultrapost/carousel_slider_upload_image_only",
			fileName:"myfile",
			maxFileSize:image_upload_limit*1024*1024,
			returnType: "json",
			dragDrop: true,
			showDelete: true,
			multiple:false,
	        maxFileCount:1,
			acceptFiles:".png,.jpg,.jpeg",
			deleteCallback: function (data, pd) {
	            var delete_url="<?php echo site_url('ultrapost/carousel_slider_delete_uploaded_file');?>";
                $.post(delete_url, {op: "delete",name: data},
                    function (resp,textStatus, jqXHR) { 
                    	$("#video_image_link_6").val("");                  
                    });
	           
	        },
	        onSuccess:function(files,data,xhr,pd)
	        {
	        	var data_modified = base_url+"upload_caster/carousel_slider/"+data;
	        	$("#video_image_link_6").val(data_modified);		
	        }

		});

		$("#video_images_7").uploadFile({
			url:base_url+"ultrapost/carousel_slider_upload_image_only",
			fileName:"myfile",
			maxFileSize:image_upload_limit*1024*1024,
			returnType: "json",
			dragDrop: true,
			showDelete: true,
			multiple:false,
	        maxFileCount:1,
			acceptFiles:".png,.jpg,.jpeg",
			deleteCallback: function (data, pd) {
	            var delete_url="<?php echo site_url('ultrapost/carousel_slider_delete_uploaded_file');?>";
                $.post(delete_url, {op: "delete",name: data},
                    function (resp,textStatus, jqXHR) { 
                    	$("#video_image_link_7").val("");                  
                    });
	           
	        },
	        onSuccess:function(files,data,xhr,pd)
	        {
	        	var data_modified = base_url+"upload_caster/carousel_slider/"+data;
	        	$("#video_image_link_7").val(data_modified);		
	        }

		});
	

       	
    });
</script>


<div class="modal fade" id="slider_response_modal" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $this->lang->line('Auto Post Campaign Status'); ?></h4>
			</div>
			<div class="modal-body">
				<div class="alert text-center" id="slider_response_modal_content">
					
				</div>
			</div>
		</div>
	</div>
</div>



<style type="text/css" media="screen">
	.padding-5{padding:5px;}
	.padding-20{padding:20px;}
	.box-body,.box-footer{padding:30px;}
	.box-header{padding-left: 30px;}
	.preview
	{
		font-family: helvetica,​arial,​sans-serif;
		padding: 20px;
	}
	.preview_cover_img
	{
		width:45px;
		height:45px;
		border: .5px solid #ccc;
	}
	.preview_page
	{
		padding-left: 7px;
		color: #365899;
		font-weight: 700;
		font-size: 14px;
		cursor: pointer;
	}
	.preview_page_sm
	{
		padding-left: 7px;
		padding-top: 7px;
		color: #9197a3;
		font-size: 13px;
		font-weight: 300;
		cursor: pointer;
	}
	.preview_img
	{
		width:100%;
		border: 1px solid #ccc;
		border-bottom: none;
		cursor: pointer;
	}	
	.demo_preview
	{
		width:100%;
		border-bottom: none;
		margin-top: 10px;
		cursor: pointer;
	}	
	.preview_og_info
	{
		border: 1px solid #ccc;
		box-shadow: 0px 0px 2px #ddd;
		-webkit-box-shadow: 0px 0px 2px #ddd;
		-moz-box-shadow: 0px 0px 2px #ddd;
		padding: 10px;
		cursor: pointer;

	}
	.preview_og_info_title
	{
		font-size: 23px;
		font-weight: 400;
		font-family: 'Times New Roman',helvetica,​arial;
		
	}
	.preview_og_info_desc
	{
		margin-top: 5px;
		font-size: 13px;
	}
	.preview_og_info_link
	{
		text-transform: uppercase;
		color: #9197a3;
		margin-top: 7px;
	}
	.post_type
	{
		padding: 10px 12px;
		border: 1px solid <?php echo $THEMECOLORCODE;?>;
		font-weight: bold;
		color: <?php echo $THEMECOLORCODE;?>;
		margin-right: 2px;
	}
	.post_type.active
	{
		background: <?php echo $THEMECOLORCODE;?>;
		color: #fff;
	}
	.ms-choice span
	{
		padding-top: 2px !important;
	}
	.hidden
	{
		display: none;
	}
	.well
	{
		background: #fafafa;
	}

	.content-wrapper{background: #fcfcfc;}
	.ajax-upload-dragdrop{width:100% !important;padding:0 !important;border:none !important;}
</style>