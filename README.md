// Hero section shortcode (icon format: "fa-... fa-...")
[four_columns icon1="" title1="" icon2="" title2="" icon3="" title3="" icon4="" title4=""]

//////////////////////////////////////////////////////////////////////////////////////

// Operator list shortcode (custom post type 'operators')
[operator_list post_type=""]

//////////////////////////////////////////////////////////////////////////////////////

// Category posts shortcode
[category_posts category="" posts_per_page="" layout="latest-news" button="true"]
[category_posts category="" posts_per_page="" layout="bottom-news" button="true"]
[category_posts category="" posts_per_page="" layout="news-sidebar" button="false"]

//////////////////////////////////////////////////////////////////////////////////////

// Banner shortcode
[banner title=""]

//////////////////////////////////////////////////////////////////////////////////////

// Registration steps shortcode (fill repeater ACF on front page for content)
[registration_banner ]

//////////////////////////////////////////////////////////////////////////////////////

// Bookmakers sidebar shortcode (custom post type 'operators')
[bookmakers_sidebar post_type="" limit=""]

//////////////////////////////////////////////////////////////////////////////////////

// Searchbar shortcode
[search_bar placeholder=""]

//////////////////////////////////////////////////////////////////////////////////////

// Subcategories sidebar shortcode (category of posts)
[subcategories_sidebar category=""]

//////////////////////////////////////////////////////////////////////////////////////

Note for importing ACF json file on new site:

- After instaling ACF Pro on a new site go to Custom fields/Tools,
- On the right side of the screen you have Import Field Groups section,
- Go to Choose file and in you theme directory choose folder named 'acf-json',
- There is just one json file in that folder, and just Import it.

I choose this method because I had problem with ACF repeater subfield (when i was testing theme on a new site), my subfields were undefined.
