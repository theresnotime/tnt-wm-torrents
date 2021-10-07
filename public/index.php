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
require_once __DIR__ . '/../vendor/autoload.php';
$torrentList = new WMtorrents\TorrentList();

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        
        <title>wm-torrents | Home</title>
    </head>
    <body>
        <div class='container'>
            <div class='text-center mt-3'>
                <h1>Wikimedia Database Dump torrents</h1>
            </div>
            <div>
                <?php
                foreach ($torrentList->getYears() as $year) {
                    echo "<h2>$year</h2>";
                    foreach ($torrentList->getEnabled() as $project) {
                        $torrents = $torrentList->getTorrentList()[$year][$project];
                        foreach ($torrents as $torrentInfo) {
                            $torrent = new WMtorrents\Torrent($torrentInfo);
                            ?>
                            <h4><?php echo $torrent->project; ?> (<?php echo $torrent->date->format('Y-m-d'); ?>)</h4>
                            <ul>
                                <li><strong>File name</strong>: <?php echo $torrent->file; ?></li>
                                <li><strong>Torrent</strong>: 
                                    <a href='<?php echo $torrent->location; ?>'>
                                    <?php echo $torrent->file; ?>.torrent</a>
                                    <sup>
                                        <a href='<?php echo $torrent->magnet; ?>'><img src='https://upload.wikimedia.org/wikipedia/commons/7/72/TPB_Magnet_Icon.gif'/></a>
                                    </sup>
                                </li>
                                <li><strong>Hash</strong>: <?php echo $torrent->hash; ?></li>
                            </ul>
                            <small>Torrent generated <?php echo $torrent->created->format('Y-m-d'); ?> from <a href='<?php echo $torrent->weblink; ?>' target='_blank'><?php echo $torrent->weblink; ?></a></small>
                            <hr>
                            <?php
                        }
                    }
                } 
                ?>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>