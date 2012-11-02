// Scrolling sidebar for your website
// Downloaded from Marcofolio.net
// Read the full article: http://www.marcofolio.net/webdesign/create_a_sticky_sidebar_or_box.html

window.onscroll = function()
{
	if( window.XMLHttpRequest ) {
		if (document.documentElement.scrollTop > 105 || self.pageYOffset > 105) {
			$('stickyContent').style.position = 'fixed';
			$('stickyContent').style.top = '0';
		} else if (document.documentElement.scrollTop < 105 || self.pageYOffset < 105) {
			$('stickyContent').style.position = 'absolute';
			$('stickyContent').style.top = '105px';
		}
	}
}