<?php
session_start();
session_unset();
session_destroy();

header("Location: http://wormik.co.nf/psrod");