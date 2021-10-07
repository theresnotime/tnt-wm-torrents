<?php
/**
 * Magnet
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

use Exception;

/**
 * Magnet
 *
 * @category Class
 * @package  WMtorrent
 * @author   Sam <sam@theresnotime.co.uk>
 * @license  <https://opensource.org/licenses/MIT> MIT
 * @link     #
 * @since    Class available since 1.0.0
 */
class Magnet
{
    public array $magnetList;
    public string $hash;
    public string $xt;
    public string $dn;
    public string $link;


    /**
     * Construct
     *
     * @param string $hash Passed magnet hash
     */
    function __construct(string $hash)
    {
        $this->magnetList = json_decode(
            file_get_contents(
                __DIR__ . '/../../config/magnets.json'
            ),
            true
        );

        try {
            if (key_exists($hash, $this->magnetList)) {
                $this->hash = $hash;
                $this->xt = $this->magnetList[$hash]['xt'];
                $this->dn = $this->magnetList[$hash]['dn'];
                $this->link = $this->magnetList[$hash]['link'];
            } else {
                throw new Exception("No such magnet");
            }
        } catch (Exception $e) {
            $data = array('result' => 'error', 'message' => 'No such magnet link');
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($data);
            exit();
        }
    }

    /**
     * Get a magnet link
     *
     * @return void
     */
    public function getLink()
    {
        return $this->link;
    }
}