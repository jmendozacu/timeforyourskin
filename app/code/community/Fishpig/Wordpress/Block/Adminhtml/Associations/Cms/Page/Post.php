<?php
/**
 * @category    Fishpig
 * @package     Fishpig_Wordpress
 * @license     http://fishpig.co.uk/license.txt
 * @author      Ben Tideswell <help@fishpig.co.uk>
 */

class Fishpig_Wordpress_Block_Adminhtml_Associations_Cms_Page_Post extends Fishpig_Wordpress_Block_Adminhtml_Associations_Abstract
{
	/**
	 * Retrieve the association type for this grid
	 *
	 * @return string
	 */
	public function getAssociationType()
	{
		return 'cms_page/post';
	}
}
