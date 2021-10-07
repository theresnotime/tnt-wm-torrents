<?php
/**
 * Index file
 * 
 * PHP version 8
 *
 * @category  Web
 * @package   NA
 * @author    Sam <sam@theresnotime.co.uk>
 * @copyright 2021 Sam
 * @license   <https://opensource.org/licenses/MIT> MIT
 * @version   GIT: 1.0.0
 * @link      #
 */
declare(strict_types=1);
require_once __DIR__ . '/../../vendor/autoload.php';

if (isset($_GET['h'])) {
    $hash = $_GET['h'];
    $magnet = new WMtorrents\Magnet($hash);
    header('Location: ' . $magnet->getLink());
}