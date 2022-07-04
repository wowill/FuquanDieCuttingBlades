<form class="search-form" action="<?php  echo esc_url(home_url('/')); ?>/" method="get">
    <fieldset>
        <input type="text" name="s" id="s" placeholder="<?php echo esc_attr__('Search...', 'samatex'); ?>" />
        <input type="submit" id="searchsubmit" />
    	<div class="search-icon"></div>
    </fieldset>
</form>