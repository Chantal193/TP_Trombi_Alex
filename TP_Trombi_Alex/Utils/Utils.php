<?php
    
function verifyKey($pTable, $pKey)
{
    return (!empty($pTable) && isset($pTable[$pKey]) && !empty($pTable[$pKey]));
}

