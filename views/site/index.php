<h1>Main page</h1>
<h3>Roles: </h3>
<?php foreach ($roles as $role) {
    echo $role->name."<br>";
}
?>
<h3>Permissions: </h3>
<?php
$i =0;
foreach ($permissions as $permission) {
    echo 'this user can'.($permission ? ' ' : ' NOT ').$permissionNames[$i]."<br>";
    $i++;
}
?>