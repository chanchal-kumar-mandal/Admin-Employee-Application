<?php
require_once("admin-header.php");
if(isset($_SESSION["admin_user_name"])) {
?>				
				<div class="list-group">
					<a href="#" class="list-group-item active"><span class="glyphicon glyphicon-circle-arrow-down"></span> Click To View FAQ With Category</a>
					<?php
					$i=0;
					foreach($faqCategoryResult as $category){
						if($i % 5 == 0){
							$listGroupItemClass = "list-group-item-primary";
							$panelClass = "panel-primary";
						}elseif($i % 5 == 1){
							$listGroupItemClass = "list-group-item-success";
							$panelClass = "panel-success";
						}elseif($i % 5 == 2){
							$listGroupItemClass = "list-group-item-info";
							$panelClass = "panel-info";
						}elseif($i % 5 == 3){
							$listGroupItemClass = "list-group-item-warning";
							$panelClass = "panel-warning";
						}elseif($i % 5 == 4){
							$listGroupItemClass = "list-group-item-danger";
							$panelClass = "panel-danger";
						}else{
							$listGroupItemClass = "list-group-item-default";
							$panelClass = "panel-default";
						}
						echo '<a href="faq-with-single-category.php?category_id='.$category['id'].'" class="list-group-item '.$listGroupItemClass.'"><span class="glyphicon glyphicon-eye-open"></span> View '.$category['category'].' FAQ<span class="badge">'.$category['total_faq'].'</span></a>';
						$i++;
					}
					?>
				</div>
<?php				
}else{
	echo "<script>window.location.href='admin-login.php'</script>";
}				