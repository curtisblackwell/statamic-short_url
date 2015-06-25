<div class="container">

  <div id="status-bar" class="web">
    <div class="status-block">
      <span class="muted">Short URLs</span>
    </div>
  </div>

  <div class="section">
    <table class="simple-table metrics">
      <tbody>
        <tr>
          <?php foreach ($shorturls as $short_url): ?>
            <td>
              <a href="<?php echo $app->urlFor("short-urls") ?>">
                <div class="label">Short code: <?php echo $short_url['shortcode'] ?></div>
                <div class="number">Clicks: <?php echo $short_url['clicks']  ?></div>
              </a>
            </td>
          <?php endforeach ?>
        </tr>
      </tbody>
    </table>
  </div>
</div>