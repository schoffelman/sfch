/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */
( function() {
	var container, button, menu, links, subMenus, siteId, overlay, parent, children=[];

	siteId = document.getElementById( 'page' );
	overlay = document.getElementById( 'overlay' );
	container = document.getElementById( 'site-navigation' );
	
	
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}
	
	
	
	parent = document.getElementsByClassName( 'menu-item-has-children' );
	
	for (i = 0; i < parent.length; i++) {
	
		children[i] = document.getElementById( parent[i].id );
		
		// when a has-children nav item is clicked, do the following:
		children[i].onclick = function() {
			
			// loop through the has-children nav items
			for (i = 0; i < parent.length; i++) {
			
				// select the items that are expanded
				if ( -1 === this.className.indexOf( 'toggled' ) ) {
				
					// collaps that expanded menu by removing the toggled class
					children[i].className = children[i].className.replace( ' toggled', '' );
				} 
			}
			
			// check to see if the item that was clicked on has an existing class of toggled
			if ( -1 === this.className.indexOf( 'toggled' ) ) {
				// if no, add it
				this.className += ' toggled';
			} else {
				// otherwise remove it
				this.className = this.className.replace( ' toggled', '' );
			}
			
		};
	}

	
	overlay.onclick = function() {
		if ( -1 !== siteId.className.indexOf( 'toggled' ) ) {
			siteId.className = siteId.className.replace( ' toggled', '');
			container.className = container.className.replace( ' toggled', '' );
		} else {
			siteId.className += ' toggled';
			container.className += ' toggled';
		}
	};

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
		if ( -1 !== siteId.className.indexOf( 'toggled' ) ) {
			siteId.className = siteId.className.replace( ' toggled', '');
		} else {
			siteId.className += ' toggled';
		}
	};

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );
	subMenus = menu.getElementsByTagName( 'ul' );

	// Set menu items with submenus to aria-haspopup="true".
	for ( var i = 0, len = subMenus.length; i < len; i++ ) {
		subMenus[i].parentNode.setAttribute( 'aria-haspopup', 'true' );
	}

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}
} )();
