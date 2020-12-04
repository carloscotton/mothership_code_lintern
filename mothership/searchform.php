<form role="search" method="get" class="search-form" action="<?php echo home_url(); ?>">
    <div class="input-group">	
   		<input type="text" name="s"   class="form-control search-input" value="<?php the_search_query(); ?>" />
   		<span id="show-searchbox">
			<i class="fa fa-search"></i>
		</span>
	</div>
</form>