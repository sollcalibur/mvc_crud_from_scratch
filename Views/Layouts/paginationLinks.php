<div class="d-flex justify-content-center">
    <ul class="pagination">
        <?php
        if ($data['start'] > 1) {
            $page_start_beyond = $data['start'] - 1;
        ?>
            <li class="page-item">
                <a class="page-link" href="<?php echo $data['redirect'] . $page_start_beyond; ?>">
                    Previous
                </a>
            </li>
        <?php
        } else {
        ?>
            <li class="page-item disabled">
                <a class="page-link" href="<?php echo $data['redirect'] . $page_start_beyond; ?>">
                    Previous
                </a>
            </li>
        <?php
        }
        for ($page = $data['start']; $page <= $data['end']; $page++) {
        ?>
            <li class="page-item <?php echo (int) $data['page'] === (int) $page ? 'active' : ''; ?>">
                <a class="page-link" href="<?php echo $data['redirect'] . $page; ?>">
                    <?php echo $page; ?>
                </a>
            </li>
        <?php
        }
        if ($data['end'] < $data['total_pages']) {
            $page_end_beyond = $data['end'] + 1;
        ?>
            <li class="page-item">
                <a class="page-link" href="<?php echo $data['redirect'] . $page_end_beyond; ?>">
                    Next
                </a>
            </li>
        <?php
        } else {
        ?>
            <li class="page-item disabled">
                <a class="page-link" href="<?php echo $data['redirect'] . $page_end_beyond; ?>">
                    Next
                </a>
            </li>
        <?php
        }
        ?>
    </ul>
</div>