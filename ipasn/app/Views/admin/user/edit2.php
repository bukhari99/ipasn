<?php 
echo form_open(base_url('admin/user/edit/'.$user['id_user'])); 
echo csrf_field(); 
?>
<style type="text/css">
.tabs {
    display: flex;
    flex-wrap: wrap;
    font-family: sans-serif;
}
.tabs_name {
    padding: 10px 16px;
    cursor: pointer;
}
.tabs_item {
    display: none;
}
.tabs_content {
    order: 1;
    width: 100%;
    line-height: 1.5;
    font-size: 0.9em;
    display: none;
}
.tabs_item:checked + .tabs_name {
    color: #c29606;
    border-bottom: 2px solid #c29606;
}
.tabs_item:checked + .tabs_name + .tabs_content {
    display: initial;
}
</style>




<?php include('inventarisasntab.php'); ?>

<?php echo form_close(); ?>