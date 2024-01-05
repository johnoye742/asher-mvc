<?php

$pwd = password_hash('hello boy', PASSWORD_BCRYPT);
if(password_verify('hello boy', $pwd)) echo 'hell yeah';