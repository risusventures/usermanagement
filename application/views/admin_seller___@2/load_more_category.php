

<!--_________________________ Start Horizontal Profile _________________________ -->
 <?php
mysql_connect('localhost','root','');
mysql_select_db('ci_seller');
if(isSet($_POST['getLastContentId']))
{
$getLastContentId=$_POST['getLastContentId'];
$result=mysql_query("select * from category where ci_id <".$getLastContentId." order by ci_id desc limit 5");
$count=mysql_num_rows($result);
if($count>0){
while($row=mysql_fetch_array($result))
{
$id=$row['ci_id'];
$name=$row['product_category'];
?>    

<a href="profile/helen-porter/index.html"><?php echo $name;?></a>

<?php
}
?>


<a href="#"><div id="load_more_<?php echo $id; ?>" class="more_tab">
<center><button><div id="<?php echo $id; ?>" class="more_button">Load More Members</div></button></center></a>
</div>
<?php
} else{
echo "<div class='all_loaded'><center>No More Content to Load</Center></div>";
}
}
?>

