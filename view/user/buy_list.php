<div class="container overflow-scroll">
  <div class="row">
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Boleto</th>
          <th scope="col">Valor total - Desconto</th>
          <!-- <th scope="col">Desconto</th> -->
          <th scope="col">Valor final</th>
          <th scope="col">Data</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($listBuys as $index => $buy):?>
            <tr>
              <th scope="row"><?=$index + 1?></th>
              <th><a href="<?=$buy['pdf_path']?>" target="_blank"><?=$buy['pdf_path']?></a></th>
              <td><?= $buy['total_price'] | 0?> - <?= $buy['discount'] | 0?>%</td>
              <td>
                <?= $buy['total_price'] - ($buy['total_price'] * $buy['discount']/100) | 0?>
              </td>
              <td><?= $buy['date_increment']?></td>
            </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>