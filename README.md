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

# Known errors

If you're using a version of MediaWiki prior to 1.40 and you get an error about "class MediaWiki\Request\FauxRequest not found" or whatever, just replace line 7 of Hooks.php with (note the lack of namespace):

```
use FauxRequest;
```

FauxRequest wasn't namespaced until 1.40, for some reason. The rest of the plugin should Just Work:tm:, but do remember you need TextExtracts.
