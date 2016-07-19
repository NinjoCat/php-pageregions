<?php

namespace PageRegionsDemo\Pages;

use OLOG\Auth\Admin\CurrentUserNameTrait;
use OLOG\BT\InterfacePageTitle;
use OLOG\BT\InterfaceUserName;
use OLOG\BT\Layout;
use OLOG\PageRegions\PageRegions;

class MainPageAction implements InterfacePageTitle, InterfaceUserName
{
	use CurrentUserNameTrait;

	static public function getUrl()
	{
		return "/";
	}

	public function currentPageTitle()
	{
		return 'PHP-PageRegions demo';
	}

	public function action()
	{
		$html = '';

		$html .= '<div class="panel panel-default"><div class="panel-heading">head</div><div class="panel-body">';
		$html .= PageRegions::renderRegion('head'); // TODO: replace with actual region ID
		$html .= '</div></div>';

		Layout::render($html);
	}
}