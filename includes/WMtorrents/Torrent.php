<?php
/**
 * Torrent
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

use DateTime;

/**
 * Torrent
 *
 * @category Class
 * @package  WMtorrent
 * @author   Sam <sam@theresnotime.co.uk>
 * @license  <https://opensource.org/licenses/MIT> MIT
 * @link     #
 * @since    Class available since 1.0.0
 */
class Torrent
{
    public int $year;
    public string $project;
    public DateTime $date;
    public string $file;
    public string $location;
    public string $magnet;
    public string $hash;
    public string $weblink;
    public DateTime $created;
    public bool|string $webseed;

    /**
     * Construct
     *
     * @param array $torrentInfo Torrent info array
     */
    function __construct(array $torrentInfo)
    {
        $date = key($torrentInfo);

        $this->date = DateTime::createFromFormat(
            'Y-m-d',
            $torrentInfo['date']
        );

        $this->created = DateTime::createFromFormat(
            'Y-m-d',
            $torrentInfo['created']
        );

        $this->year = intval($this->date->format('Y'));
        $this->project = $torrentInfo['project'];
        $this->file = $torrentInfo['file'];
        $this->location = $torrentInfo['location'];
        $this->magnet = $torrentInfo['magnet'];
        $this->hash = $torrentInfo['hash'];
        $this->weblink = $torrentInfo['weblink'];

        if ($torrentInfo['webseed']) {
            $this->webseed = $torrentInfo['webseed'];
        } else {
            $this->webseed = false;
        }

        return $this;
    }
}