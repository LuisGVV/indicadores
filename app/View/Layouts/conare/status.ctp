<?php

if (!empty($user)) {
    include_once ('status/logged.ctp');
} else {
    include_once ('status/invited.ctp');
}
?>