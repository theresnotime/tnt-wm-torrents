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
            $torrentInfo[$date]['date']
        );

        $this->year = intval($this->date->format('Y'));
        $this->project = $torrentInfo[$date]['project'];
        $this->file = $torrentInfo[$date]['file'];
        $this->location = $torrentInfo[$date]['location'];
        $this->magnet = $torrentInfo[$date]['magnet'];
        $this->hash = $torrentInfo[$date]['hash'];
        $this->weblink = $torrentInfo[$date]['weblink'];

        return $this;
    }
}