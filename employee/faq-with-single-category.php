<?php
require_once("employee-header.php");
$categoryId = $_REQUEST['category_id'];
$faqResult = mysqli_query($db->db_conn, "SELECT faq.id AS id, faq.question AS question, faq.answer AS answer, faq_categories.category as category, faq_categories.id AS category_id FROM faq INNER JOIN faq_categories On faq.category_id = faq_categories.id WHERE category_id = '" . $categoryId . "'");
?>
<script type="text/javascript">
$(function(){
    $('.rating-select .btn').on('mouseover', function(){
        $(this).removeClass('btn-default').addClass('btn-warning');
        $(this).prevAll().removeClass('btn-default').addClass('btn-warning');
        $(this).nextAll().removeClass('btn-warning').addClass('btn-default');
    });

    $('.rating-select').on('mouseleave', function(){
        active = $(this).parent().find('.selected');
        if(active.length) {
            active.removeClass('btn-default').addClass('btn-warning');
            active.prevAll().removeClass('btn-default').addClass('btn-warning');
            active.nextAll().removeClass('btn-warning').addClass('btn-default');
        } else {
            $(this).find('.btn').removeClass('btn-warning').addClass('btn-default');
        }
    });

    $('.rating-select .btn').click(function(){
        if($(this).hasClass('selected')) {
            $('.rating-select .selected').removeClass('selected');
        } else {
            $('.rating-select .selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });
});
var v = 0;
function setValue(v)
{
  alert(v);
  rate = v;
}
</script>
<div class="page-container">
	<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
		<?php require_once("faq-category-menu.php");?>
	</div>
	<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
<?php
if(mysqli_num_rows($faqResult) > 0){	
	$i = 0;
	foreach($faqResult as $faqResult){
		if($i % 5 == 0){
			$panelClass = "panel-primary";
		}elseif($i % 5 == 1){
			$panelClass = "panel-success";
		}elseif($i % 5 == 2){
			$panelClass = "panel-info";
		}elseif($i % 5 == 3){
			$panelClass = "panel-warning";
		}elseif($i % 5 == 4){
			$panelClass = "panel-danger";
		}else{
			$panelClass = "panel-default";
		}
		?>
		<div class="">
			<?php
			echo '<div class="panel '.$panelClass.'">
				<div class="panel-heading">
				   <h3 class="panel-title">'.$faqResult["question"].'</h3>
				</div>
			  	<div class="panel-body">'.$faqResult["answer"].'</div>
			  	<div class="panel-footer">
					<label class="text-success">Category: '.$faqResult["category"].'</label>
			  		<button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#editFAQModal' . $faqResult['id'] . '"><span class="glyphicon glyphicon-edit"></span> Edit</button>
					<button type="button" class="btn btn-danger"><a href="#" onclick="return checkDelete()"><span class="glyphicon glyphicon-remove"></span> Delete</a></button>
					<button type="button" class="btn btn-info"><a href="#"><span class="glyphicon glyphicon-ok"></span> Like</a></button>
					<div class="rating-select">
				        <div class="btn btn-<% { %> if rate > 0 <% } %>warning<% { %> else <% } %>default<% { %> endif <% }{ %> if rate == 1 <% } %> selected<% {%> endif <% } %> btn-sm" onclick="setValue(1)"><span class="glyphicon glyphicon-star-empty"></span></div>
				        <div class="btn btn-default btn-sm" onclick="setValue(2)"><span class="glyphicon glyphicon-star-empty"></span></div>
				        <div class="btn btn-default btn-sm" onclick="setValue(3)"><span class="glyphicon glyphicon-star-empty"></span></div>
				        <div class="btn btn-default btn-sm" onclick="setValue(4)"><span class="glyphicon glyphicon-star-empty"></span></div>
				        <div class="btn btn-default btn-sm" onclick="setValue(5)"><span class="glyphicon glyphicon-star-empty"></span></div>
				    </div>
			  	</div>
			</div>
			<div class="modal fade" id="editFAQModal' . $faqResult['id'] . '" role="dialog">
			    <div class="modal-dialog">
			      	<div class="modal-content">
			        	<div class="modal-header">
			          		<button type="button" class="close" data-dismiss="modal">&times;</button>
			          		<h4 class="modal-title text-center">Edit FAQ</h4>
			        	</div>
			        	<div class="modal-body">
			        		<form role="form" action="edit-faq.php" method="post">
			        			<input type = "hidden" class = "form-control" name = "faq_id" value="' .  $faqResult['id'] .'">
			        			<input type = "hidden" class = "form-control" name = "category_id" value="' .  $faqResult['category_id'] .'">
				          		<div class = "form-group">
							        <label for = "question">Question:</label>
							        <input type = "text" class = "form-control" id = "question" name = "question" value = "' . $faqResult['question'] . '" required autofocus>
							   	</div>
								<div class="form-group">
							        <label class="control-label" for="answer">Answer:</label>
							        <textarea class="form-control" id="answer" name="answer" required>'.$faqResult["answer"].'</textarea>
							    </div>
							    <div class="form-group">
								  	<label for="category">Category: '.$faqResult['category'].'</label>
								</div>
								<button type="submit" class="btn btn-primary" name="editFAQ" value="dsds">Submit</button>
							</form>
			        	</div>
			        	<div class="modal-footer">
			          		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        	</div>
			      	</div>
				</div>
			</div>';
			?>
			</div>
		<?php
		$i++;
	}
}else{
	echo '<div class="row" style="text-align:center;color:#ff0000;">No record found.</div>';
}
echo '</div>
	</div>
</div>';
require_once("employee-footer.php");
?>