jQuery(document).ready(function(){
    $ = jQuery.noConflict();

    $('.mae-edit ul.mae-head-tabs li a').click(function(e){
		if($(this).closest('li').data('tab') != 'pro') {
			event.preventDefault();
		} else {
			return true;
		}
		history.pushState({}, '', this.href);

		var tab_id = $(this).closest('li').attr('data-tab');

		$('.mae-edit ul.mae-head-tabs li').removeClass('current');
		$('.mae-edit .mae-tab-content').removeClass('current');

		$(this).closest('li').addClass('current');
		$("#mae-"+tab_id).addClass('current');
	});

	var hash = window.location.hash;
    if(hash){
		$('.mae-edit .mae-tabs ul.mae-head-tabs li, .mae-tabs .mae-tab-content').removeClass('current');
		$('a[href="' + hash +'"]').parent('li').addClass('current');
        var elementID = hash.replace('#', '');
		$('.mae-edit .mae-tabs .mae-tab-content#'+elementID).addClass('current');
	}

	$('.mae-edit #mae-addons').each(function(){
		$parent = $(this);

		activeChildsByParent($parent);
		
		$parent.find('input[type="checkbox"]:not("#mae_all")').on('change', function(){
			var $thisParent = $(this).closest('.mae-edit #mae-addons');
			activeChildsByParent($thisParent);
		});

		$parent.find('input[type="checkbox"]#mae_all').on('change', function(){
			var $thisParent = $(this).closest('.mae-edit #mae-addons');
			toggleAllChildsByParent($thisParent);
		});
	});

	function toggleAllChildsByParent($parent){
		var $childs = $parent.find('input[type="checkbox"]:not(#mae_all)'),
			stateAll = $parent.find('input[type="checkbox"]#mae_all').prop('checked');

		$childs.prop('checked', stateAll);
		activeChildsByParent($parent);
	}

	function activeChildsByParent($parent){
		var $allChilds = $parent.find('input[type="checkbox"]#mae_all'),
			total = $parent.find('input[type="checkbox"]:not(#mae_all)').length,
			actives = $parent.find('input[type="checkbox"]:not(#mae_all):checked').length;

		if( actives < total){
			$allChilds.prop('checked', false);
		} else {
			$allChilds.prop('checked', true);
		}
	}
});