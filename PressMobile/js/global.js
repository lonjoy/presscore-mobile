$(function() {
	$(document).on("click", "#JS_LoadMore a",
function(e) {
		e.preventDefault();
		$.ajax({
			type: 'GET',
			url: $(this).attr('href'),
			beforeSend: function() {
				$("#JS_LoadMore").hide();
				$(".ajax-status").show();
			},
			dataType: 'html',
			success: function(out) {
				$('#single').append($(out).find('.content-inside'));
				$("#JS_LoadMore").show();
				$(".ajax-status").hide();
			}
		});
		$(this).parent("#JS_LoadMore").remove();
		return false;
	});
	$("#JS_BackTop").click(function() {
		$("html, body").animate({
			scrollTop: 0
		},
		500);
		return false;
	});
});
$('#tab-author').click(function() {
	$('#author-info').hide();
	$('#comment-author-info').show();
	$('#author').focus();
})
 $('.open-mobile').click(function() {
	if ($('.mobile-nav').is(':visible')) {
		$('.mobile-nav').slideUp(300);
		$('.open-mobile').removeClass('mobile-show');
	} else {
		$('.mobile-nav').slideDown(500);
		$('.open-mobile').addClass('mobile-show');
	}
	return false;
});

jQuery.prototype.isChildAndSelfOf = function(b) {
	return (this.closest(b).length > 0);
};
$(document).click(function(e) {
	if (!$(e.target).isChildAndSelfOf("#mobile-holder")) {
		$('.mobile-nav').slideUp(300);
		$('.open-mobile').removeClass('mobile-show');
	}
});
$('.show-search').click(function() {
	$('.show-search').addClass('search-show');
	$('#holder,#search-container').show();
	$('#search-input').focus();
});
$('#holder').click(function() {
	$('.show-search').removeClass('search-show');
	$('#holder,#search-container').hide();
});
var isIOS = (/(iPhone|iPod|iPad)/.test(navigator.userAgent));
if (!navigator.standalone && isIOS) {
	$('#footer').after('<div id="add2home">可添加到主屏幕</div>')
}

	$(document).on("click", ".JS_Load",
function(e) {
		e.preventDefault();
			window.location = this.getAttribute("href");
			return false
	})
