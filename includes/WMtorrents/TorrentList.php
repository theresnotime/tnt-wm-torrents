<?php
/**
 * TorrentList
 * 
 * PHP version 8
 *
 * @category  Class
 * @package   WMtorrent
 * @author    Sam <sam@theresnotime.co.uk>
 * @copyright 2021 Sam
 * @license   Copyright - All Rights Reserved
 * @version   GIT: 1.0.0
 * @link      #
 * @since     File available since 1.0.0
 */
declare(strict_types=1);
namespace WMtorrents;

require_once __DIR__ . '/../../vendor/autoload.php';

/**
 * TorrentList
 *
 * @category Class
 * @package  WMtorrent
 * @author   Sam <sam@theresnotime.co.uk>
 * @license  <https://opensource.org/licenses/MIT> MIT
 * @link     #
 * @since    Class available since 1.0.0
 */
class TorrentList
{
    public array $torrentList;
    public array $config;

    /**
     * Construct
     */
    function __construct()
    {
        $torrentList = json_decode(
            file_get_contents(
                __DIR__ . '/../../config/torrents.json'
            ),
            true
        );
        $this->torrentList = $torrentList;

        $config = json_decode(
            file_get_contents(
                __DIR__ . '/../../config/config.json'
            ),
            true
        );
        $this->config = $config;

        return $this;
    }

    /**
     * Get the list of torrents
     *
     * @return array
     */
    public function getTorrentList()
    {
        return $this->torrentList;
    }

    /**
     * Get the list of enabled projects
     *
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Get years
     *
     * @return array
     */
    public function getYears()
    {
        return $this->config['years'];
    }
}