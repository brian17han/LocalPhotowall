<?php include "../temp/generalheader1.inc"; ?>
<?php include "../temp/generalheader2.inc"; ?>
    <div class="main_content">
    {#foreach key=k item=index from=$fans_array#}
    {#if $fans_array[$k].first_letter ne $letter_storage[$k]#} 
    <div class="list" id="letter_{#$fans_array[$k].first_letter#}">
    	<div class="tag"><h3>{#$fans_array[$k].first_letter#}</h3></div>
    	{#if $k ne 0#}
          <hr class="hr"/>
        {#/if#}
    	  <ul> 
    	  	 <li class="user_info">
                	<div class="profile_img_big" onclick="window.location='http://google.com' ">
                		{#foreach key=key2 item=item2 from=$index#}
                          <!--</div>{#$key2#} : {#$item2#}-->
                          {#if $key2 eq head_photo#}
                              <img src="{#$item2#}" height="117" width="151" />
                          {#/if#} 
                        {#/foreach#}
                    </div>
                    <p onclick="window.location='http://google.com' ">{#$fans_array[$k].nick_name#}</p>
                    <div class="list_action hideV">
                    	<div class="list_action_button" onclick="window.location='http://google.com' ">
                        	<p>访问</p>
                        </div>
					<!--<div class="list_action_button" onclick="delete">
                        	<p>删除</p>
                        </div>-->                    
                    </div>
              </li>
       
      {#else#}
             <li class="user_info">
                	<div class="profile_img_big" onclick="window.location='http://google.com' ">
                		{#foreach key=key2 item=item2 from=$index#}
                          <!--</div>{#$key2#} : {#$item2#}-->
                          {#if $key2 eq head_photo#}
                              <img src="{#$item2#}" height="117" width="151" />
                          {#/if#} 
                        {#/foreach#}
                    </div>
                    <p onclick="window.location='http://google.com' ">{#$fans_array[$k].nick_name#}</p>
                    <div class="list_action hideV">
                    	<div class="list_action_button" onclick="window.location='http://google.com' ">
                        	<p>访问</p>
                        </div>
						<!--<div class="list_action_button" onclick="delete">
                        	<p>删除</p>
                        </div>-->                    
                    </div>
              </li>
    {#/if#}
    {#if $fans_array[$k+1].first_letter ne $letter_storage[$k+1]#} 
        </ul>
    </div>
    {#/if#}
    {#/foreach#}
	</div><!--main_content ends-->
    <?php include '../temp/midfooter.inc'?>