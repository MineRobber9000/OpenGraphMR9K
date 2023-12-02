# OpenGraphMR9K

Open Graph metadata for MediaWiki.

## To install:

Add to the bottom of `LocalSettings.php`:

```php
# If you don't have PageImages enabled and you want images to work, enable it.
# Make sure $wgPageImagesOpenGraph = true as well, since we let PageImages do the work there.
wfLoadExtension( 'OpenGraphMR9K' );
$wgOpenGraphSitename = $wgSitename; # If you want your OpenGraph sitename to be different, change it here.
```
