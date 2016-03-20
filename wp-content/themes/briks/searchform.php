<form method="get" id="searchform" action="<?php echo __(esc_url( home_url( '/' ) )); ?>">
	<div class="search-bar col-lg-12 col-sm-12 col-6">             
	    <div class="input-group">
	        <span class="input-group-btn">
	            <button class="btn btn-cls" type="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search'); ?>">Search</button>
	        </span>
	        <input type="text"  class="form-control field" name="s" id="s">
	    </div><!-- /input-group -->
	</div>
</form>
