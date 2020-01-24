# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

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
