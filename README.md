## Synopsis

McBoots 2018 is a WordPress template (parent theme) based on the Bootstrap 4 framework. 

It is an evolution of the [McBoots theme](https://github.com/donnamcmaster/mcboots). The primary change is a switch from Bootstrap 3/LESS to Bootstrap 4/SCSS. There are minor changes in many files, but the overall concept and structure remains the same.

Like the original McBoots, McBoots 2018 borrows heavily from Underscores (_s), UnderStrap (_strap), and Roots/Sage, with props to Cully Larson and Kevin Miller. 

## Motivation

I build a lot of small to medium-sized custom-designed, responsive WordPress sites and need a good clean starting point. Goals:

* Clean, simple, just what's needed and no more. 
* DRY (Don't Repeat Yourself), which meant removing HTML framework code from the standard template files (single.php, page.php, index.php, etc.)
* Follow the "WordPress Way" when it doesn't conflict with the above. 

## Status

July 2018: just starting to transition the code from McBoots. Planning to release 0.1 by EOM. Consider it Alpha level, and please check the code and functionality for yourself before trusting it. 

The original McBoots development began August 2016. As of July 2018, McBoots is in use on seven active sites. I consider it Beta level. 

## Installation and Setup

No build files are included with the project at this time. The only file that needs compilation is `assets/scss/custom.scss`, which includes the Bootstrap 4 source files. It is compiled into `assets/css/custom.css`. 

Bootstrap 4 makes it easy to override the colors, fonts, and other values that are initialized in `assets/scss/bootstrap/_variables.scss`. Just edit `assets/scss/custom-overrides.scss`. See [Bootstrap documentation](https://getbootstrap.com/docs/4.1/getting-started/theming/#variable-defaults) for details. 

To understand the HTML wrapper code, look at `layout.php` and `lib/layout-wrapper.php`. The layout wrapper uses the WordPress `template_include` filter to capture the name of the main template file, and then passes it to `layout.php`, which includes it into the overall layout. 

## Contributors

I appreciate your letting me know (via message or pull request) if you find any problems or see areas for improvement. You can contact me [via email](https://www.donnamcmaster.com/contact/ "at my website") or on Twitter as [@mcdonna](https://twitter.com/mcdonna). 

## License

Licensed under [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html).
