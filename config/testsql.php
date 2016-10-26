<?

include("../config/dsql.php");

$dsql = new DSQL();
$q = "select id from goods";
$dsql->query($q);
while($dsql->next_record()){

$id = $dsql->f(id);
echo $id."<br>";
}



?>