<?php $no = 1; 
                foreach($gudang as $g): ?>
                    <tr>
                <td><?= $no++ ?></td>
                <td><?= $g['nama_gudang'] ?></td>
                <td><?= $g['lokasi'] ?></td>
                <td>
                    <!-- <a class="btn btn-warning" href="editgud.php?updategud=<?= $g['nama_gudang'] ?>">edit</a> -->
                    <a class="btn btn-danger" href="gudang.php?delete=<?= $g['id_gudang'] ?>">delete</a>
                </td>
            </tr>
                <?php endforeach; ?>