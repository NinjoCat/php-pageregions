<?php

namespace PageRegionsDemo;

use OLOG\Auth\AuthConfig;
use OLOG\Auth\AuthConstants;
use OLOG\BT\LayoutBootstrap;
use OLOG\Cache\CacheConfig;
use OLOG\Cache\MemcacheServerSettings;
use OLOG\DB\DBConfig;
use OLOG\DB\DBSettings;
use OLOG\Layouts\LayoutsConfig;
use OLOG\Model\ModelConstants;
use OLOG\PageRegions\Admin\PageRegionsAdminMenu;
use OLOG\PageRegions\PageRegionConstants;
use OLOG\PageRegions\PageRegionsConfig;

class PageRegionsDemoInitConfig
{
    static public function initConfig(){
        header('Content-Type: text/html; charset=utf-8');
        date_default_timezone_set('Europe/Moscow');

        DBConfig::setDBSettingsObj(
            AuthConstants::DB_NAME_PHPAUTH,
            new DBSettings('localhost', 'db_pageregions', 'root', '1', 'vendor/o-log/php-auth/db_phpauth.sql')
        );

        DBConfig::setDBSettingsObj(
            PageRegionConstants::DB_ID,
            new DBSettings('localhost', 'db_pageregions', 'root', '1')
        );

        CacheConfig::addServerSettingsObj(new MemcacheServerSettings('localhost', 11211));

        AuthConfig::setFullAccessCookieName('lkjdhfglkjdsgf');

        AuthConfig::setAdminActionsBaseClassname(PageregionsDemoAdminActionsBase::class);

        PageRegionsConfig::setRegionsArr(
            [
                'head' => 'head',
                'footer' => 'footer'
            ]
        );

        PageRegionsConfig::setAdminActionsBaseClassname(PageregionsDemoAdminActionsBase::class);

        LayoutsConfig::setAdminLayoutClassName(LayoutBootstrap::class);
    }
}