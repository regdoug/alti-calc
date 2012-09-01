<?php /* JSON result formatter */ ?>
{
    "d_ft": <?php print $solver->d_ft; ?>,
    "r_ft": [<?php print $solver->r1_ft ?>,<?php print $solver->r2_ft ?>,<?php print $solver->r3_ft ?>],
    "z_ft": <?php print $solver->z_ft; ?>,
<?php if ($solver->ok()): ?>
    "error":0
}
<?php else: ?>
    "error":1,
    "msg":"<?php print $solver->message; ?>"
}
<?php endif; ?>
