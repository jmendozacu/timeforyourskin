<?php
/**
 * Copyright (c) 2016-present, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the BSD-style license found in the
 * LICENSE file in the root directory of this source tree. An additional grant
 * of patent rights can be found in the PATENTS file in the code directory.
 */

require_once 'app/Mage.php';
require_once __DIR__.'/../lib/fb.php';
require_once 'FacebookProductFeed.php';

class FacebookProductFeedTSV extends FacebookProductFeed {

  const TSV_FEED_FILENAME = 'facebook_adstoolbox_product_feed.tsv';

// full row should be
// id\ttitle\tdescription\tgoogle_product_category\tproduct_type\tlink\timage_link\tbrand\tcondition\tavailability\tprice\tsale_price\tsale_price_effective_date\tgtin\tbrand\tmpn\titem_group_id\tgender\tage_group\tcolor\tsize\tshipping\tshipping_weight\tcustom_label_0
// ref: https://developers.facebook.com/docs/marketing-api/dynamic-product-ads/product-catalog
  const TSV_HEADER = "id\ttitle\tdescription\tlink\timage_link\tbrand\tcondition\tavailability\tprice\tshort_description\tproduct_type\tgoogle_product_category";

  protected function tsvescape($t) {
    // replace newlines as TSV does not allow multi-line value
    return str_replace(array("\r", "\n", "&nbsp;", "\t"), ' ', $t);
  }

  protected function buildProductAttr($attr_name, $attr_value) {
    return $this->buildProductAttrText($attr_name, $attr_value, 'tsvescape');
  }

  protected function defaultCondition() {
    return 'new';
  }

  protected function getFileName() {
    return self::TSV_FEED_FILENAME;
  }

  protected function buildHeader() {
    // shame that we can not insert any comments in TSV
    return self::TSV_HEADER;
  }

  protected function buildFooter() {
    return null;
  }

  protected function buildProductEntry($product) {
    $items = parent::buildProductEntry($product);
    return implode("\t", array_values($items));
  }

}
