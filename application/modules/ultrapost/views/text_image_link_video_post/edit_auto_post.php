<?php 
	$this->load->view("include/upload_js");

	$image_upload_limit = 1; 
	if($this->config->item('facebook_poster_image_upload_limit') != '')
	$image_upload_limit = $this->config->item('facebook_poster_image_upload_limit'); 
	
	$video_upload_limit = 10; 
	if($this->config->item('facebook_poster_video_upload_limit') != '')
	$video_upload_limit = $this->config->item('facebook_poster_video_upload_limit');
?>

<img src="<?php echo base_url('assets/pre-loader/Fading squares2.gif');?>" class="center-block previewLoader" style="margin-top:20px;margin-bottom:10px;display:none">

<div class="row <d padding-20" style="padding-top: 5px;">
	<div class="col-xs-12 col-md-6 padding-5">
		<div class="box box-primary">
			<div class="box-header ui-sortable-handle" style="cursor: move;">
				<i class="fa fa-edit"></i>
				<h3 class="box-title"><?php echo $page_title ?></h3>
				<!-- tools box -->
				<div class="pull-right box-tools"></div><!-- /. tools -->
			</div>
			<div class="box-body">
				<a href="#" id="text_post" class="post_type"><i class="fa fa-dedent"></i> <span class="hidden-xs" title="Text"><?php echo $this->lang->line("Text");?></span></a>
				<a href="#" id="link_post" class="post_type"><i class="fa fa-link"></i> <span class="hidden-xs" title="Link"><?php echo $this->lang->line("Link");?></span></a>
				<a href="#" id="image_post" class="post_type"><i class="fa fa-file-image-o "></i> <span class="hidden-xs" title="Image"><?php echo $this->lang->line("Image/Multi-Images");?></span></a>
				<a href="#" id="video_post" class="post_type"><i class="fa fa-video-camera"></i> <span class="hidden-xs" title="Video"><?php echo $this->lang->line("Video");?></span></a>
				<div class="clearfix"></div>
				<br/><br/>
				<form action="#" enctype="multipart/form-data" id="edit_poster_form" method="post">
					<input type="hidden" value="<?php echo $all_data[0]["id"];?>" name="id">
					<input type="hidden" value="<?php echo $all_data[0]["user_id"];?>" name="user_id">
					<input type="hidden" value="<?php echo $all_data[0]["facebook_rx_fb_user_info_id"];?>" name="facebook_rx_fb_user_info_id">
					<div class="form-group">
						<label><?php echo $this->lang->line("Campaign Name");?></label>
						<input type="input" class="form-control"  name="campaign_name" id="campaign_name" value="<?php if(set_value('campaign_name')) echo set_value('campaign_name');else {if(isset($all_data[0]['campaign_name'])) echo $all_data[0]['campaign_name'];}?>">
					</div>
					<div class="form-group">
						<label><?php echo $this->lang->line("Message");?></label>
						<textarea class="form-control" name="message" id="message"><?php if(isset($all_data[0]['message'])) echo $all_data[0]['message'];?></textarea>
					</div>

					<div id="link_block">
						<div class="form-group">
							<label><?php echo $this->lang->line("Paste link");?></label>
							<input class="form-control" name="link" id="link"  type="text" value="<?php if(set_value('link')) echo set_value('link');else {if(isset($all_data[0]['link'])) echo $all_data[0]['link'];}?>">
						</div>
						<!-- <div class="form-group">
							<label>Preview image URL</label>
							<input class="form-control" name="link_preview_image" id="link_preview_image" type="text" value="<?php if(set_value('link_preview_image')) echo set_value('link_preview_image');else {if(isset($all_data[0]['link_preview_image'])) echo $all_data[0]['link_preview_image'];}?>">
						</div>
						<div class="form-group">
                             <div id="link_preview_upload"><?php echo $this->lang->line('Upload');?></div>
                            <br/>
                        </div> -->
						<div class="form-group hidden">
							<label><?php echo $this->lang->line("Link caption");?></label>
							<input class="form-control" name="link_caption" id="link_caption" type="text">
						</div>
						<div class="form-group hidden">
							<label><?php echo $this->lang->line("Link description");?></label>
							<textarea class="form-control" name="link_description" id="link_description"></textarea>
						</div>
					</div>


					<div id="image_block">
						<div class="form-group">
							<label><?php echo $this->lang->line("Image URL");?></label>
							<input class="form-control" name="image_url" id="image_url" type="text" value="<?php if(set_value('image_url')) echo set_value('image_url');else {if(isset($all_data[0]['image_url'])) echo $all_data[0]['image_url'];}?>">
						</div>
						<div class="form-group">
                            <div id="image_url_upload"><?php echo $this->lang->line('Upload');?></div>
                        	<br/>
						</div>
					</div>

					<div id="video_block">
						<div class="form-group">
							<label><?php echo $this->lang->line("Video URL / Youtube Video URL");?></label>
							<input class="form-control" name="video_url" id="video_url" type="text" value="<?php if(set_value('video_url')) echo set_value('video_url');else {if(isset($all_data[0]['video_url'])) echo $all_data[0]['video_url'];}?>">
						</div>
						<div class="form-group">
                            <div id="video_url_upload"><?php echo $this->lang->line('Upload');?></div>
                            <br/>
                        </div>
						<div class="form-group">
							<label><?php echo $this->lang->line("Video thumbnail URL");?></label>
							<input class="form-control" name="video_thumb_url" id="video_thumb_url" type="text" value="<?php if(set_value('video_thumb_url')) echo set_value('video_thumb_url');else {if(isset($all_data[0]['video_thumb_url'])) echo $all_data[0]['video_thumb_url'];}?>">
						</div>
						<div class="form-group">
                            <div id="video_thumb_url_upload"><?php echo $this->lang->line('Upload');?></div>
                            <br/>
						</div>
					</div>



					<div class="form-group">
						 <?php
						 	$facebook_rx_fb_user_info_id=isset($fb_user_info[0]["id"]) ? $fb_user_info[0]["id"] : 0;
						 	$facebook_rx_fb_user_info_name=isset($fb_user_info[0]["name"]) ? $fb_user_info[0]["name"] : "";
						 	$facebook_rx_fb_user_info_access_token=isset($fb_user_info[0]["access_token"]) ? $fb_user_info[0]["access_token"] : "";

						 ?>
						<!-- <div class="alert alert-success">
  							<strong>Notifications!</strong> This campaign is Schedule on <?php echo $all_data[0]["page_or_group_or_user"];?>
						</div> -->
					</div>
					
					
					<div class="form-group col-xs-12 col-md-6" style="padding: 0 1px 0 0 ;">
						<label><?php echo $this->lang->line('Post to pages'); ?></label>
						<select multiple="multiple"  class="form-control" id="post_to_pages" name="post_to_pages[]">	
						<?php
							foreach($fb_page_info as $key=>$val)
							{	
								$id=$val['id'];
								$page_name=$val['page_name'];

								if($id == $all_data[0]['page_group_user_id'])
									echo "<option value='{$id}' selected>{$page_name}</option>";
								else
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
								if($id == $all_data[0]['ultrapost_auto_reply_table_id'])
									echo "<option value='{$id}' selected>{$group_name}</option>";
								else
									echo "<option value='{$id}'>{$group_name}</option>";
							}
						 ?>
						</select>
					</div>

					<div class="clearfix"></div><br>

					<div class="form-group">
						<label><?php echo $this->lang->line("Schedule");?></label><br/>
						<input name="schedule_type" value="later" id="schedule_later" checked type="radio"> <?php echo $this->lang->line("Later");?>
					</div>

					<div class="form-group schedule_block_item col-xs-12 col-md-6">
						<label><?php echo $this->lang->line("Schedule time");?></label>
						<input placeholder="Time"  name="schedule_time" id="schedule_time" class="form-control datepicker" type="text" value="<?php if(set_value('schedule_time')) echo set_value('schedule_time');else {if(isset($all_data[0]['schedule_time'])) echo $all_data[0]['schedule_time'];}?>"/>
					</div>

					<div class="form-group schedule_block_item col-xs-12 col-md-6">
						<label><?php echo $this->lang->line("Time zone");?></label>
						<?php
						$time_zone[''] = 'Please Select';
						echo form_dropdown('time_zone',$time_zone,$all_data[0]['time_zone'],' class="form-control" id="time_zone" required');
						?>
					</div>					

			</div>
			<div class="clearfix"></div>
			<div class="box-footer clearfix" style="text-align: left !important">
				<input type="hidden" name="submit_post_hidden" id="submit_post_hidden" value="<?php echo $all_data[0]["post_type"];?>">
				<button class="btn btn-primary btn-lg btn-block" submit_type="text_submit" id="submit_post" name="submit_post" type="button"><i class="fa fa-send"></i> <?php echo $this->lang->line("Submit Post");?></button>
			</div>
			</form>

		</div>
	</div>  <!-- end of col-6 left part -->

	<div class="col-xs-12 col-md-6 padding-5">
		<div class="box box-primary">
			<div class="box-header ui-sortable-handle" style="cursor: move;">
				<i class="fa fa-facebook-official"></i>
				<h3 class="box-title"><?php echo $this->lang->line("Preview");?></h3>
				<!-- tools box -->
				<div class="pull-right box-tools"></div><!-- /. tools -->
			</div>
			<div class="box-body preview">
				<?php $profile_picture="https://graph.facebook.com/me/picture?access_token={$facebook_rx_fb_user_info_access_token}&width=150&height=150"; ?>
				<img src="<?php echo $profile_picture;?>" class="preview_cover_img inline pull-left text-center" alt="X">
				<span class="preview_page"><?php echo $facebook_rx_fb_user_info_name;?></span><br/>
				<span class="preview_page_sm">Now <?php echo isset($app_info[0]['app_name']) ? $app_info[0]['app_name'] : $this->config->item("product_short_name");?></span><br/><br/>
				<span class="preview_message"><br/></span>

				<!-- <img src="<?php echo base_url('assets/images/demo_post.png');?>" class="demo_preview" alt="No Image Preview"> -->

				<div class="preview_video_block">
					<video controls="" width="100%" poster="" style="border:1px solid #ccc"><source  src=""></source></video>
					<br/>
					<div class="video_preview_og_info_desc inline-block">
					</div>
				</div>

				<div class="preview_img_block">
					<img src="<?php echo base_url('assets/images/demo_image.png');?>" class="preview_img" alt="No Image Preview">
					<div class="preview_og_info">
						<div class="preview_og_info_title inline-block"></div>
						<div class="preview_og_info_desc inline-block">
						</div>
						<div class="preview_og_info_link inline-block">
						</div>
					</div>
				</div>

				<div class="preview_only_img_block">
					<img src="<?php echo base_url('assets/images/demo_image.png');?>" class="only_preview_img" alt="No Image Preview">
				</div>



			</div>
		</div>
	</div> <!-- end of col-6 right part -->

</div>

<link href="<?php echo base_url('plugins/select_search/select2.css')?>" rel="stylesheet"/>
<script src="<?php echo base_url('plugins/select_search/select2.js')?>"></script>

<script>
	$j("document").ready(function(){
		setTimeout(function() {
			var auto_private_reply_con="<?php echo $all_data[0]["auto_private_reply"];?>";
			if(auto_private_reply_con == 1){
				$(".auto_reply_block_item").show();
			}else{
				$(".auto_reply_block_item").hide();
			}

			var auto_comment="<?php echo $all_data[0]["auto_comment"]?>";
			if(auto_comment == 1){
				$(".auto_comment_block_item").show();
			}else{
				$(".auto_comment_block_item").hide();
			}

			var auto_share_post="<?php echo $all_data[0]["auto_share_post"];?>";
			if(auto_share_post == 1){
				$(".auto_share_post_block_item").show();
			}else{
				$(".auto_share_post_block_item").hide();
			}

			var post_type="<?php echo $all_data[0]["post_type"];?>";
			if(post_type=="text_submit")
			{
				$("#text_post").click();
			}
			else if(post_type=="link_submit")
			{
				$("#link_post").click();
			}
			else if(post_type=="image_submit")
			{
				$("#image_post").click();
			}
			else
			{
			 	$("#video_post").click();
			}
			//$(".wait_few_seconds").hide();
		}, 1000);
	});
	
	
	$j("document").ready(function(){
	
		var emoji_message_div =	$j("#message").emojioneArea({
        	autocomplete: false,
			pickerPosition: "bottom",
			//hideSource: false,
     	 });
		 

		var base_url="<?php echo base_url();?>";

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

 		$j("#auto_share_this_post_by_pages").multipleSelect({
            filter: true,
            multiple: true
        });

        $("#link_block,#image_block,#video_block,.preview_video_block,.preview_img_block,.preview_only_img_block").hide();

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

         $(document.body).on('change','input[name=auto_comment]',function(){
        	if($("input[name=auto_comment]:checked").val()=="1")
        	$(".auto_comment_block_item").show();
        	else $(".auto_comment_block_item").hide();
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

        var message_pre=$("#message").val();
    	message_pre=message_pre.replace(/[\r\n]/g, "<br />");
    	if(message_pre!="")
    	{
    		message_pre=message_pre+"<br/><br/>";
    		$(".preview_message").html(message_pre);
    	}


        $(document.body).on('click','.post_type',function(){

        	var post_type=$(this).attr("id");
        	if(post_type=="text_post")
        	{
        		$("#link_block,#image_block,#video_block").hide();
        		$('.post_type').removeClass("active");
        		$('#submit_post').attr("submit_type","text_submit");
        		$('#submit_post_hidden').val("text_submit");
        		$(".preview_img_block").hide();
        		$(".preview_video_block").hide();
        		$(".preview_only_img_block").hide();
        		$(".demo_preview").hide();
        	}

        	else if(post_type=="link_post")
        	{
        		$("#image_block,#video_block").hide();
        		$("#link_block").show();
        		$('.post_type').removeClass("active")
        		$('#submit_post').attr("submit_type","link_submit");
        		$('#submit_post_hidden').val("link_submit");

        		$(".demo_preview").hide();
	    		$(".preview_video_block").hide();
	    		$(".preview_img_block").show();
	    		$(".preview_only_img_block").hide();

        		var link_pre=$("#link").val();

		    	if(link_pre!="")
		    	{
		    		$(".preview_og_info_link").html(link_pre);

		    	}
		    	var link_preview_image_pre=$("#link_preview_image").val();
		    	if(link_preview_image_pre!="")
		    	{
		    		$(".preview_img").attr("src",link_preview_image_pre);
		    	}
				var link_caption_pre=$("#link_caption").val();
		    	if(link_caption_pre!="")
		    	{
		    		$(".preview_og_info_title").html(link_caption_pre);
		    	}
		    	var link_description_pre=$("#link_description").val();
		    	if(link_description_pre!="")
		    	{
		    		$(".preview_og_info_desc").html(link_description_pre);
		    	}
				$("#link").blur();

        	}

        	else if(post_type=="image_post")
        	{
        		$("#link_block,#video_block").hide();
        		$("#image_block").show();
        		$('.post_type').removeClass("active");
        		$('#submit_post').attr("submit_type","image_submit");
        		$('#submit_post_hidden').val("image_submit");
        		$(".preview_img_block").hide();
        		$(".preview_video_block").hide();
        		$(".demo_preview").hide();
        		$(".preview_only_img_block").show();

        		var image_url_pre=$("#image_url").val();
		    	if(image_url_pre!="")
		    	{
		    		var image_url_array = image_url_pre.split(',');
		    		$(".only_preview_img").attr("src",image_url_array[0]);
		    	}
        	}
        	else if(post_type=="video_post")
        	{
        		$("#link_block,#image_block").hide();
        		$("#video_block").show();
        		$('.post_type').removeClass("active");
        		$('#submit_post').attr("submit_type","video_submit");
        		$('#submit_post_hidden').val("video_submit");
	    		$(".demo_preview").hide();
	    		$(".preview_img_block").hide();
	    		$(".preview_only_img_block").hide();
	    		$(".preview_video_block").show();
		    	var video_url_pre=$("#video_url").val();
		    	if(video_url_pre!="")
		    	{
		    		$(".previewLoader").show();
		    		var write_html='<video width="100%" height="auto" style="border:1px solid #ccc;" controls poster="'+$("#video_thumb_url").val()+'"><source src="'+video_url_pre+'">Your browser does not support the video tag.</video>';
		    		$(".preview_video_block").html(write_html);
		    		$(".previewLoader").hide();

		    	}

        	}
        	$(this).addClass("active");
        });


        $(document.body).on('blur','#link',function(){
            var link=$("#link").val();
            if(link=='') return;
            $(".previewLoader").show();
	        $.ajax({
	            type:'POST' ,
	            url:"<?php echo site_url();?>ultrapost/text_image_link_video_meta_info_grabber",
	            data:{link:link},
	            dataType:'JSON',
	            success:function(response){

	                $("#link_preview_image").val(response.image);
	                $(".preview_img").attr("src",response.image);

	                if(typeof(response.image)==='undefined' || response.image=="")
	                $(".preview_img").hide();
	                else $(".preview_img").show();

	                $("#link_caption").val(response.title);
	                $(".preview_og_info_title").html(response.title);

	                $("#link_description").val(response.description);
	                $(".preview_og_info_desc").html(response.description);

	                var link_author=link;
	                var link_author = link_author.replace("http://", "");
	                var link_author = link_author.replace("https://", "");
	                if(typeof(response.image)!='undefined' && response.author!=="") link_author=link_author+" | "+response.author;

	                $(".preview_og_info_link").html(link_author);

	                if(response.image==undefined || response.image=="")
	                $(".preview_img").hide();
	                else $(".preview_img").show();

	            	$(".preview_img_block").show();
	            	$(".previewLoader").hide();
	            }
	        });
        });
		
		function htmlspecialchars(str) {
			 if (typeof(str) == "string") {
			  str = str.replace(/&/g, "&amp;"); /* must do &amp; first */
			  str = str.replace(/"/g, "&quot;");
			  str = str.replace(/'/g, "&#039;");
			  str = str.replace(/</g, "&lt;");
			  str = str.replace(/>/g, "&gt;");
			  }
			 return str;
		}
		
		

         $(document.body).on('keyup','.emojionearea-editor',function(){
		
        	var message=$("#message").val();
			message=htmlspecialchars(message);
			message=message.replace(/[\r\n]/g, "<br />");
			
        	if(message!="")
        	{
        		message=message+"<br/><br/>";
        		$(".preview_message").html(message);
        		$(".demo_preview").hide();
        	}
        });
		
		

        $(document.body).on('blur','#link_preview_image',function(){
        	var link=$("#link_preview_image").val();
            $(".preview_img").attr("src",link).show();
        	$(".preview_img_block").show();
        });

        $(document.body).on('keyup','#link_caption',function(){
        	var link_caption=$("#link_caption").val();
			$(".preview_og_info_title").html(link_caption);
			$(".preview_img_block").show();
        });

        $(document.body).on('keyup','#link_description',function(){
        	var link_description=$("#link_description").val();
			$(".preview_og_info_desc").html(link_description);
			$(".preview_img_block").show();
        });


        $(document.body).on('blur','#image_url',function(){

	        var link=$("#image_url").val();
	        var image_url_array = link.split(',');
            $(".only_preview_img").css("border","1px solid #ccc");
            $(".only_preview_img").attr("src",image_url_array[0]);
        	$(".preview_only_img_block").show();

        });



        $(document.body).on('blur','#video_thumb_url',function(){
        	var link=$("#video_thumb_url").val();
	        if(link!='')
	        {
	            $(".previewLoader").show();
	            var write_html='<video width="100%" height="auto" style="border:1px solid #ccc;" controls poster="'+$("#video_thumb_url").val()+'"><source src="'+$("#video_url").val()+'">Your browser does not support the video tag.</video>';
	            $(".preview_video_block").html(write_html);
	            $(".previewLoader").hide();
	        }

        });


 		$(document.body).on('blur','#video_url',function(){
        	var link=$("#video_url").val();
	        if(link!='')
	        {
	            $(".previewLoader").show();
	            $.ajax({
	            type:'POST' ,
	            url:"<?php echo site_url();?>ultrapost/text_image_link_video_youtube_video_grabber",
	            data:{link:link},
	            success:function(response){
	               if(response!="")
	               {
	               	 	if(response=='fail')
	               	 	{
	               	 		alertify.alert('<?php echo $this->lang->line("Alert");?>',"<?php echo $this->lang->line('Video URL is invalid or this video is restricted from playback on certain sites.'); ?>",function(){ });
	               	 		$("#video_url").val("");
	               	 	}
	               	 	else
	               	 	{
	               	 		var write_html='<video width="100%" height="auto" style="border:1px solid #ccc;" controls poster="'+$("#video_thumb_url").val()+'"><source src="'+response+'">Your browser does not support the video tag.</video>';
	            			$(".preview_video_block").html(write_html);
	               	 	}
	               	 	$(".previewLoader").hide();
	               }
	            }
	        });




	        }

        });

 		var image_upload_limit = "<?php echo $image_upload_limit; ?>";
        var video_upload_limit = "<?php echo $video_upload_limit; ?>";
        
        var image_list = [];
        $("#image_url_upload").uploadFile({
	        url:base_url+"ultrapost/text_image_link_video_upload_image_only",
	        fileName:"myfile",
	        maxFileSize:image_upload_limit*1024*1024,
	        showPreview:false,
	        returnType: "json",
	        dragDrop: true,
	        showDelete: true,
	        multiple:true,
	        maxFileCount:5,
	        acceptFiles:".png,.jpg,.jpeg",
	        deleteCallback: function (data, pd) {
	            var delete_url="<?php echo site_url('ultrapost/text_image_link_video_delete_uploaded_file');?>";
                $.post(delete_url, {op: "delete",name: data},
                    function (resp,textStatus, jqXHR) {
                    	var item_to_delete = base_url+"upload_caster/text_image_link_video/"+data;
                    	image_list = image_list.filter(item => item !== item_to_delete);
                    	if(image_list.length > 0)
                    	$(".only_preview_img").attr("src",image_list[0]);
                    	else
                    	$(".only_preview_img").attr("src",'');
                    	$("#image_url").val(image_list.join());
                    });

	         },
	         onSuccess:function(files,data,xhr,pd)
	           {
	               var data_modified = base_url+"upload_caster/text_image_link_video/"+data;
	           	   image_list.push(data_modified);
	               $("#image_url").val(image_list.join());
	               $(".only_preview_img").attr("src",data_modified);
	           }
	    });


	    $("#link_preview_upload").uploadFile({
	        url:base_url+"ultrapost/text_image_link_video_upload_link_preview",
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
	            var delete_url="<?php echo site_url('ultrapost/text_image_link_video_delete_uploaded_file');?>";
                $.post(delete_url, {op: "delete",name: data},
                    function (resp,textStatus, jqXHR) {
                    });

	         },
	         onSuccess:function(files,data,xhr,pd)
	           {
	               var data_modified = base_url+"upload_caster/text_image_link_video/"+data;
	               $("#link_preview_image").val(data_modified);
	               $(".preview_img").attr("src",data_modified);
	           }
	    });

		$("#video_url_upload").uploadFile({
	        url:base_url+"ultrapost/text_image_link_video_upload_video",
	        fileName:"myfile",
	        maxFileSize:video_upload_limit*1024*1024,
	        showPreview:false,
	        returnType: "json",
	        dragDrop: true,
	        showDelete: true,
	        multiple:false,
	        maxFileCount:1,
	        acceptFiles:".3g2,.3gp,.3gpp,.asf,.avi,.dat,.divx,.dv,.f4v,.flv,.m2ts,.m4v,.mkv,.mod,.mov,.mp4,.mpe,.mpeg,.mpeg4,.mpg,.mts,.nsv,.ogm,.ogv,.qt,.tod,.ts,.vob,.wmv",
	        deleteCallback: function (data, pd) {
	            var delete_url="<?php echo site_url('ultrapost/text_image_link_video_delete_uploaded_file');?>";
                $.post(delete_url, {op: "delete",name: data},
                    function (resp,textStatus, jqXHR) {
                    });

	         },
	         onSuccess:function(files,data,xhr,pd)
	           {
	               var data_modified = base_url+"upload_caster/text_image_link_video/"+data;
	               var write_html='<video width="100%" height="auto" style="border:1px solid #ccc;" controls poster="'+$("#video_thumb_url").val()+'"><source src="'+data_modified+'">Your browser does not support the video tag.</video>';
	               $(".preview_video_block").html(write_html);
	               $("#video_url").val(data_modified);
	           }
	    });

	    $("#video_thumb_url_upload").uploadFile({
	        url:base_url+"ultrapost/text_image_link_video_upload_video_thumb",
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
	            var delete_url="<?php echo site_url('ultrapost/text_image_link_video_delete_uploaded_file');?>";
                $.post(delete_url, {op: "delete",name: data},
                    function (resp,textStatus, jqXHR) {
                    });

	         },
	         onSuccess:function(files,data,xhr,pd)
	           {
	               var data_modified = base_url+"upload_caster/text_image_link_video/"+data;
	               $("#video_thumb_url").val(data_modified);
	               var write_html='<video width="100%" height="auto" style="border:1px solid #ccc;" controls poster="'+data_modified+'"><source src="'+$("#video_url").val()+'">Your browser does not support the video tag.</video>';
	               $(".preview_video_block").html(write_html);
	           }
	    });



	     $(document.body).on('click','#submit_post',function(){

        	var post_type=$(this).attr("submit_type");

        	if(post_type=="text_submit")
        	{
        		if($("#message").val()=="")
        		{
        			alertify.alert('<?php echo $this->lang->line("Alert");?>',"<?php echo $this->lang->line('Please type a message to post.');?>",function(){ });
        			return;
        		}
        	}

        	else if(post_type=="link_submit")
        	{
        		if($("#link").val()=="")
        		{
        			alertify.alert('<?php echo $this->lang->line("Alert");?>',"<?php echo $this->lang->line('Please paste a link to post.');?>",function(){ });
        			return;
        		}
        	}

        	else if(post_type=="image_submit")
        	{
        		if($("#image_url").val()=="")
        		{
        			alertify.alert('<?php echo $this->lang->line("Alert");?>',"<?php echo $this->lang->line('Please paste an image url or uplaod an image to post.');?>",function(){ });
        			return;
        		}
        	}

        	else if(post_type=="video_submit")
        	{
        		if($("#video_url").val()=="")
        		{
        			alertify.alert('<?php echo $this->lang->line("Alert");?>',"<?php echo $this->lang->line('Please paste an video url or uplaod an video to post.');?>",function(){ });
        			return;
        		}
        	}


        	var post_to_profile = $("input[name=post_to_profile]:checked").val();
        	var post_to_pages = $("#post_to_pages").val();
        	var post_to_groups = $("#post_to_groups").val();
        	if(post_to_pages==null)
        	{
        		alertify.alert('<?php echo $this->lang->line("Alert");?>',"<?php echo $this->lang->line('Please select pages to publish this post.');?>",function(){ });
        		return;
        	}

        	
        	var schedule_type = $("input[name=schedule_type]:checked").val();
        	var schedule_time = $("#schedule_time").val();
        	var time_zone = $("#time_zone").val();
        	if(schedule_type=='later' && (schedule_time=="" || time_zone==""))
        	{
        		alertify.alert('<?php echo $this->lang->line("Alert");?>',"<?php echo $this->lang->line('Please select schedule time/time zone.');?>",function(){ });
        		return;
        	}

        	$("#submit_post").html('<?php echo $this->lang->line("Processing..."); ?>');
        	$("#submit_post").addClass("disabled");
        	$("#response_modal_content").removeClass("alert-danger");
        	$("#response_modal_content").removeClass("alert-success");
        	var loading = '<img src="'+base_url+'assets/pre-loader/Fading squares2.gif" class="center-block">';
        	$("#response_modal_content").html(loading);
        	$("#response_modal").modal();

		      var queryString = new FormData($("#edit_poster_form")[0]);
		      $.ajax({
		       type:'POST' ,
		       url: base_url+"ultrapost/text_image_link_video_edit_auto_post_action",
		       data: queryString,
		       dataType : 'JSON',
		       cache: false,
		       contentType: false,
		       processData: false,
		       success:function(response)
		       {
		       		$("#submit_post").removeClass("disabled");
		         	$("#submit_post").html('<i class="fa fa-send"></i> <?php echo $this->lang->line("Submit Post"); ?>');

		         	var report_link="<br/><a href='"+base_url+"ultrapost/text_image_link_video'><?php echo $this->lang->line('Click here to see report'); ?></a>";

		         	if(response.status=="1")
			        {
			         	$("#response_modal_content").removeClass("alert-danger");
			         	$("#response_modal_content").addClass("alert-success");
			         	$("#response_modal_content").html(response.message+report_link);
			        }
			        else
			        {
			         	$("#response_modal_content").removeClass("alert-success");
			         	$("#response_modal_content").addClass("alert-danger");
			         	$("#response_modal_content").html(response.message+report_link);
			        }

		       }

		      });

        });



    });



</script>
<div class="modal fade" id="response_modal" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $this->lang->line('Update Campaign Status');?></h4>
			</div>
			<div class="modal-body">
				<div class="alert text-center" id="response_modal_content">

				</div>
			</div>
		</div>
	</div>
</div>



<style type="text/css" media="screen">
	/* .box-header{border-bottom:1px solid #ccc !important;margin-bottom:15px;} */
	/* .box-primary{border:1px solid #ccc !important;} */
	/* .box-footer{border-top:1px solid #ccc !important;} */
	.box-body,.box-footer{padding:20px;}
	.padding-5{padding:5px;}
	.padding-20{padding:20px;}
	.box-header{padding-left: 20px;}
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
	.only_preview_img
	{
		width:100%;
		border: 1px solid #ccc;
		cursor: pointer;
	}
	.demo_preview
	{
		width:100%;
		/* border: 1px solid #ccc; */
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
	.box-primary
	{
		-webkit-box-shadow: 0px 2px 14px -5px rgba(0,0,0,0.75);
		-moz-box-shadow: 0px 2px 14px -5px rgba(0,0,0,0.75);
		box-shadow: 0px 2px 14px -5px rgba(0,0,0,0.75);
	}
	.content-wrapper{background: #fff;}
	.ajax-upload-dragdrop{width:100% !important;}
</style>
