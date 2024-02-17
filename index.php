<?php
session_start();

require 'controller/CommandRcon.php';

$server = GlistToJson();

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <title>Minecraft</title>
    <?php INCLUDE 'template/head.php'; ?>
  </head>
  <body>
    <?php INCLUDE 'template/wallpaper.php'; ?>
    <?php INCLUDE 'template/menu.php'; ?>
    <div class="body">
      <div class="containers">
        <?php foreach ($server as $serverInfo): ?>
          <div class="item">
            <h2><?= $serverInfo['name'] ?></h2>
            <h4><?= $serverInfo['num'] ?> player connected</h4>
            <?php foreach ($serverInfo['player'] as $player): ?>
              <img src="https://mc-heads.net/avatar/<?= $player ?>" height="20" width="20" alt="Ethann8"> <?= $player ?>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </body>
</html>
