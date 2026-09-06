=== SOGO  Accessibility  ===
Contributors: orenhav
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=Z5H7VVZLSPYUE
Tags: accessibility
Requires at least: 4.6
Tested up to: 7.1
Requires PHP: 5.6
Stable tag: 2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin add accessibility menu to a WordPress Site, enable, black and white, contrasts, font size increase and more...

== Description ==

Tested with Gutenberg

version 2.0.0 fixes few issues that were not fully align to the requirement of WCAG 2.0 level AA


The plugin is using only JS and CSS to "fix" \ enable few accessibility features to the site front end

the plugin will scan the entire code and will add support of accessibility to the page automatically

The admin can select:

* where the button of the accessibility is located on the screen, lop left right bottom.
* enable\disable features
* set the increase value of the font size
* set the text display to the user for every feature.
* customize the colors of the plugins
* enter custom CSS

### new: added support for hide accessibility in mobile and tablet ###

now you can hide the accessibility on mobile and tablet

### Activation notice and external services ###

When you activate the plugin it asks, once, whether you would like to let SOGO know.
If you choose "Notify SOGO" an e-mail containing your site address and administrator
e-mail address is sent to wpmaster@sogo.co.il. If you choose "No thanks" nothing is
sent. The plugin behaves identically either way.

The front-end toolbar loads the Font Awesome icon font from the BootstrapCDN
(maxcdn.bootstrapcdn.com). The premium license field, when used, contacts
pluginsmarket.com to validate the licence key you enter.

### Missing something? need help? ###
if you need help configure the plugin or need help customize it to your site
Contact us from the support tab or email us directly at support@sogo.co.il

### Love the plugin? ###
Don’t forget to vote for us and feel free to donate so we can continue sharing free plugins


== Installation ==

1. Upload the plugin to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress


== Frequently Asked Questions ==

1. Does it support RTL

Yes

2. can I change the text of the buttons

 yes, you can finds it in the setting section of the plugin

3. can I disable some of the features on my site?

yes you can, simply browse to the plugin settings and disable features you don't need.

4. Can I remove the credit to your site?

 you will need to contact us for details

== Screenshots ==

1. Backend, Widget area
2. Backend, Widget area
3. Frontend


== Changelog ==

= 2.2 =
* Fix: black & white mode now uses a blend-mode overlay instead of a CSS filter on the page body, which broke fixed-position elements such as sticky headers.
* Fix: "cancel accessibility" now clears the plugin cookies properly.
* Fix: the enqueued CSS and JS now carry the real plugin version, so browsers pick up updated assets after an upgrade.
* Fix: replaced the jQuery `.load()` event shorthand removed in jQuery 3, which stopped the automatic image alt fallback and the admin licence check from running.
* Fix: the "hide on mobile / tablet" media queries were never closed and swallowed the button colour settings.
* Fix: the two larger font-size buttons emitted broken markup instead of an aria-label.
* Privacy: the activation notification to SOGO is now opt-in. Nothing is sent unless an administrator agrees on the activation notice.
* Security: the licence check now requires a nonce and the manage_options capability, and verifies TLS certificates.
* Compatibility: fixed PHP 8 warnings and deprecations; tested against WordPress 7.1.

= 1.0 =
First version

= 1.0.1=
fix mobile view

= 1.0.2 =
fix some CSS issue

= 1.0.4 =
added the option to open\close accessibility menu with ALT +A
add option to close the terms & condition with ALT+C
** Please note: you will need to add instructions to your terms & condition
** Added France translation, thanks to Xavier Boussemart http://www.livremonami.nc/

fixed in version 1.0.1 underline links
Fixed in version 1.0.1: load js in footer
fixed in version 1.1.0, skiplinks with conflict with fullpage.js, fixed: load skiplinks only if user enable accessibility
New in version 1.0.8: change default color for accessibility, close the accessibility when click on one of the buttons, fixed layout in 'middle' button set.
New in version 1.0.7:  added option to use icon instate of text for the accessibility button

= 2.0.0 =
fixes few issues that were not fully align to the requirement of WCAG 2.0 level AA

= 2.0.1 =
add aria for the icon used in the plugin itself

= 2.0.2 =
fix icons

= 2.1 =
add  Polish language support

== Upgrade Notice ==

= 2.2 =
Compatibility and security release for current WordPress and PHP 8. Fixes black & white mode, restores features broken by jQuery 3, and makes the activation notification to SOGO opt-in.
