=== Post Categories Gallery ===
Contributors: fides-it
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7AHC5YEQ8Y2TG
Tags: categories, posts, buttons, filtering, featured image, gallery
Requires at least: 2.1
Tested up to: 3.5.1
Stable tag: 1.0.0

Post Category Gallery displays selectable categories of posts horizontally and below the featured images of selected posts are displayed.

== Description ==

Post Category Gallery displays all non-empty post categories in a horizontal list, graphically displayed as buttons. The categories can be selected such that the posts shown below it are filtered. For each post, the featured image is displayed. The post thumbnails link to the posts themselves.

[Download the plugin from my website , as well as the screenshots](http://www.fides-it.nl/post-category-gallery-plugin/)

= Features =
* Three different color schemes: brown, green and blue
* Categories can be excluded or included
* Configurable thumbnail size
* Show category count or not
* Re-uses the parameters from the standard wp_list_categories template for the categories list. 
* Caption of post shown above or below each featured image

== Installation ==

= Shortcode Installation Example =

`[postcategorygallery default-category=17  color_scheme=green image_caption_position=bottom thumbnail_size=medium  caption_font_size=18px]`

= Defaults = 

* total_width = 100% (possible values: e.g. 50% or 200px, etc)
* show_count = 1 (possible values: 1 or 0)
* exclude = category if of 'uncategorized' category
* show_option_none = No categories!
* thumbnail_size = medium (possible values: medium, large)
* image_caption_position = top (possible values: bottom or top)
* color_scheme = green (possible values: brown, green or blue)
* caption_font_size = 24px (possible values: see CSS font-size property)
* orderby = name (possible values: ID, name, slug, count, term_group)
* order = ASC (possible values: ASC or DESC)
* number = <no limit> (possible values: 1 to ..)

= Explanation of options =

* **total_width**: Sets the width of the area containing the categories list and gallery thumbnails
* **show_count**: Show category count between parenthesis or not
* **exclude**: comma separated list of category IDs to exclude
* **include**: comma separated list of category IDs to include
* **show_option_none**: Set the text to show when no categories are listed. Defaults to 'No categories!'
* **thumbnail_size**: One of the configured thumbnail sizes. Default sizes available are 'large' and 'medium' which can be controlled via Settings > Media menu.
* **image_caption_position**: Controls whether captions of the images (where captions are post titles) are shown above ("top") or below ("bottom") the featured images.
* **color_scheme**: Choose between three different color schemes: "brown", "blue" or "green". Green is default.
* **caption_font_size**: The size of the caption font. See CSS property 'font-size' for possible values.
* **orderby**: The category field name by which categories in the categories list are sorted. Possible values are ID, name, slug, count, term_group. Default is name.
* **order**: Controls whether categories are sorted in ascending (ASC) or descending (DESC) order
* **number**: Set a maximum for the amount of categories shown. Default is no limit.


== Frequently Asked Questions ==

= Can I add a question to this FAQ? =

Yes, please send me a message via www.fides-it.nl/contact :)

== Screenshots ==

1. Green color scheme. `/trunk/screenshot-1.png`
2. Blue color scheme. `/trunk/screenshot-2.png`
3. Brown color scheme. `/trunk/screenshot-3.png`

== Changelog ==

* v1.0 - Maiden voyage
























