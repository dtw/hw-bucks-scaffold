# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [2.1.3] - 2023-02-17
### Changed
- styles to improve accessibility

### Added
- styles for new compact recent feedback widget

## [2.1.2] - 2022-08-26
### Changed
- only show register services in local services taxonomy archives
- switch to self-hosted Google fonts (uses wptt-webfont-loader.php from https://github.com/WPTT/webfont-loader)
- only enqueue recaptcha on your-story page
- remove auto-formatting of SharePoint anchors

## [2.1.1] - 2022-08-24
### Changed
- check not admin before trying to output meta tags
- support icons from media library on signposts and services
- switch theme customiser logo to attachment ID not URL

## [2.1] - 2022-08-10
### Changed
- cleaned up display of taxonomy archives
- review and tidied code
- formatting of widget inline with HWE rebrand
- removed link from gadget logo

## [2.0] - 2022-06-09

**Plugin folder re-named from healthwatchfeedback to hw-feedback!**

### Added
- fields in the Theme Customizer to reduce hardcoding - can set Org Name, Email and Telephone
- new section in Theme Customizer and new fields for social media identities
- helper functions to clean and format/mask telephone numbers and twitter handles
- widget to display new social media identities from customizer

### Changed
- updated fonts and colours in-line with Healthwatch England rebrand
- reformatted panels and signpost display
- replaced old RGB colours with hex/vars
- fixed syntax in jQuery JS files
- some values from customizer now used in meta tags
- pagination number formatting
- restyled footer
- moved some legacy inline CSS into files
- now use site icon on login page rather than built-in
- reorder default metabox display

## [1.9.4] - 2022-06-09
### Added
- an "out of date" reminder to all pages with reviews
- header-archived.php - customise local_services display based on cqc_reg_status

### Changed
- multiple CSS fixes
- The Great Function Rename 2022 (renamed functions in line with plugin name)
- fixed more phone numbers
- moved code from header.php into elements/
- CQC widget now checks cqc_reg_status

## [1.9.3] - 2022-03-19
### Changed
- replace hex colours with var

## [1.9.2] - 2021-11-06
### Changed
- add --hw-pale-grey
- update CSS for embedded items

## [1.9.1] - 2021-10-15
### Changed
- link to comment moderation information
- don't create an excerpt from content if blank
- limited excerpt to 20 words
- add formatting div to the_excerpt
- update button styles for accessibility

## [1.9] - 2021-10-13
### Removed
- move function-comments.php to child theme

## [1.8.4] - 2021-10-08
### Added
- date to single posts (near bottom, above tags)

## [1.8.3] - 2021-09-30
### Added
- full date/time in tooltip when hovering on date in comments feed

## [1.8.2] - 2021-09-22
### Changed
- update CSS rules for Ajax Search Pro and admin area

## [1.8.1] - 2021-09-21
### Removed
- meta tags no longer set in theme

## [1.8] - 2021-09-16
### Added
- data-nosnippet to #nav to try to stop SE showing our contact details at the top of service results.

### Removed
- CSS and classes for Bootstrap fixed navbar
- CSS to support top fixed cookie-notice

## [1.7.9] - 2021-09-08
### Changed
- add new id to scroll to form
- hide CQC widget if there is no cqc_location

## [1.7.8] - 2021-08-23
### Added
- add CSS for pptx files
- add CSS for BI frame
- add CSS to hide disclaimer in MS Forms forms

### Changed
- update CSS rules after YARPP default changes
- fix CSS spacing on Team page

## [1.7.7] - 2021-03-17
### Changed
- minor accessibility changes

### Removed
- custom background option and colour options from customizer

## [1.7.6] - 2021-01-20
### Changed
- ensure date of review is displayed if no rating is given.
- new styles for MailChmip signup

## [1.7.5] - 2021-09-07
### Added
- new CSS variables to manage responsive cookie notice

### Changed
- minor CSS accessibility changes

### Removed
- moved panel .btn styles to child theme

## [1.7.4] - 2021-06-18
### Changed
- updates for PHP7.0 compatibility

## [1.7.3] - 2020-04-07
### Changed
- Cache-Control settings now sent with wp_headers hook

## [1.7.2] - 2020-03-25
### Changed
- updated credits

## [1.7.1] - 2020-03-04
### Added
- use local_services category icon if there is no thumbnail

### Changed
- nested bullet styles
- stop redirecting to "thanks" page for post comments
- accessibility changes to url colors
- mobile menu colors

## [1.7.0] - 2020-02-10
### Added
- show featured image in the top of the main content once the sidebar collapses
- styles for new yarpp template
- add formatting for response from HW in comments
- replace the "widget" call on Local Service pages

### Changed
- strip URLs from comments
- spacing and style in the comments sections
- minor CSS updates
- many formatting changes to comment form and areas
- updated wording on Local Service pages
- improved appearance of service information and ratings on Local Service pages

### Removed
- rated-by-hw files
- old sidebar code

## [1.6.0] - 2020-01-28
### Added
- CSS "variables" for major colours

### Changed
- fixed issue with fussy service URLs
- fixed more hover/focus styles
- update multiple styles with altered colours to improve contrast based on WCAG2
- switched hex colour codes to colour names where possible (e.g. white)
- multiple changes to validate HTML
- fixed add_js_arguements function
- fixed duplicate meta description on home page

## [1.5.1] - 2020-01-24
### Added
- fix cookie notice to top of page for screen readers with CSS
- new wrapper for navbar items to help with spacing (nav-spacer)

### Changed
- fixed some hover effects
- minor CSS changes

## [1.5.0] - 2020-01-21
### Added
- theme config for an alt logo (for dark mode)
- CSS to show alt logo in dark mode
- headings and divs on single-service sidebar
- screen reader hints for ratings added to all star ratings
- screen reader hints before tags and categories on posts
- screen reader hints to show a count of comments
- :focus CSS selectors on most anchor elements

### Changed
- many CSS changes for mobile views
- anchors now have a much more obvious (accessible) hover style
- visual hints, including icons and images in menu elements, now have alt text or titles, are aria hidden, and have added screen reader hints.
- new semantic ID/classes added
- improved readability/cohesion of comments and ratings
- improved appearance of pagination on small screens
- fixed too wide pagination links on archives with many pages

### Removed
- some old CSS styles

## [1.4.0] - 2020-01-10
### Added
- anchors on office phone numbers
- change column widths in loop-archive
- add reCAPTCHA in functions-enqueue
- CSS fixes (mostly .alerts)

### Changed
- add an offset to nav for logged in users to stop WordPress admin bar hiding navbar-fixed
- fixes to bootstrap alerts CSS
- update to new feedbackstarrating() syntax
- made video iframes responsive

## [1.3.0] - 2020-01-06
### Changed
- minor CSS fixes especially tagline and navbar
- moved hide_on_scroll code to js file
- fixed privacy statement links

### Added
- added hide-on-scroll class to make applying scroll JS cleaner
- added compact_on_scroll js and CSS classes - compacts the navbar on scroll

### Removed
- removed unused before/after CSS styles on front page

## [1.2.2] - 2019-12-20
### Changed
- services : added structured data ratings on local services with 10 or more reviews
- signposts : show categories to logged in users
- minor CSS fixes

## [1.2.1] - 2019-12-13
### Changed
- padding and height on choice containers and panels

### Removed
- old static image files

## [1.2.0] - 2019-11-29
### Added
- new function to output star ratings feedbackstarrating
- JSON-LD functionality - Organisation and ContactPoint on front page, AggregateRating to service pages

### Changed
- new FontAwesome version 5.11
- improve accessibility with aria-hidden on icon elements
- updated mobile layout and appearance

### Removed
- is_category specific content from loop. Switch to templates instead.

## [1.1.1] - 2016-08-29
### Changed
- Various bug fixes, proper enqueuing of resources, speed optimisation.

## [1.1.0] - 2016-08-25
### Changed
- As soft launched on Healthwatch Bucks

## [1.0.3] - 2015-07-31
### Changed
- As launched on Healthwatch Derbyshire

## [1.0.2] - unknown
### Changed
- As tested on Healthwatch Derbyshire

## [1.0.1] - unknown
### Added
- Prototype
