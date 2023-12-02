<?php

namespace OpenGraphMR9K;

use ApiMain;
use MediaWiki\Hook\BeforePageDisplayHook;
use MediaWiki\Request\FauxRequest;

class Hooks implements BeforePageDisplayHook {
	public function onBeforePageDisplay($out, $skin): void {
		$title = $out->getContext()->getTitle();
		if ($title->isSpecialPage()) return;
		$api = new ApiMain(new FauxRequest(
			[
				'action'=>'query',
				'prop'=>'extracts',
				'explaintext'=>true,
				'exintro'=>true,
				'exchars'=>300,
				'pageids'=>$title->getArticleID()
			]
		));
		$api->execute();
		$data = $api->getResult()->getResultData(['query','pages']);
		$extract = $data[array_key_first($data)]["extract"];
		$extract_text = $extract[array_key_first($extract)]; // why????? the external API doesn't do this
		// Now add OGP data
		// First, the pagename
		$out->addMeta("og:title",$out->getTitle());
		// Next, the wikiname (sitename)
		$out->addMeta("og:site_name",$out->getConfig()->get('OpenGraphSitename'));
		// Next, we're a website
		$out->addMeta("og:type","website");
		// Next, add URL
		$out->addMeta("og:url",$title->getFullURL());
		// PageImages is already going to add the image tags so we don't need to worry about that
		// Finally, the description
		$out->addMeta("og:description",$extract_text);
	}
}

?>
